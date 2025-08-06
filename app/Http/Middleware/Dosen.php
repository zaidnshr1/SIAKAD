<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dosen
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'dosen') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
