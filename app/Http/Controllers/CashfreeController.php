<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;
use App\Mail\UserInvoiceMail;

class CashfreeController extends Controller
{
    public function index()
    {
        return view('cashfree.index');
    }

    public function payment(Request $request)
    {
        $request->validate([
        'amount' => 'required|numeric|min:1',
    ]);
	$user = auth()->user(); // Assumes the user is logged in
    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to proceed with the payment.');
    }
	 $lead_id = $request->lead_id;	 

        // ✅ Check for duplicate purchase by user_id instead of email
    $existing = Payment::where('user_id', $user->id)
        ->where('lead_id', $lead_id)
        ->where('status', 1)
        ->exists();

        if ($existing) {
            return redirect()->route('leads.index')->with('error', 'You have already purchased this lead.');
        }

        // Generate unique order IDs
        $orderId = 'order_'.rand(1111111111, 9999999999);
        $customerId = 'customer_'.rand(111111111, 999999999);
        $lead_id = $request->lead_id;

        $url = env('CASHFREE_ENV') === 'sandbox'
            ? "https://sandbox.cashfree.com/pg/orders"
            : "https://api.cashfree.com/pg/orders";

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: ".env('CASHFREE_API_KEY'),
            "x-client-secret: ".env('CASHFREE_API_SECRET')
        ];

        $data = json_encode([
            'order_id' => $orderId,
            'order_amount' => $request->amount,
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => $customerId,
                 "customer_name" => $user->name,
            "customer_email" => $user->email,
            "customer_phone" => $user->phone, // Make sure phone exists in users table
            ],
            "order_meta" => [
                "return_url" => route('cashfree.success') . "?order_id={order_id}&order_token={order_token}&lead_id=" . $lead_id
            ],
        ]);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return back()->with('error', 'Failed to create payment order: '.$err);
        }

        $responseData = json_decode($response);
		
		// ✅ Add this validation to prevent undefined property error
		if (!isset($responseData->payment_link)) {
			\Log::error('Cashfree payment error response', (array) $responseData); // For debugging
			return back()->with('error', 'Unable to generate payment link. Please try with a lower amount or check payment details.');
		}

        // Store payment details in database
        $payment = Payment::create([
            'user_id' => $user->id,
        'amount' => $request->amount,
        'order_id' => $orderId,
        'lead_id' => $lead_id,
        'status' => 0, // pending
        ]);

        // Redirect to Cashfree payment page
        return redirect()->to($responseData->payment_link);
    }

    public function paymentfailed($order_id)
    {
        $url = "https://sandbox.cashfree.com/pg/orders/{$order_id}/payments";

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01", // Use the correct version
            "x-client-id: " . env('CASHFREE_API_KEY'),
            "x-client-secret: " . env('CASHFREE_API_SECRET')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['success' => false, 'error' => $err]);
        }

        $data = json_decode($response, true); // You can change to false if you want object

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function success(Request $request)
    {
        $orderId = $request->input('order_id');
        $lead_id = $request->input('lead_id');

        if (!$orderId) {
            return redirect('/')->with('error', 'Payment verification failed: Missing order ID');
        }

        // Verify payment status with Cashfree API
        $url = (env('CASHFREE_ENV') === 'sandbox'
            ? "https://sandbox.cashfree.com/pg/orders/"
            : "https://api.cashfree.com/pg/orders/") . $orderId;

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: ".env('CASHFREE_API_KEY'),
            "x-client-secret: ".env('CASHFREE_API_SECRET')
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return redirect('/')->with('error', 'Payment verification failed: '.$err);
        }

        $responseData = json_decode($response);

        //dd($responseData);

        // Update payment status in database
        $payment = Payment::where('order_id', $orderId)->first();

        if ($payment) {
            $status = ($responseData->order_status === 'PAID') ? 1 : 0;

            if ($payment && $payment->status !== 1) {               
                $failedResponse = $this->paymentfailed($orderId);               
                $responseData = $failedResponse;
            }

            $payment->update([
                'status' => $status,
                'other' => $responseData,
                'payment_id' => $responseData->cf_order_id ?? null,
                'payment_method' => $responseData->payment_method ?? null,
                'lead_id' => $lead_id,
            ]);

            if ($status === 1) {
                Lead::where('id', $lead_id)->decrement('stock');
                // Send email notification to task365.in@gmail.com
                Mail::to('task365.in@gmail.com')->send(new PaymentSuccessMail($payment));
                // ✅ Send invoice to user
                Mail::to($payment->user->email)->send(new UserInvoiceMail($payment));
                return redirect('payment/result')->with([
                    'success' => 'Payment Successful!',
                    'payment' => $payment,
                ]);
            }
        }

        return redirect()->route('payment.result')->with('error', 'Payment verification failed for Order ID: ' . $orderId);

    }
}
