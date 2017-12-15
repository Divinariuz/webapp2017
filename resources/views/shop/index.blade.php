@extends('layouts.master')

@section('content')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ $product->imagePath }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $product->title }}</span>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="card-action">
                            <p class="left price">${{ $product->price }}</p>
                            <a href="{{ route('shop.addToCart', ['id' => $product->id]) }}" class="waves-effect waves-light btn right" role="button">Add to Cart</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection