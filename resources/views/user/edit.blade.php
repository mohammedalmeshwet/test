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
                                    Update Personal Information
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
                                @elseif(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                                @endif
                       <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                          <div class="iq-card">
                             <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                   <h4 class="card-title">Personal Information</h4>
                                </div>
                             </div>
                             <div class="iq-card-body">

                                <form method="POST" action="{{route('user.update', ['id' => $user->id])}}">
                                    @csrf
                                   <div class=" row align-items-center">
                                      <div class="form-group col-sm-6">
                                         <label for="fname">First Name:</label>
                                         <input type="text" class="form-control" name="first_name" id="fname" value="">
                                      </div>
                                      <div class="form-group col-sm-6">
                                         <label for="lname">Last Name:</label>
                                         <input type="text" class="form-control" name="last_name" id="lname" value="">
                                      </div>
                                      <div class="form-group col-sm-6">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" id="email" value="">
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="">
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
