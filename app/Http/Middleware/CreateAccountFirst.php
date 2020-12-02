<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\InstanceHelper;
use App\Models\Account;
use Session;
class CreateAccountFirst
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
        if(InstanceHelper::getAccount()){
            Session::put('account', InstanceHelper::getAccount());
            return $next($request);
        }
        return redirect()->route('account.create');
    }
}
