@extends('layout')

@section('content')

  <div class="row">
      
    <div class="col-md-8">
      
      @if( !Cart::isEmpty() )
      
        <h2>Check out page</h2>

        <table class="table table-bordered">         
          <th>Product name</th>
          <th>Quantity</th>
          <th>Product price</th>
          <th>Sub total</th>
          
          @foreach(Cart::getContent()->toArray() as $key => $value)          
            <tr>              
              <td>{{ $value['name'] }}</td>
              <td>               
                <input data-op="minus" data-id="{{ $value['id'] }}" type="button" class="update-cart" value="-" />
                <input class="quantityField" type="text" size="1" value="{{ $value['quantity'] }}" />
                <input data-op="add" data-id="{{ $value['id'] }}" type="button" class="update-cart" value="+" />               
              </td>
              <td>{{ $value['price'] }}$</td>
              <td>{{ $value['price'] * $value['quantity'] }}$</td>             
            </tr>          
          @endforeach  
          
          <tr>
            <td><b>Total: </b>{{ Cart::getTotal() }}$</td>
          </tr>
                  
        </table>
        
        <div style="margin-bottom: 10px">         
          <a class="btn btn-primary" href="{{ url('shop') }}" role="button">
            <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
             Continue Shopping
          </a>&nbsp;
          <a class="btn btn-primary" href="{{ url('cart/order') }}" role="button">            
            Order now
            <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
          </a>
        </div>
        
      @else     
        <div class="col-md-12"><i>No Items in the cart...</i></div>     
      @endif
      
    </div>
      
  </div>

@stop