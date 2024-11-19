<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user(); // Get the authenticated user

                // Redirect based on the user's role
                if ($user->role === 'admin') {
                    return redirect(RouteServiceProvider::ADMINHOME); // Redirect to ADMINHOME
                } elseif ($user->role === 'agent') {
                    return redirect(RouteServiceProvider::AGENTHOME); // Redirect to AGENTHOME
                } else {
                    return redirect(RouteServiceProvider::HOME); // Redirect to HOME for other users
                }
            }
        }

        return $next($request);
    }
}
