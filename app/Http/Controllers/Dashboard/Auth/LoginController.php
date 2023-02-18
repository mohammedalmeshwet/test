<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = request()->input('username');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        request()->merge([$fieldType => $login]);
    if($fieldType == 'email'){
        $credentials = $request->validate(['email' => ['required'],'password' => ['required'],]);
    }else{
        $credentials = $request->validate(['phone' => ['required'],'password' => ['required'],
        ]);
    }

        if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
            return redirect('home');
        }


        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

}
