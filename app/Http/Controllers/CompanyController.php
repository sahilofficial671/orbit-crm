<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\User;
use Auth;
use App\Traits\CommonTraits;
use App\Helpers\InstanceHelper;
class CompanyController extends Controller
{
    use CommonTraits;

    public function index(Request $request)
    {
        $companies = InstanceHelper::getAccountCompanies();

        return view('company.index')->with('companies', $companies);
    }
    public function create($accountId, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->account_id = $accountId;
        $company->created_by = Auth::id();
        $company->status = 1;
        $company->save();

        return back()->with('success', 'Company Added Successfully!');
    }

    public function delete(Request $request)
    {
        $companyId = $request->company;

        if (InstanceHelper::getAuthCompanies()->contains('id', $companyId)) {
            if(Company::find($companyId)->contacts->count()){
                return back()->with('error', "Company have contacts so it can't be deleted!");
            }
            Company::find($companyId)->delete();
            return back()->with('success', 'Company Deleted Successfully!');
        }

        return back()->with('error', 'Company Not Found!');
    }
}
