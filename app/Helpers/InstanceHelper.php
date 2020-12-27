<?php

namespace App\Helpers;

use App\Models\Account;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Session;

class InstanceHelper
{
    public static function getAccountCompanies(int $accountId = null)
    {
        if ($accountId) {
            return Company::where('account_id', $accountId)->with(['contacts', 'user', 'account'])->get();
        }

        return Company::where('account_id', Account::getAccount()->id)->with(['contacts', 'user', 'account'])->get();
    }

    public static function getAccountContacts(int $accountId = null)
    {
        if ($accountId) {
            return Contact::where('account_id', $accountId)->with(['company', 'user', 'account', 'state', 'country'])->get();
        }

        return Contact::where('account_id', Account::getAccount()->id)->with(['company', 'user', 'account', 'state', 'country'])->get();
    }

    public static function getAccount(int $accountId = null)
    {
        if ($accountId) {
            return Account::where('id', $accountId)->with(['companies', 'user', 'contacts'])->first();
        }

        return Account::where('created_by', Auth::id())->with(['companies', 'user', 'contacts'])->first();
    }

    public static function getAccounts(int $userId = null)
    {
        if ($userId) {
            return Account::where('created_by', $userId)->with(['companies', 'user', 'contacts'])->firstOrFail();
        }

        return Account::where('created_by', Auth::id())->with(['companies', 'user', 'contacts'])->firstOrFail();
    }

    public static function getStates()
    {
        return State::where('status', '1')->orderBy('name', 'asc')->get();
    }

    public static function getCountries()
    {
        return Country::where('status', '1')->orderBy('name', 'asc')->get();
    }

    public static function getUser(int $userId = null)
    {
        if ($userId) {
            return User::where('id', $userId)->with(['role', 'accounts'])->firstOrFail();
        }

        return User::where('id', Auth::id())->with(['role', 'accounts'])->firstOrFail();
    }
}
