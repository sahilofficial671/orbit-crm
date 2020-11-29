<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class TestController extends Controller
{
    public function test()
    {
        // $user = User::find(1);
        // return dd(Role::find(1));
        return dump(Role::all());
        return dd(Role::where('id', '>', 0)->get()->groupBy('created_at'));
        // return $;
    }
}
