
@extends('auth.master')

@section('content')

                          <div class="sign-in-from">
                              <h1 class="mb-0 text-center">Register</h1>
                              <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>
                              <form class="mt-4"method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                  <div class="form-group">
                                      <label for="firstName">Your First Name</label>
                                      <input type="text" name="first_name" class="form-control mb-0" id="exampleInputEmail1" placeholder="Your First Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="lastName">Your Last Name</label>
                                    <input type="text" name="last_name" class="form-control mb-0" id="exampleInputEmail1" placeholder="Your Last Name">
                                </div>
                                  <div class="form-group">
                                      <label for="emailOrPhone">Email or Phone</label>
                                      <input type="text" name="userName" class="form-control mb-0" id="" placeholder="Enter email or Phone">
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                  </div>

                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-primary d-block w-100 mb-2">Sign Up</button>
                                      <span class="text-dark d-inline-block line-height-2">Already Have Account ? <a href="{{ route('login.show') }}">Log In</a></span>
                                  </div>
                              </form>
                          </div>

@stop

