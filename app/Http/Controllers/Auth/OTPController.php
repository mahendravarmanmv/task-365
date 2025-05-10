<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OTPController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10'
        ]);
        //echo $request->phone;exit;
        $otp = rand(100000, 999999);
        Session::put('otp_' . "+918088141246", $otp);

        // Simulate sending OTP (You should use SMS API here)
        \Log::info("OTP for " . $request->phone . " is " . $otp);

        return response()->json(['success' => true]);
    }

    public function verifyOTP(Request $request)
    {
        $otp = Session::get('otp_' . $request->phone);

        if ($otp && $request->otp == $otp) {
            Session::put('otp_verified_' . $request->phone, true);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }
}
