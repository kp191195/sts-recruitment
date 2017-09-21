<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoggedUser
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
        $sessionUser = Session::get('sessionUser');

        if(empty($sessionUser)){
            return redirect('/');
        }else{
            return $next($request);
        }
        
    }
}
