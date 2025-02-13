<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->fa !== $role) {
            return redirect('/login')->withErrors(['error' => 'Unauthorized access']);
        }

        return $next($request);
    }
}
