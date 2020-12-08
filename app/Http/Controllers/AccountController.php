<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\InstanceHelper;
use App\Models\Account;
use Auth, Session;
class AccountController extends Controller
{
    public function index()
    {
        return view('account.index')->with('account', InstanceHelper::getAccount());
    }

    public function delete(Request $request)
    {
        $accountId = $request->account;
        if (InstanceHelper::getUser()->accounts->contains($accountId)) {
            if(InstanceHelper::getAccount($accountId)->contacts->count()){
                return redirect()->route('account.index')->with('error', "Account have contacts so it can't be deleted!");
            }
            Account::destroy($accountId);
            $request->session()->forget('account');
            $request->session()->put('success', 'Account Deleted!');
            return back();
        }
        return back()->with('error', 'Account Not Found!');
    }

    public function showCreateForm(Request $request)
    {
        return view('account.create');
    }
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'domain' => 'required',
        ]);

        $account = new Account();
        $account->name = $request->name;
        $account->domain = $request->domain;
        $account->pinned = '0';
        $account->created_by = Auth::id();
        $account->status = '1';
        $account->save();

        return redirect()->route('app.dashboard')->with('success', 'Account Created Successfully!');
    }
}
