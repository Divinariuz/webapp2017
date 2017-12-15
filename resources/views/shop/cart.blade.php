@extends('layouts.master')
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col s6 m6 push-s3">
                <ul class="collection">
                    @foreach($products as $product)
                            <li class="collection-item avatar">
                                <span class="title">{{ $product['item']['title'] }}</span>
                                <p><span class="new badge" data-badge-caption="">{{ $product['qty'] }}</span><br/>
                                    ${{ $product['price'] }}<br/>
                                    <a href="{{ route('shop.reduceByOne', ['id' => $product['item']['id']]) }}" class="waves-effect waves-light btn">Reduce by One</a>
                                    <a href="{{ route('shop.remove', ['id' => $product['item']['id']]) }}" class="waves-effect waves-light btn">Reduce All</a>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart.</h2>
            </div>
        </div>
    @endif
@endsection