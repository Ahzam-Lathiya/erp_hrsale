<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if( empty( session('user_session') ) )
        // {
        //     redirect('/');
        // }

        
        if( empty($request->cookie('token')) || $request->cookie('token') == null )
        {
            return redirect('/');
        }

        if( empty(session('token')) || session('token') == null )
        {
            return redirect('/');
        }

        if( $request->cookie('token') != session('token') )
        {
            return redirect('/');
        }

        return $next($request);
    }
}

?>