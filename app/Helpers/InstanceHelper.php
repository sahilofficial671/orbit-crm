<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Company;
use App\Models\Account;
use App\Models\Contact;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Traits\CommonTraits;
class InstanceHelper{

    use CommonTraits;

    public static function getAuthCompanies(Int $userId = NULL)
    {
        if($userId){
            $companies = Company::where('created_by', $userId)->with(['contacts', 'user'])->get();
            return $companies;
        }
        return Company::where('created_by', Auth::id())->with(['contacts', 'user'])->get();
    }

    public static function getCompanySelected()
    {
        if(Session::has('company')){
            return Session::get('company');
        }
        return false;
    }

    public static function putSelectedCompanyInSession(Int $companyId)
    {
        return Session::put('company', Company::find($companyId));
    }

    public static function getAccounts(Int $userId = NULL)
    {
        if($userId){
            return Account::where('created_by', $userId)->with(['companies'])->get();
        }
        return Account::where('created_by', Auth::id())->with(['companies'])->get();
    }

    public static function getSelectedAccount()
    {
        if(Session::has('account')){
            return Session::get('account');
        }
        return false;
    }

    public static function setAccount(Int $accountId)
    {
        return Session::put('account', Account::where('id', $accountId)->with(['user', 'companies'])->first());
    }
}

