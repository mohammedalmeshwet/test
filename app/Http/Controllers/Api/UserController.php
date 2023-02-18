<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\RoleMessageValidtion;
use App\Traits\ControllerMaster\UserTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use GeneralTrait;
    use RoleMessageValidtion;
    use UserTrait;

    public function getProfile() {
        return $this->getProfileTrait('api');
    }

    public function updateInformationUser(Request $request){
        return $this->updateInformationUserTrait($request,'api');
    }

    public function update(Request $request, $id){
        return $this->updateTrait($request,$id,'api');
    }

    public function changePassword(Request $request){
        return $this->changePasswordTrait($request,'api');
    }

    public function index(){
        return $this->indexTrait('api');
    }

    
    public function store(Request $request){
        return $this->storeTrait($request,'api');
    }

    public function destroy($id){
        return $this->destroyTrait($id,'api');
    }

}
