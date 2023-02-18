<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ControllerMaster\ProductTrait;
use App\Traits\GeneralTrait;
use App\Traits\ImageSave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    use GeneralTrait;
    use ImageSave;
    use ProductTrait;

    public function index(){
            $products = Product::paginate(10);
            return view('products.index', compact('products'));

    }

    public function store(Request $request){
        return $this->storeTrait($request,'api');
    }


    public function update(Request $request, $id){
        return $this->updateTrait( $request,$id,'api');
    }


    public function destroy($id){
        return $this->destroyTrait($id,'api');
    }
}
