<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = session()->get('lang');
        if (in_array($lang, config('app.locales'))) {
            $locale = $lang;
        } else {
            $locale = config('app.locale');
        }
        app()->setLocale($locale);

        return $next($request);
    }
}
