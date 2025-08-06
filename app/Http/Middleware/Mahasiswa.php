<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'mahasiswa') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
