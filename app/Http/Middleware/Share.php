<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Support\Facades\View;

class Share
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
        $pageLayout = Page::orderBy('must')->get();

        View::share('pageLayout',$pageLayout);

        return $next($request);
    }
}
