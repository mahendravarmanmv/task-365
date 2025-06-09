<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\SendOtpMail;
use App\Models\User;

class EmailOtpController extends Controller
{
     public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $otp = rand(100000, 999999);
        $email = $request->email;

        // Store OTP temporarily (for 5 mins)
        Cache::put('otp_' . $email, $otp, now()->addMinutes(5));

        Mail::to($email)->send(new SendOtpMail($otp));

        return response()->json(['message' => 'OTP sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $cachedOtp = Cache::get('otp_' . $request->email);

        if ($cachedOtp == $request->otp) {
            return response()->json(['message' => 'OTP Verified Successfully']);
        }

        return response()->json(['message' => 'Invalid or expired OTP'], 400);
    }
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $exists = User::where('email', $request->email)
            ->where('user_type', 'user')
            ->exists();

        return response()->json(['exists' => $exists]);
    }
}
