<?php

namespace App\Http\Middleware;

use App\Helpers\InstanceHelper;
use Closure;
use Illuminate\Http\Request;
use Session;

class MatchAccountWithSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((int) $request->route('account') === Session::get('account')->id) {
            return $next($request);
        }

        abort(403);
    }
}
