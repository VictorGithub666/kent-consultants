<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Ensure the user is authenticated and has a valid admin-level role.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login')
                ->with('status', 'Please log in to access the admin panel.');
        }

        $user = Auth::user();

        // Block inactive accounts
        if (! $user->status) {
            Auth::logout();
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Your account has been deactivated.']);
        }

        // Only roles with admin-panel access are allowed
        $allowedRoles = ['super_admin', 'admin', 'manager', 'user'];
        if (! $user->role || ! in_array($user->role->slug, $allowedRoles)) {
            Auth::logout();
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'You do not have permission to access the admin panel.']);
        }

        return $next($request);
    }
}
