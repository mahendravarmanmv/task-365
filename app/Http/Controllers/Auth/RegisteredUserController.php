<?php

namespace App\Http\Controllers\Auth;

use App\Mail\WelcomeUserMail;
use App\Mail\AdminNotificationMail;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'email_otp_verified' => 'required|in:1',

            'password' => ['required', Rules\Password::defaults()],

            'phone' => [
                'required',
                'string',
                'regex:/^[6-9]\d{9}$/',
                'different:alternative_number',
                function ($attribute, $value, $fail) {
                    if (User::where('phone', $value)->orWhere('alternative_number', $value)->exists()) {
                        $fail('The mobile number is already registered.');
                    }
                },
            ],
            'otp_verified' => 'accepted',

            'alternative_number' => [
                'nullable',
                'string',
                'regex:/^[6-9]\d{9}$/',
                'different:phone',
            ],

            'category' => ['required', 'array'],
            'category.*' => ['exists:categories,id'],

            'agree_terms' => 'accepted',

            'business_proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'identity_proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ], [
            'otp_verified.accepted' => 'OTP verification failed. Please verify your phone number before submitting the form.',
            'email_otp_verified.in' => 'Email OTP verification failed. Please verify your email before submitting the form.',
            'phone.different' => 'Mobile and alternative number should not be the same.',
            'alternative_number.different' => 'Mobile and alternative number should not be the same.',
        ]);

        // Upload files
        $businessProofPath = $request->file('business_proof')
            ? $request->file('business_proof')->store('identifications', 'public')
            : null;

        $identityProofPath = $request->file('identity_proof')
            ? $request->file('identity_proof')->store('identifications', 'public')
            : null;

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'website' => $request->website,
            'phone' => $request->phone,
            'alternative_number' => $request->alternative_number,
            'business_proof' => $businessProofPath,
            'identity_proof' => $identityProofPath,
        ]);

        // Attach categories
        $user->categories()->attach($request->category);

        // Fire registered event
        event(new Registered($user));

        // Send emails
        Mail::to($user->email)->send(new WelcomeUserMail($user));
        Mail::to('task365.in@gmail.com')->send(new AdminNotificationMail($user));

        return redirect()->route('registration.success')
            ->with('registration_success', true)
            ->with('message', 'You have successfully registered. Your account will be activated soon. You will receive a confirmation email once it is activated.');
    }

    /**
     * Check if phone number exists in phone or alternative_number columns.
     */
    public function checkPhoneExists(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^[6-9]\d{9}$/',
        ]);

        $phone = $request->input('phone');

        $exists = User::where('phone', $phone)
            ->orWhere('alternative_number', $phone)
            ->exists();

        return response()->json([
            'exists' => $exists,
            'message' => $exists ? 'Mobile number already exists.' : '',
        ]);
    }
}
