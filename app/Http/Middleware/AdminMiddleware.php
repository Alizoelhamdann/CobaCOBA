<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN rolenya adalah 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            // Jika ya, izinkan akses
            return $next($request);
        }

        // Jika tidak, tolak akses (403 Forbidden)
        abort(403, 'AKSES DITOLAK. ANDA BUKAN ADMIN.');
    }
}