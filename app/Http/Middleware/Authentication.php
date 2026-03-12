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
    public function handle(Request $request, Closure $next, $role): Response
    {
        $vaiTro = session('VaiTro');

        if (!$vaiTro) {
            return redirect('/login');
        }

        if ($vaiTro != $role) {
            abort(403, 'Không có quyền truy cập');
        }

        return $next($request);
    }
}
