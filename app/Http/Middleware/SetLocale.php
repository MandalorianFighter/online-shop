<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = 'en'; // default

        if (request('lang')) {
            $lang = request('lang');
            session()->put('lang', $lang);
        } elseif (session('lang')) {
            $lang = session('lang');
        }
        app()->setLocale($lang);

        return $next($request);
    }
}
