<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminMiddleware
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
        if (Auth::check())
        {
            if ( ! Auth::user()->isAdmin() ) {
                Auth::logout();
                return redirect()->route('mainHomePage')->withCookie(Cookie::forget('adminPanelEnter','/',
                    $_SERVER['SERVER_NAME']));
            }
        }else{
            $url = $request->path();
            $cookie = Cookie::make('adminPanelEnter', $url,1,'/login',$_SERVER['SERVER_NAME']);
            return redirect()->route('session_timeout')->withCookie($cookie);
        }

        return $next($request);
    }
}
