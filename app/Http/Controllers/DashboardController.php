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

        return Inertia::render('Subscribers', [
            'subscribers' => $subscribers['body']
        ]);
    }

    public function campaigns(Request $request)
    {
        // Retrieve the authenticated user's MailerLite API key
        $user = auth()->user();
        $apiKey = $user->mailerlite_api_key;

        // Initialize the MailerLite service with the user's API key
        $mailerLiteService = new MailerLiteService($apiKey);

        // Get the filter from query, defaulting to 'draft'
        $status = $request->query('status', 'draft');

        // For example, fetch the list of campaigns
        try {
            $campaigns = $mailerLiteService->getCampaigns([
                'filter' => [
                    'status' => $status,
                ],
            ]);
        } catch (\Exception $e) {
            // Handle the error (e.g., log it or display an error message)
            return back()->withErrors($e->getMessage());
        }

        return Inertia::render('Campaigns', [
            'campaigns' => $campaigns['body'],
            'selectedStatus' => $status,
        ]);
    }

    public function automations()
    {
        // Retrieve the authenticated user's MailerLite API key
        $user = auth()->user();
        $apiKey = $user->mailerlite_api_key;

        // Initialize the MailerLite service with the user's API key
        $mailerLiteService = new MailerLiteService($apiKey);

        // For example, fetch the list of automations
        try {
            $automations = $mailerLiteService->getAutomations();
        } catch (\Exception $e) {
            // Handle the error (e.g., log it or display an error message)
            return back()->withErrors($e->getMessage());
        }

        return Inertia::render('Automations', [
            'automations' => $automations['body']
        ]);
    }

    public function forms()
    {
        // Retrieve the authenticated user's MailerLite API key
        $user = auth()->user();
        $apiKey = $user->mailerlite_api_key;

        // Initialize the MailerLite service with the user's API key
        $mailerLiteService = new MailerLiteService($apiKey);

        // For example, fetch the list of forms
        try {
            $forms = $mailerLiteService->getForms();
        } catch (\Exception $e) {
            // Handle the error (e.g., log it or display an error message)
            return back()->withErrors($e->getMessage());
        }

        return Inertia::render('Forms', [
            'forms' => $forms['body']
        ]);
    }

    public function templates()
    {
        // Retrieve the authenticated user's MailerLite API key
        $user = auth()->user();
        $apiKey = $user->mailerlite_api_key;

        // Initialize the MailerLite service with the user's API key
        $mailerLiteService = new MailerLiteService($apiKey);

        // For example, fetch the list of templates
        try {
            $templates = $mailerLiteService->getTemplates();
        } catch (\Exception $e) {
            // Handle the error (e.g., log it or display an error message)
            return back()->withErrors($e->getMessage());
        }

        return Inertia::render('Templates', [
            'templates' => $templates['body']
        ]);
    }
}
