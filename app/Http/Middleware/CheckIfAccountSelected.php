<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session, Auth;
use App\Helpers\InstanceHelper;
class CheckIfAccountSelected
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
        if(!InstanceHelper::getSelectedAccount()){
            return redirect()->route('account.index')->with('info', 'Please select one of your account before proceeding.');
        }
        return $next($request);
    }
}
