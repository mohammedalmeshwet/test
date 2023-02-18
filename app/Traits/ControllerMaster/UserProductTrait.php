<?php

namespace App\Traits\ControllerMaster;

use App\Models\Product;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ImageSave;
use Illuminate\Support\Facades\Gate;
use App\Models\User_product;


trait  UserProductTrait
    {
    use GeneralTrait;

    public function addProductToUserTrait(Request $request,$typeReturn){
        $response = Gate::inspect('isAdmin');
        if( $response-> allowed()){
            $user_product = new User_product();
            $user_product->user_id = $request->user_id;
            $user_product->product_id = $request->product_id;
            $user_product->save();
            if($typeReturn == 'api')
                return $this->returnSuccessMessage('assign Product To User is successfully');
            else
                return redirect()->back()->with(['success' => 'createed successfully']);
        }else{
            if($typeReturn == 'api')
                return $this->returnError('E000',$response->message());
            else
                return redirect()->back();
        }
    }

    public function getProductsForUserTrait($typeReturn){
        $user = auth()->user();
        $products =  $user->products->makeHidden('pivot');
        if($typeReturn == 'api')
            return $this->returnData('products',$products);
        else
            return view('products.index', compact('products'));

    }

    public function getAllProductsForUserByAdminTrait($id,$typeReturn){
        $user =  User::find($id);
        $products =  $user->products()->paginate(10);
        if($typeReturn == 'api')
            return $this->returnData('products',$products);
        else
        return view('products.index', compact('products'));
    }

}

