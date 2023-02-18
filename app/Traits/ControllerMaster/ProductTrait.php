<?php

namespace App\Traits\ControllerMaster;

use App\Models\Product;
use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ImageSave;
use App\Traits\RoleMessageValidtion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

trait  ProductTrait
    {
    use GeneralTrait;
    use ImageSave;

    public function index(){

            $products = Product::paginate(10);
            return view('products.index', compact('products'));

    }

    public function storeTrait(Request $request,$typeReturn){
        $image_path             = $this -> saveImage($request -> image,'Product/Image');
        $product                = new Product();
        $product->name          = $request->name;
        $product->image         = $image_path;
        $product->description   = $request->description;
        $product -> save();
        if($typeReturn == 'api')
            return $this->returnSuccessMessage('product has been added sucessfully');
        else
            return redirect()->back()->with(['success' => 'createed successfully']);
    }

    public function updateTrait(Request $request, $id,$typeReturn){
        $image_path             = $this -> saveImage($request -> image,'Product/Image');
        $product                = Product::findOrFail($id);
        $product->name          = $request->name;
        $product->image         = $image_path;
        $product->description   = $request->description;
        if( $product->save() ) {
            if($typeReturn == 'api')
                return $this->returnSuccessMessage('Product Updateed successfully.');
            else
                return redirect()->back()->with('success', 'Product successfully updated.');
        }else{
            if($typeReturn == 'api')
                return $this -> returnError('E000','The Update process was not completed.');
            else
                return redirect()->back()->with('error', 'The Update process was not completed.');
        }
    }

    public function destroyTrait($id, $typeReturn){
        if( Product::destroy($id) ) {
            if($typeReturn == 'api')
                return $this->returnSuccessMessage('Product Deleted Successfully.');
            else
                return redirect()->back()->with('success', 'Product Deleted Successfully.');
        }else{
            if($typeReturn == 'api')
                return $this -> returnError('E000','The deletion process was not completed');
            else
                return redirect()->back()->with('success', 'Product Deleted Successfully.');
        }
    }
}
