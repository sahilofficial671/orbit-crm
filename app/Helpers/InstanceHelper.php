<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Company;
use App\Models\Account;
use App\Models\Contact;
use App\Models\State;
use App\Models\Country;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Traits\CommonTraits;
class InstanceHelper{

    use CommonTraits;

    public static function getAccountCompanies(Int $accountId = NULL)
    {
        if($accountId){
            return Company::where('account_id', $accountId)->with(['contacts', 'user', 'account'])->get();
        }
        return Company::where('account_id', Account::getAccount()->id)->with(['contacts', 'user', 'account'])->get();
    }

    public static function getAccountContacts(Int $accountId = NULL)
    {
        if($accountId){
            return Contact::where('account_id', $accountId)->with(['company', 'user', 'account', 'state', 'country'])->get();
        }
        return Contact::where('account_id', Account::getAccount()->id)->with(['company', 'user', 'account', 'state', 'country'])->get();
    }

    public static function getAccount(Int $userId = NULL)
    {
        if($userId){
            return Account::where('created_by', $userId)->with(['companies', 'user', 'contacts'])->first();
        }
        return Account::where('created_by', Auth::id())->with(['companies', 'user', 'contacts'])->first();
    }
    public static function getAccounts(Int $userId = NULL)
    {
        if($userId){
            return Account::where('created_by', $userId)->with(['companies', 'user', 'contacts'])->first();
        }
        return Account::where('created_by', Auth::id())->with(['companies', 'user', 'contacts'])->first();
    }
    public static function getStates()
    {
        return State::where('status', '1')->orderBy('name', 'asc')->get();
    }
    public static function getCountries()
    {
        return Country::where('status', '1')->orderBy('name', 'asc')->get();
    }
}

