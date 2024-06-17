<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('sanctum')->user()->role === 'admin') {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized. You are not an admin'], 403);
    }
}