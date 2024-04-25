<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class checkToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        $user = User::where(['api_token' => $token])->first();

        if(!$user){
            $response = [
                'status'    => false,
                'message'   => 'Unauthorized request'
            ];
            return response()->json($response, 401);
        }
        return $next($request);
    }
}
