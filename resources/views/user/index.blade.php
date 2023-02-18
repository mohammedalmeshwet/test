
@extends('layouts.master')

@section('content')
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{Session::get('success')}}
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
        <table class="table table-bordered ">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('user.edit', ['id' => $user->id]) }}" >Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('user.delete',$user->id) }}" role="button">Delete</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('user.product',$user->id) }}" role="button">View user products</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>

@stop
