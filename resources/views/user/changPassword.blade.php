@extends('layouts.master')

@section('content')
        @if(Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{Session::get('success')}}
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
        <form class="mt-4" method="POST" action="{{ route('changePassword.perform') }}">
            @csrf
            <div class="form-group">
            <label for="current_password">current password</label>
            <input type="text" class="form-control" id="current_passwordId" name="current_password" placeholder="current Password">
            </div>
            <div class="form-group">
                <label for="new_password">new password</label>
                <input type="password" class="form-control" id="new_passwordId" name="new_password" placeholder="new password">
            </div>
            <div class="form-group">
                <label for="newPasswordConfirmation">new password confirmation</label>
                <input type="password" class="form-control" id="newPasswordConfirmationId" name="new_password_confirmation" placeholder="new password confirmation">
            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
@stop
