<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class Language
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');

        if ($locale && in_array($locale, config('app.supported_locales'))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
