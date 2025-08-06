<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login, arahkan ke login
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        // Redirect sesuai role hanya jika berada di halaman login atau root
        if ($request->is('login') || $request->is('/')) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if ($user->role === 'dosen') {
                return redirect()->route('dosen.dashboard');
            }
            if ($user->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            }
        }

        return $next($request);
    }
}
