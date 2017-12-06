@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            {!! Form::open(['route' => ['admin.updateProduct', $product->id]]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description', $product->description, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagePath', 'Image Path:') !!}
                {!! Form::text('imagePath', $product->imagePath, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection