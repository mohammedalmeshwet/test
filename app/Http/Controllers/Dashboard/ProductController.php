<?php

namespace App\Http\Controllers\Dashboard;

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

    public function create(){
        return view('products.create');
   }


    public function store(Request $request){
        return $this->storeTrait($request,'dashboard');
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product', $product));
    }

    public function update(Request $request, $id){
        return $this->updateTrait( $request,$id,'dashboard');
    }

    public function destroy($id){
        return $this->destroyTrait($id,'dashboard');
    }
}
