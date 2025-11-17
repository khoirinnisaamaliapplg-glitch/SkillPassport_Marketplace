<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{
    public function handle($request, Closure $next)
    {
        // Hanya untuk role member
        if (Auth::check() && Auth::user()->role === 'member') {
            return $next($request);
        }

        // Jika bukan member arahkan ke admin
        return redirect()->route('admin.dashboard');
    }
}
