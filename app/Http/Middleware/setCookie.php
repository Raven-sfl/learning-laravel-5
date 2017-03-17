<?php

namespace App\Http\Middleware;

use Closure;


class setCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if($request->hasCookie('currency'))
//        {
//            return $next($request);
//        }
//        else
//        {
        //$currency = 1;
//            $response = $next($request);
//            return $response->withCookie(cookie('currency', 1, 89000));
//        }
        return $next($request);

    }
}
