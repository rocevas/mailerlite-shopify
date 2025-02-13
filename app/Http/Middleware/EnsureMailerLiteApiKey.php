<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class EnsureMailerLiteApiKey
{
    /**
     * Handle an incoming request.
     *
     * Check if the authenticated user has a MailerLite API key.
     * If not, redirect them to the settings page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Inertia\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();
            if (empty($user->mailerlite_api_key)) {
                return Inertia::render('Connect');
            }
        }

        return $next($request);
    }
}
