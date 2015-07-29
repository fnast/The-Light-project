@extends('layout')

@section('content')
  
  <div class="row">
    
   @if(count($orders) >0)
  
    <div class="row">
      <div class="col-md-12 wrap-content"> 
        <h2>Welcome {{ Session::get('user_name') }}</h2>
        <p>
          Thank you for your order! Here you can see the path it will go through until it <span class="label label-success">delivered</span> . Afterward, order data will be erased.
        </p>  
        <p>
          Feel free to contact us!
        </p>  
        <p>
          <a class="btn btn-primary" href="{{ url('shop') }}" role="button">Go to Shop</a>
        </p>
      </div>
    </div>
    @if(count($orders) >0)      
      <div class="table-wrap center-block">      
        <table class="table table-condensed">
            
          <th>Order ID</th>
          <th>Order date</th>
          <th>Total</th>
          <th>Status</th>
          
          @foreach($orders as $row)            
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->date }}</td>
              <td>{{ $row->total }}$</td>
              <td><span class="label label-{{ $row->class }}">{{ $row->status }}</span></td>                        
            </tr>          
          @endforeach
            
        </table>      
      </div>      
    @endif
    
  @else
    <div class="col-md-12 wrap-content"> 
      <h2>Welcome {{ Session::get('user_name') }}</h2>
      <p>
        You have not ordered yet... and we would like to show you our best products!</span>
      </p>   
      <p>
        <a class="btn btn-primary" href="{{ url('shop') }}" role="button">Go to Shop</a>
      </p>
    </div>
  @endif
    
  </div>
  
@stop