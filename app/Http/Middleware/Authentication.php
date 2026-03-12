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
          $user = $request->user();

        if(!$user){
            return response()->json([
                'message' => 'Chưa đăng nhập'
            ],401);
        }

        if($user->VaiTro != $role){
            return response()->json([
                'message' => 'Không có quyền truy cập'
            ],403);
        }

        return $next($request);
    }
}
