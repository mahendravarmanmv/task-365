<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'author' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'subject' => 'required|string|max:255',
            'comment' => 'required|string|min:10',
        ]);

        // Insert into DB if needed
        Contact::create($validated);

        // Send Email
        Mail::to('task365.in@gmail.com')->send(new ContactFormMail($validated));

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');

    }
}
