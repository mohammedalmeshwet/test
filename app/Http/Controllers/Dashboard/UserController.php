<?php
namespace App\Http\Controllers\Dashboard;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\RoleMessageValidtion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Traits\ControllerMaster\UserTrait;

class UserController extends Controller
{
    use GeneralTrait;
    use RoleMessageValidtion;
    use UserTrait;


    public function getProfile() {
        return $this->getProfileTrait('dashboard');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user', $user));
    }


    public function updateInformationUser(Request $request){
        return $this->updateInformationUserTrait($request,'dashboard');
    }
    public function update(Request $request, $id){
        return $this->updateTrait($request,$id,'dashboard');
    }


    public function changePasswordShow(){
        return view('user.changPassword');
     }

    public function changePassword(Request $request){
        return $this->changePasswordTrait($request,'dashboard');
     }

    public function index(){
        return $this->indexTrait('dashboard');
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        return $this->storeTrait($request,'dashboard');
    }

    public function destroy($id){
        return $this->destroyTrait($id,'dashboard');
    }



}
