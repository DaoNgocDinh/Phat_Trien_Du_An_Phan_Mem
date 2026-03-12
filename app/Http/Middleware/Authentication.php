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
    public function handle(Request $request, Closure $next)
    {

        if (!session()->has('UserID')) {
            return redirect('/login')->with('error', 'Bạn chưa đăng nhập');
        }

        if (session('VaiTro') != 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
