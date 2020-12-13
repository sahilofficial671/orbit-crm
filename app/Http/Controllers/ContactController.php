<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\State;
use Auth;
use App\Helpers\InstanceHelper;
class ContactController extends Controller
{

    public function index($accountId, Request $request)
    {
        return view('contact.index')->with(
            [
                'contacts' => InstanceHelper::getAccountContacts(),
                'states' => InstanceHelper::getStates(),
                'countries' => InstanceHelper::getCountries(),
            ]);
    }
    public function create($accountId, Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'job_title' => 'max:50|min:2|nullable',
                'phone' => 'digits:10|nullable',
                'landline' => 'digits_between:5,15|nullable',
                'fax' => 'max:15|numeric|nullable',
                'city' => 'alpha|max:50|nullable',
                'state' => 'size:2|alpha|nullable',
                'country' => 'size:2|alpha|nullable',
                'address' => 'min:5|max:200|string|nullable',
            ],
            [
                'state_code.size' =>'Please select state.',
                'state_code.alpha' =>'Please select state.',
                'country_code.size' =>'Please select country.',
                'country_code.alpha' =>'Please select country.',
            ],
        );

        if($request->contactId){
            $contact = Contact::findOrFail($request->contactId);
        }else{
            $contact = new Contact();
        }

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->job_title = $request->job_title;
        $contact->phone = $request->phone;
        $contact->landline = $request->landline;
        $contact->fax = $request->fax;
        $contact->city = $request->city;
        $contact->postcode = $request->postcode;
        $contact->state_code = $request->state_code;
        $contact->country_code = $request->country_code ?? null;
        $contact->address = $request->address ?? null;
        $contact->account_id = $accountId;
        $contact->created_by = Auth::id();
        $contact->status = '1';

        $message = '';

        if($request->contactId){
            $message = 'Contact Edited Successfully!';
            $contact->update();
        }else{
            $message = 'Contact Added Successfully!';
            $contact->save();
        }
        return back()->with('success', $message);
    }
    public function edit($accountId, $contactId, Request $request)
    {
        $contact = Contact::where('id', $contactId)->with(['company', 'state', 'country'])->firstOrFail();
        if($contact){
            return view('contact.edit')->with(
                [
                    'contact' => $contact,
                    'states' => InstanceHelper::getStates(),
                    'countries' => InstanceHelper::getCountries(),
                ]);
        }
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
