<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $vaiTro = session('VaiTro');

        if (!$vaiTro) {
            return redirect('/login');
        }

        if (!in_array($vaiTro, $roles)) {
            abort(403, 'Không có quyền truy cập');
        }

        return $next($request);
    }
}
