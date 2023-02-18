@extends('layouts.master')
    @section('content')

        <div class="container-fluid">
           <div class="row">
              <div class="col-lg-12">
                 <div class="iq-card">
                    <div class="iq-card-body p-0">
                       <div class="iq-edit-list">
                          <ul class="iq-edit-profile d-flex nav nav-pills">
                             <li class="col-md-12 p-0">
                                <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Update Product
                                </a>
                             </li>
                          </ul>
                       </div>
                    </div>
                 </div>
              </div>


              <div class="col-lg-12">
                 <div class="iq-edit-list-data">
                    <div class="tab-content">
                        @if(Session::has('success'))
                        <div class="alert alert-info" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                       <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                          <div class="iq-card">
                             <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                   <h4 class="card-title">Update Product</h4>
                                </div>
                             </div>
                             <div class="iq-card-body">
                                <form method="POST" action="{{route('product.update', ['id' => $product->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="ProductName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name='name' value="{{ $product->name }}" placeholder="Product Name">
                                            @error('name')
                                                <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="image" class="form-label">image</label>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea type="text" class="form-control" name='description' value="{{ $product->description }}" placeholder="description"></textarea>
                                            @error('description')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                   </div>
                                   <button type="submit" class="btn btn-primary mr-2">Apply</button>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>

    @stop
