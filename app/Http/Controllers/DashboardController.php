<?php

namespace App\Http\Controllers;

use App\Services\MailerLiteService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user's MailerLite API key
        $user = auth()->user();
        $apiKey = $user->mailerlite_api_key;

        // Initialize the MailerLite service with the user's API key
        $mailerLiteService = new MailerLiteService($apiKey);

        // For example, fetch the list of subscribers
        try {
            $subscribers = $mailerLiteService->getSubscribers();
        } catch (\Exception $e) {
            // Handle the error (e.g., log it or display an error message)
            return back()->withErrors($e->getMessage());
        }

        return view('dashboard', compact('subscribers'));
    }
}
