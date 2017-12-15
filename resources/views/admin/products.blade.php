@extends('layouts.master')
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
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ $product->imagePath }}" width="200px" height="200px"></td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td><a href="{{ route('admin.editProduct', ['id' => $product->id]) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                        <td>
                            {!! Form::open(['route' => 'admin.deleteProduct']) !!}
                            {!! Form::hidden('product_id', $product->id) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection