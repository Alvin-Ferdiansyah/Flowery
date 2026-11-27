<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Pastikan hanya user dengan role "admin" yang bisa masuk ke /admin/*.
     * Daftarkan alias di bootstrap/app.php:
     *   $middleware->alias(['admin' => \App\Http\Middleware\EnsureUserIsAdmin::class]);
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->role !== 'admin') {
            abort(403, 'Halaman ini khusus untuk admin.');
        }

        return $next($request);
    }
}
