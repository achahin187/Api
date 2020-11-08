<?php

namespace App\Http\Middleware;

use Closure;

class checkPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->api_password !==  env("API_PASSWORD",'iK66WSVOMGxq6z')){
            return response()->json(['message' => 'UnAuthenticated']);
        }
        return $next($request);
    }
}
