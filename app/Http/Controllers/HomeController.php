<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
