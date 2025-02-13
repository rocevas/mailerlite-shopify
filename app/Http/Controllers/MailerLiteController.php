<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MailerLiteController extends Controller
{
    /**
     * Show the form to enter the MailerLite API key.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Connect', []);
    }

    /**
     * Store the MailerLite API key for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming API key
        $validated = $request->validate([
            'mailerlite_api_key' => 'required|string',
        ]);

        // Update the user's API key and save
        $user = auth()->user();
        $user->mailerlite_api_key = $validated['mailerlite_api_key'];
        $user->save();

        return redirect()->route('home')
            ->with('success', 'MailerLite API key saved successfully.');
    }
}
