<?php

namespace App\Traits\ControllerMaster;

use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\RoleMessageValidtion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

trait  UserTrait
    {
        use GeneralTrait;
        use RoleMessageValidtion;

    public function getProfileTrait($typeReturn) {
        $user = auth()->user();


        if($typeReturn == "api")
            return $this->returnData("user", $user);
        else
            return view('user.profile', compact('user'));
        }


    public function updateInformationUserTrait(Request $request,$typeReturn){
        $user = auth()->user();
        return $this->updateTrait($request,$user->id,$typeReturn);

    }

    public function updateTrait(Request $request, $id,$typeReturn){
        $rules      = $this->getRules();
        $messages   = $this->getMessages();
        $validator  = Validator::make($request -> all(), $rules, $messages);
        if($validator -> fails()){
            if($typeReturn == "api")
                return $this -> returnError('E000',$validator -> errors());
            else
                return redirect()->back()->with($validator -> errors());
        }
        User::where('id',$id)->update([
            'first_name'    => $request -> first_name,
            'last_name'     => $request -> last_name,
            'email'         => $request -> email,
            'phone'         => $request -> phone,
        ]);
        if($typeReturn == "api")
            return $this->returnSuccessMessage('Updateed successfully');
        else
            return redirect()->back()->with(['success' => 'Updateed successfully']);
    }

    public function changePasswordTrait(Request $request,$typeReturn){
        $user       = auth()->user();
        $rules      = $this->getRulesPassword();
        $messages   = $this->getMessagesPassword();
        $validator  = Validator::make($request -> all(), $rules, $messages);
        if($validator -> fails()){
            if($typeReturn == "api")
                return $this -> returnError('E000',$validator -> errors());
            else
                return redirect()->back()->with($validator -> errors());
        }
        if (!Hash::check($request->current_password, $user->password))
        {
            if($typeReturn == "api")
                return $this -> returnError('E00P','Current Password is Invalid');
            else
                return redirect()->back()->with(['error' => 'Current Password is Invalid']);
        }
        $user               = User::find($user->id);
        $user->password     =  Hash::make($request->new_password);
        $user->save();
        if($typeReturn == "api")
            return $this -> returnSuccessMessage("Password Changed Successfully");
        else
            return redirect()->back()->with(['success' => 'Password Changed Successfully']);
    }

    public function indexTrait($typeReturn){
        $response = Gate::inspect('isAdmin');
        if( $response-> allowed()){
            $users = User::paginate(10);
            if($typeReturn == 'api')
                return $this->returnData("users", $users);
            else
                return view('user.index', compact('users'));
        }else{
            if($typeReturn == 'api')
                return $this->returnError('E000',$response->message());
            else
                return redirect()->back();
        }

    }

    public function storeTrait(Request $request,$typeReturn){
        $response = Gate::inspect('isAdmin');
        if( $response-> allowed()){
            $rules      = $this->getRolesSaveUser();
            $messages   = $this->getMessagesSaveUser();
            $validator  = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails()){
                if($typeReturn == 'api')
                    return $this -> returnError('E000',$validator -> errors());
                else
                    return redirect()->back()->with($validator -> errors());
            }
            $user = new User();
            $user->first_name   = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->password     = Hash::make($request->password);
            $user->save();
            if($typeReturn == 'api')
                return $this->returnSuccessMessage('Add User successfully ');
            else
                return redirect()->back()->with(['success' => 'Add User successfully']);
        }else{
            if($typeReturn == 'api')
                return $this->returnError('E000',$response->message());
            else
                return redirect()->back();
        }
    }






    public function destroyTrait($id,$typeReturn){
        $response = Gate::inspect('isAdmin');
        if( $response-> allowed()){
            if( User::destroy($id) ) {
                if($typeReturn == 'api')
                    return $this->returnSuccessMessage('User Deleted Successfully');
                else
                    return redirect()->back()->with(['success' => 'Deleted Successfully']);
            }else{
                if($typeReturn == 'api')
                    return $this -> returnError('E000','The deletion process was not completed');
                else
                    return redirect()->back()->with(['error' => 'The deletion process was not completed']);
            }
        }else{
            if($typeReturn == 'api')
                return $this->returnError('E000',$response->message());
            else
                return redirect()->back()->with($response->message());
    }
    }
}
