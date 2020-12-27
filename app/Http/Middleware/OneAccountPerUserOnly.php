<?php

namespace App\Http\Middleware;

use App\Helpers\InstanceHelper;
use Closure;
use Illuminate\Http\Request;

class OneAccountPerUserOnly
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
        if (! InstanceHelper::getAccount()) {
            $request->session()->forget('account');

            return $next($request);
        }

        abort(403);
    }
}
