<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // 2. Cek apakah role user saat ini ada dalam daftar role yang diizinkan
        $userRole = Auth::user()->role;
        if (in_array($userRole, $roles)) {
            return $next($request); // Lanjutkan request ke controller
        }

        // 3. Jika role tidak sesuai, berikan respon akses ditolak (403)
        abort(403, 'Akses Ditolak! Anda tidak memiliki hak akses ke halaman ini.');
    }

}
