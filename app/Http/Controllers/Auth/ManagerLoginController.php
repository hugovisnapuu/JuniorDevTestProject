<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:manager');
    }

    public function showLoginForm()
    {
        return view('auth.manager-login');
    }

    public function login(Request $request)
    {
        // Validate the form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('manager')->attempt(['email' => request('email'),
            'password' => request('password')], request()->remember))
        {
            $manager = Manager::all();
            // If successful, redirect to the intended location
            return redirect()->intended(route('manager.dashboard'));
        }

        // If unsuccessful, redirect back to the login with form data
        return redirect()->back()->withInput(request()->only('email', 'remember'));
    }
}
