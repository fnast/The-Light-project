@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-12">
      
      <h2>Products section</h2>
      
      <p>  
        <a class="btn btn-primary btn-sm" href="{{ url('cms/products/create') }}" role="button">+ Add new product</a>
      </p>
      
      @if(count($products) > 0)      
        <div class="row">
          
          <div class="col-md-6"><br />
            <table class="table">              
              <th>#</th>
              <th>Product</th>
              <th>Operation</th>
              
              @foreach($products as $row)             
                <tr>
                  <td>{{ $row['id'] }}</td>
                  <td>{{ $row['title'] }}</td>
                  <td>
                    <a href="{{ url('cms/products/' . $row['id'] . '/edit')}}">Edit</a> |
                    <a href="{{ url('cms/products/' . $row['id'])}}">Delete</a>
                  </td>                  
                </tr>             
              @endforeach
              
            </table>            
          </div>
          
        </div> 
             
      @endif
      
    </div>
    
  </div>

@stop