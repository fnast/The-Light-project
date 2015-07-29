@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-8">
      
      @if(count($orders) >0)
      
        <h2>Site shop orders:</h2><br />
        
        <table class="table">
          
          <th>User</th>
          <th>Order date</th>
          <th>Last updated</th>
          <th>Order details</th>
          <th>Total</th>
          <th>Status</th>
          <th>Operation</th>
          
          @foreach($orders as $row)            
            <tr>
              <td>{{ $row->name }}</td>
              <td>{{ $row->date }}</td>
              <td>{{ $row->last_update }}</td>
              
              <td>                
                <ul class="nav">                 
                  @foreach(json_decode($row->data) as $value)               
                    <li>
                      {{ $value->name }}, Quantity: {{ $value->quantity }}, By price: {{ $value->price }}$ 
                    </li>                                                    
                  @endforeach                  
                </ul>                
              </td>
  
              <td>{{ $row->total }}$</td>
              <td><span class="label label-{{ $row->class }}">{{ $row->status }}</span></td>          
              <td><a href="{{ url('cms/orders/' . $row->id . '/edit')}}">Edit</a></td>              
            </tr>          
          @endforeach
          
        </table>
      
      @else      
        <i>No orders...</i>      
      @endif
      
    </div>
    
  </div>

@stop
