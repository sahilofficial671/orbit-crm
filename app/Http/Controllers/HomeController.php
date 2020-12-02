<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
