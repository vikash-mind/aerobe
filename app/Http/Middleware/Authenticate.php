<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the request expects a JSON response
        if (!$request->expectsJson()) {
            return route('admin.login'); // Ensure the admin login route exists
        }

        // For API requests, return null (no redirect)
        return null;
    }
}
