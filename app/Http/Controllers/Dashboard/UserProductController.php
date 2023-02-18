<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User_product;
use App\Traits\ControllerMaster\UserProductTrait;
use Illuminate\Support\Facades\Gate;

class UserProductController extends Controller
{
    use GeneralTrait;
    use UserProductTrait;

    public function addProductToUserShow(){
        return view();
    }

    public function addProductToUser(Request $request){
        return $this->addProductToUserTrait($request,'dashboard');
     }

    public function getProductsForUser(){
        return $this->getProductsForUserTrait('dashboard');
    }

    public function getAllProductsForUserByAdmin($id){
        return $this->getAllProductsForUserByAdminTrait($id,'dashboard');
    }

}

