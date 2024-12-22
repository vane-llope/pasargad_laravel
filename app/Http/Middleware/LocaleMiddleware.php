<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            $locale = session('locale');
            Log::info('Locale from Session: ' . $locale);
            App::setLocale($locale);
            Log::info('Locale set to: ' . App::getLocale());
        } else {
            Log::info('No locale found in session.');
        }

        return $next($request);
    }
}

