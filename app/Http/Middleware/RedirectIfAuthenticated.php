<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/admin/dashboard');
            }
            if ($role == 'dosen') {
                return redirect('/dosen/dashboard');
            }
            if ($role == 'mahasiswa') {
                return redirect('/mahasiswa/dashboard');
            }
            // fallback, kalau role aneh, logout saja
            Auth::logout();
            return redirect('/login');
        }
        return $next($request);
    }
}