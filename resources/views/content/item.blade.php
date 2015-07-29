
@extends('layout')

@section('content')

  <div class="row">
      
    @if(!empty($title))

      <div class="col-md-6">
        <h1>{{ $title }}</h1>
        <p>{!! $article !!}</p>
        <p><b>Price on site: </b>{{ $price }}$</p>
        <p class="btn-group">
          <button data-id="{{ $id }}" type="button" @if(Cart::get($id)) disabled="disabled" @endif class="btn btn-success add-to-cart">
            <span class="glyphicon glyphicon-shopping-cart"></span> Add to cart
          </button>
          <a class="btn btn-primary" href="{{ url('cart/checkout') }}" role="button">Checkout »</a>
        </p>
      </div>
      <div class="col-md-6">
        <img class="img-responsive" src="{{ asset('images/' . $image) }}">
      </div>
      
    @else  
      <div class="col-md-12"><i>Product does not exist!</i></div>      
    @endif  
      
  </div>

@stop