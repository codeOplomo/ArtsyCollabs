<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role_id != $role) {
            // Redirect or abort based on your application's needs
            return redirect('/login');
        }

        return $next($request);
    }
}

