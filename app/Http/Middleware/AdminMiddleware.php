<?php

namespace App\Http\Middleware;

use Closure;

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
        if ($this->auth->check())
        {

            if ( ! $this->auth->user()->isAdmin() ) {

                Auth::logout();
                return redirect()->guest('/куда-надо');
            }
        }
        return $next($request);
    }
}
