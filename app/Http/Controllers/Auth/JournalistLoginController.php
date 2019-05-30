<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class JournalistLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:journalist')->except(['logout', 'showLoginForm']);
    }
    public function showLoginForm()
    {
        return view('auth.journalist-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
        if(Auth::guard('journalist')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //if successful, then redirect to their intended location
            return redirect()->intended(route('journalist.dashboard'));
        }

        //if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('journalist')->logout();
        return redirect()->route('journalist.login');
    }
}
