<?php

namespace App\Http\Middleware;

use App\Http\Helpers\RoleHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           if(RoleHelper::check(\Route::currentRouteName())){
            return $next($request);
           }
           abort(404);
    }
}
