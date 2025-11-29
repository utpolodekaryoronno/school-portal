<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $staff = Auth::guard('staff')->user();

    if (!$staff) {
        return redirect()->route('login');
    }

    // If user is not accountant and trying to visit accountant page
    if ($request->routeIs('accountant.dashboard') && $staff->role !== 'accountant') {
        return redirect()->route('staff.dashboard');
    }

    // If user is accountant and tries to visit staff dashboard
    if ($request->routeIs('staff.dashboard') && $staff->role === 'accountant') {
        return redirect()->route('accountant.dashboard');
    }

    return $next($request);
}

}
