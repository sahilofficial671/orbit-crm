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

    public function index($accountId, Request $request)
    {
        return view('contact.index')->with('contacts', InstanceHelper::getAccountContacts());
    }
    public function create($accountId, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->account_id = $accountId;
        $contact->created_by = Auth::id();
        $contact->status = '1';
        $contact->save();

        return back()->with('success', 'Contact Added Successfully!');
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
}
