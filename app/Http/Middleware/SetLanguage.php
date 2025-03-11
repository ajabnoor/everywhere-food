<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the locale from session
        $locale = Session::get('locale', 'ar');

        // Log for debugging
        // Log::info('Setting Locale:', ['locale' => $locale]);

        // Apply the locale to Laravel
        App::setLocale($locale);

        return $next($request);
    }
}
