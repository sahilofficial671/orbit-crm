<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Contact;
use Auth;
use Session;
use App\Traits\CommonTraits;
use App\Helpers\InstanceHelper;
class ContactController extends Controller
{
    use CommonTraits;

    public function index(Int $accountId, Request $request)
    {
        $account = InstanceHelper::getSelectedAccount();

        if($account->id === $accountId){
            return view('contact.index')->with('contacts', InstanceHelper::getAccountContacts());
        }
        return redirect()->route('account.index')->with('info', 'Please select one of your account first!.');
    }
    public function create(Int $accountId, Request $request)
    {
        if($this->validateAccountWithSession($accountId)){
            return redirect()->route('account.index')->with('info', 'Please select one of your account first!.');
        }

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->account_id = $request->account_id;
        $contact->status = '1';
        $contact->save();

        return back()->with('success', 'Company Added Successfully!');
    }
    public function delete(Request $request)
    {
        $contactId = $request->contact;

        if (InstanceHelper::getAccountContacts()->contains('id', $contactId)) {
            Contact::find($contactId)->delete();
            return back()->with('success', 'Contact Deleted Successfully!');
        }

        return back()->with('error', 'Contact Not Found!');
    }

    public function validateAccountWithSession(Int $accountId)
    {
        return $accountId === InstanceHelper::getSelectedAccount();
    }
}
