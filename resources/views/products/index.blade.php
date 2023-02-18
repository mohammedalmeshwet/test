
@extends('layouts.master')

@section('content')
    <div class="container">
        <table class="table table-bordered ">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">description</th>
                    @if( Auth::user()->role == "admin")
                        <th scope="col"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->image }}</td>
                    <td>{{ $product->description }}</td>
                    @if( Auth::user()->role == "admin")
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('product.edit', ['id' => $product->id]) }}" >Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('product.delete',$product->id) }}" role="button">Delete</a>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            @if( Auth::user()->role == "admin")
            {!! $products->links() !!}
            @endif
        </div>
    </div>

@stop
