<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 1. Check for Admin
        if ($role === 'admin' && (!$user || !$user->isAdmin())) {
            abort(403, 'Unauthorized access.');
        }

        // 2. Check for Customer
        if ($role === 'customer' && (!$user || !$user->isCustomer())) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
