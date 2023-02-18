
@extends('auth.master')

@section('content')
    <div class="sign-in-from">
                              <h1 class="mb-0 text-center">Login</h1>
                              <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>
                              <form class="mt-4" method="POST" action="{{ route('login.perform') }}">
                                @csrf
                                  <div class="form-group">
                                      <label for="username">Email or phone</label>
                                      <input id="username" type="text" class="form-control mb-0" name="username" id="EmailOrPhoneId" placeholder="Email or Phone" autocomplete="userName" required autofocus>
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control mb-0" id="password"  name="password" required autocomplete="current-password" placeholder="Password">
                                  </div>

                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-primary d-block w-100 mb-2">Sign in</button>
                                      <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="{{ route('register.show') }}">Sign up</a></span>
                                  </div>
                              </form>
                          </div>

        @stop


