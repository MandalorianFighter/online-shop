<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $section)
    {
        $admin = auth()->user();

        if (!$admin || !$this->hasAccessToSection($admin, $section)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

    private function hasAccessToSection($admin, $section)
    {
        return $admin->$section === '1';
    }
}
