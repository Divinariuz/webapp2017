@extends('layouts.master')

<style>
    .table .center {
        vertical-align: middle;
        text-align: center;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-offset-0">
            <div class="col-xs-8"><h1>Product Management</h1></div>
            <div class="col-xs-4" align="right"><a href="{{ route('admin.getCreateProduct') }}"><button type="button" class="btn btn-success">Add new product</button></a></div>
        </div>
        <div class="col-md-12 col-md-offset-0">

            <hr/>

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <table class="table table-striped">
                <tr>
                    <th class="center">ID</th>
                    <th class="center">Title</th>
                    <th class="center">Description</th>
                    <th class="center">Price</th>
                    <th class="center">Image</th>
                    <th class="center">Created</th>
                    <th class="center">Updated</th>
                    <th class="center">Edit</th>
                    <th class="center">Delete</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td class="center">{{ $product->id }}</td>
                        <td class="center">{{ $product->title }}</td>
                        <td class="center">{{ $product->description }}</td>
                        <td class="center">{{ $product->price }}</td>
                        <td class="center"><img src="{{ $product->imagePath }}" width="200px" height="200px"></td>
                        <td class="center">{{ $product->created_at }}</td>
                        <td class="center">{{ $product->updated_at }}</td>
                        <td class="center"><a href="{{ route('admin.editProduct', ['id' => $product->id]) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                        <td class="center"><a href="{{ route('admin.deleteProduct', ['id' => $product->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection