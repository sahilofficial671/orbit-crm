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

    public function index(Request $request)
    {
        $contacts = $this->getAuthCompanies();
        $companies->map(function($company){
            $company->encodedId = $this->encode($company->id);
            return $company;
        });
        return view('user.company.index')->with('companies', $companies);
    }
    public function getCompanySelected()
    {
        if(Session::has('company')){
            return Session::get('company');
        }else if(Auth::user()->companies){
            return Auth::user()->companies->first();
        }else{
            return route('company.select')->with('info', 'Please select company first!');
        }
    }
}
