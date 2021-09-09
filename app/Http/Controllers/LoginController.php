<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Attempt to log the user in
        // Passwordnya pake bcrypt
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            // if successful, then redirect to their intended location
            return redirect()->route('home');
        } else {
            return redirect()->route('logout');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
