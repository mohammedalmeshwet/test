<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Traits\RoleMessageValidtion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    use RoleMessageValidtion;

    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

            $value = request()->input('userName');
            $field = filter_var($value,FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            $user = new User();
            $user->first_name   = $request->first_name;
            $user->last_name    = $request->last_name;
            if($field == 'email'){
                $user->email        = $request->userName;
            }else{
                $user->phone        = $request->userName;
            }
            $user->password     = Hash::make($request->password);
            $user->save();


        return redirect('/login')->with('success', "Account successfully registered.");
    }
}
