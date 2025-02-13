<?php

namespace App\Http\Controllers;

use App\Services\MailerLiteService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $shops = [];

        $mailerLiteService = new MailerLiteService($user->mailerlite_api_key);
        try {
            $shops = $mailerLiteService->getEcommerceShops();
        } catch (\Exception $e) {
            // Optionally log the error or set a flash message.
            // For now, we'll just set $shops to an empty array.
            $shops = [];
        }

//        logger($shops);

        return Inertia::render('Home', [

        ]);
    }

    public function subscribers()
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

        logger($subscribers['body']);

        return Inertia::render('Subscribers', [
            'subscribers' => $subscribers['body']
        ]);
    }
}
