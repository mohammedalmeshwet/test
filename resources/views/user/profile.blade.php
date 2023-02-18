@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="iq-card">
               <div class="iq-card-body p-0">
                  <div class="iq-edit-list">
                     <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-12 p-0">
                           <a class="nav-link active" data-toggle="pill" href="#personal-information">
                               Profile
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
       <h2>{{$user->role}}</h2>
       <h6><span>First name : </span>{{$user->first_name}}</h6>
       <h6><span>Last name : </span>{{$user->last_name}}</h6>
       <h6><span>Email : </span>{{$user->email}}</h6>
       <h6><span>Phone : </span>0{{$user->phone}}</h6>
    </div>
@stop
