
@extends('layout')

@section('content')

  <div class="row">
    
    @if(!empty($cat))
    <div class="col-md-12">
      <h1>{{ $cat }}</h1>
      <hr />
    </div>
    @endif
      
     @if(count($products) > 0)
      
       @foreach($products as $value)

         <div class="col-md-3">
           <h2>{{ $value['title'] }}</h2>
           <p>{!! $value['article'] !!}</p>
           <p><b>Price on site: </b>{{ $value['price'] }}$</p>
           <p class="btn-group">
             <button data-id="{{ $value['id'] }}" type="button" @if(Cart::get($value['id'])) disabled="disabled" @endif class="btn btn-success add-to-cart">
               <span class="glyphicon glyphicon-shopping-cart"></span> Add to cart
             </button>
             <a class="btn btn-default" href="{{ url('shop/' . $url . '/' . $value['url']) }}" role="button">View details »</a>
           </p>
         </div>
         <div class="col-md-3 prod-div">
           <img class="img-responsive img-thumbnail" src="{{ asset('images/' . $value['image']) }}">
         </div>
       
      @endforeach
      
    @else      
      <div class="col-md-12"><i>No products for this categorie...</i></div>      
    @endif
      
  </div>

@stop
