<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Traits\RoleMessageValidtion;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use GeneralTrait;
    use RoleMessageValidtion;

public function registerByEmail (Request $request){
        $rules      = $this->getRulesRegisterByEmail();
        $messages   = $this->getMessagesRegisterByEmail();
        $validator  = Validator::make($request -> all(), $rules, $messages);
        if($validator -> fails()){
            return $this -> returnError('E000',$validator -> errors());
        }
        $user = new User();
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->save();
        return $this->returnSuccessMessage('Account successfully created');
}

public function registerByPhone (Request $request){

    $rules      = $this->getRulesRegisterByPhone();
    $messages   = $this->getMessagesRegisterByPhone();
    $validator  = Validator::make($request -> all(), $rules, $messages);
    if($validator -> fails()){
        return $this -> returnError('E000',$validator -> errors());
    }

    $user = new User();
    $user->first_name   = $request->first_name;
    $user->last_name    = $request->last_name;
    $user->phone        = $request->phone;
    $user->password     = Hash::make($request->password);
    $user->save();
    return $this->returnSuccessMessage('Account successfully created');

}


public function login(Request $request){

    try {
        if ($request->has('email')){
            $rules = ['email' => 'required','password' => 'required'];
        }else{
            $rules = ['phone' => 'required','password' => 'required'];
        }
        $validator = Validator::make($request -> all(),$rules);
        if($validator->fails()){
            return $this->returnValidationError($validator);
        }
        //login
        if ($request->has('email'))
            $credentials = $request -> only(['email','password']);
        else
            $credentials = $request -> only(['phone','password']);

        $token = Auth::guard('user-api') -> attempt($credentials);

        if(!$token)
            return  $this -> returnError('E0aht','some thing went wrongs');
            //return Token
            $user = Auth::guard('user-api')->user();
            $user -> api_Token = $token;
        return $user;
    } catch (\Exception $ex) {
        return $this -> returnError($ex -> getCode(),$ex -> getMessage());
    }
}


public function logout(Request $request){
    $token = $request -> header('auth-token');
    if($token){
        try {
            JWTAuth::setToken($token)->invalidate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this -> returnError('E000','some thing went wrongs');
        }

        return $this -> returnSuccessMessage('Logged out successfully');
    }else{
        return $this -> returnError('E000','some thing went wrongs');
    }
}
}
