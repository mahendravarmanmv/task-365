<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)
            ->where('user_type', 'user')
            ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'This email is not registered with us.']);
        }

        if ($user->isRejected()) {
            return back()->withErrors(['email' => 'Your Vendor profile approval is still pending. Kindly contact customer support for further assistance']);
        }

        if (!$user->isApproved()) {
            return back()->withErrors(['email' => 'Your account is not yet approved. Please wait for admin approval.']);
        }

        // Reset password logic
        $newPassword = Str::random(8);
        $user->password = Hash::make($newPassword);
        $user->save();

        // Send email
        Mail::send('emails.reset-password', ['user' => $user, 'password' => $newPassword], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your New Password');
        });

        return back()->with('status', 'We have emailed your new password. Please login and update it in your profile.');
    }

}


