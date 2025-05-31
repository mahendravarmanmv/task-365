<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cashfree\PG\CashfreePG;
use App\Models\Lead;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $lead = Lead::findOrFail($request->lead_id);

        // Initialize SDK
        $cf = new CashfreePG([
            'app_id'     => env('CASHFREE_APP_ID'),
            'secret_key' => env('CASHFREE_SECRET_KEY'),
            'env'        => env('CASHFREE_ENV') // 'TEST' or 'PROD'
        ]);

        $orderId = 'ORDER_' . uniqid();

        $response = $cf->pg()->orders->create([
            'order_id'       => $orderId,
            'order_amount'   => $request->amount,
            'order_currency' => 'INR',
            'customer_details' => [
                'customer_id'    => 'LEAD_' . $lead->id,
                'customer_email' => $lead->email ?? 'test@example.com',
                'customer_phone' => $lead->phone ?? '9999999999',
            ],
            'order_meta' => [
                'return_url' => env('CASHFREE_RETURN_URL') . '?order_id=' . $orderId,
                'notify_url' => env('CASHFREE_NOTIFY_URL'),
            ],
        ]);

        return redirect($response['payment_link']);
    }

    public function paymentSuccess(Request $request)
    {
        return view('payment.success', ['order_id' => $request->order_id]);
    }

    public function webhook(Request $request)
    {
        \Log::info('Cashfree Webhook:', $request->all());
        return response()->json(['status' => 'success']);
    }
    public function result(Request $request)
    {
        $error = session('error', 'Something went wrong with your payment.');
        return view('payment.result', compact('error'));
    }

}

