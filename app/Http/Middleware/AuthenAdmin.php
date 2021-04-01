<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthenAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('loginadmin');
//        }
//    }
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard("admin")->user()){
            return $next($request);
        }else{
            return redirect(route('loginadmin'));
        }

    }

}
