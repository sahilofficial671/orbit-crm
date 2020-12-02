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

    public static function getAccountCompanies(Int $accountId = NULL)
    {
        if($accountId){
            return Company::where('account_id', $accountId)->with(['contacts', 'user'])->get();
        }
        return Company::where('account_id', Account::getAccount()->id)->with(['contacts', 'user'])->get();
    }

    public static function getAccountContacts(Int $accountId = NULL)
    {
        if($accountId){
            return Contact::where('account_id', $accountId)->with(['account', 'user'])->get();
        }
        return Contact::where('account_id', Account::getAccount()->id)->with(['account', 'user'])->get();
    }

    public static function getAccount(Int $userId = NULL)
    {
        if($userId){
            return Account::where('created_by', $userId)->with(['companies', 'user'])->first();
        }
        return Account::where('created_by', Auth::id())->with(['companies', 'user'])->first();
    }
    public static function getAccounts(Int $userId = NULL)
    {
        if($userId){
            return Account::where('created_by', $userId)->with(['companies', 'user'])->get();
        }
        return Account::where('created_by', Auth::id())->with(['companies', 'user'])->get();
    }
}

