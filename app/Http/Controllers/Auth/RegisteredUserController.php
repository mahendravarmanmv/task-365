<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        exit;
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'whatsapp_number' => ['nullable', 'string', 'regex:/^[0-9]{10}$/'],
            'category' => ['required', 'array'], // Validate category as an array
            'category.*' => ['exists:categories,id'], // Ensure selected values exist in the categories table
            'agree_terms' => 'accepted',
            'business_proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'identity_proof' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        // Handle file uploads
        $businessProofPath = $request->file('business_proof')
            ? $request->file('business_proof')->store('identifications', 'public')
            : null;

        $identityProofPath = $request->file('identity_proof')
            ? $request->file('identity_proof')->store('identifications', 'public')
            : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'website' => $request->website,
            'phone' => $request->phone,
            'whatsapp_number' => $request->whatsapp_number,
            'business_proof' => $businessProofPath,
            'identity_proof' => $identityProofPath,
        ]);

        // Attach categories to the user
        $user->categories()->attach($request->category);

        event(new Registered($user));

        return redirect()->route('registration.success')->with('message', 'You have successfully registered. Your account will be activated soon. You will receive a confirmation email once it is activated.');
    }
}
