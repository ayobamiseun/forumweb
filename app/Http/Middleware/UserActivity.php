<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class UserActivity
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
        if (\Auth::check()) {
            $user = \Auth::user();

            $request_time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);

            $user->last_activity = Carbon::now();
            $user->save();
        }

        return $next($request);
    }
}
