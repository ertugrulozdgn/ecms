<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        if (Auth::check() && Auth::user()->status == 1)
        {
            return $next($request);

        } else {

            $request->flash();

            return redirect(action('Cms\Admin\AuthController@login'))->with('error','Erişim Yetkiniz Yok!');
        }

    }
}
