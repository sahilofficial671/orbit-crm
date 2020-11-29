<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\InstanceHelper;
use App\Models\Account;
class AccountController extends Controller
{
    public function index()
    {
        return view('account.index')->with('accounts', InstanceHelper::getAccounts());
    }

    public function dashboard(Int $account_id, Request $request)
    {
        $account = InstanceHelper::getSelectedAccount();

        if($account->id === $account_id){
            return view('account.dashboard')->with('account', $account);
        }
        return redirect()->route('account.index')->with('info', 'Please select one of your account first!.');
    }

    public function select(Request $request)
    {
        if($request->account){
            InstanceHelper::setAccount(intval($request->account));
            return redirect()->route('account.dashboard', ['account'=> InstanceHelper::getSelectedAccount()->id]);
        }
        return redirect()->back()->with('info', 'Please select one of your account.');
    }
    public function delete(Request $request)
    {
        $accountId = $request->account;

        if (InstanceHelper::getAccounts()->contains('id', $accountId)) {
            if(Account::find($accountId)->companies->count()){
                return redirect()->route('account.index')->with('error', "Account have companies so it can't be deleted!");
            }
            // Account::find($accountId)->delete();
            return back()->with('success', 'Company Deleted Successfully!');
        }

        return back()->with('error', 'Account Not Found!');
    }
}
