<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CheckLoginMiddleware
 */
class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\JsonResponse
    {
        try {
            $login = $request->input('login');
            $password = $request->input('password');

            $hashedPassword = hash('sha256', $password);
            /**
             * 5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8 = 'password'.
             */
            if ($hashedPassword === '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8') {
                return response()->json(['message' => 'Success.'], 200);
            }

            return response()->json(['error' => 'Invalid login or password.'], 401);
        } catch (\Exception $e) {

            dd($e->getMessage(), $e->getTrace());
        }
    }
}
