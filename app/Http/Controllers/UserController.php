<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\InstanceHelper;
use Hash, Auth;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function showProfileForm()
    {
        return view('user.profile.index')->with('user', InstanceHelper::getUser());
    }
    public function editProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $user = InstanceHelper::getUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile Updated.');
    }
    public function showPasswordForm()
    {
        return view('user.password.index');
    }
    public function editPassword(Request $request)
    {
        $user = InstanceHelper::getUser();

        $validator = Validator::make($request->all(), [
                        'current_password' => ['required', 'string'],
                        'password' => $this->passwordRules(),
                    ])->after(function ($validator) use ($user, $request) {
                        if (! Hash::check($request->current_password, $user->password)) {
                            $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
                        }
                    });

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        if($request->logout_from_all_sessions){
            Auth::guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('success', 'Password Changed & Logged out of all sessions.');
        }

        return back()->with('success', 'Password Updated.');
    }
}
