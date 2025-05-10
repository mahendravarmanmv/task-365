<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OtpController extends Controller
{
    public function handleCallback(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect()->route('register')->with('error', 'Invalid OTPLESS response.');
        }

        $response = Http::asForm()->post('https://auth.otpless.app/oauth/token', [
            'grant_type' => 'authorization_code',
            'code' => $token,
            'client_id' => 'XJO5VITAH8HRKIR6VHIN0I2LG6BGX6A8',
            'client_secret' => '6p6m86d6othhino8jm8b5t1e81usm3ct',
        ]);

        if ($response->failed()) {
            return redirect()->route('register')->with('error', 'Token verification failed.');
        }

        $data = $response->json();
        $phone = $data['waId'] ?? null;
        $name = $data['name'] ?? 'User';

        if (!$phone) {
            return redirect()->route('register')->with('error', 'Phone number not found.');
        }

        // Check if user already exists
        $user = User::firstOrCreate(
            ['phone' => $phone],
            ['name' => $name, 'email' => "$phone@otpless.com", 'password' => bcrypt('Temp@123')]
        );

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Logged in successfully!');
    }
}
