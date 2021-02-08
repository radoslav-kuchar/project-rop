<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset($accessToken)){
            $request->headers->set([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$accessToken,
            ]); 
        }
        

        return $next($request);
    }
}
