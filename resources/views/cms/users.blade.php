@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-12">
      
      <h2>Users section</h2>
      
      @if(count($users) > 0)      
        <div class="row">
          
          <div class="col-md-6"><br />
            <table class="table">              
              <th>#</th>
              <th>User</th>
              <th>Registered at</th>
              <th>Orders</th>
              <th>Operation</th>
              
              @foreach($users as $row)             
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->registered_at }}</td>
                  <td>{{ $row->orders }}</td>
                  <td>
                    <a href="{{ url('cms/users/' . $row->id)}}">Delete</a>
                  </td>                  
                </tr>             
              @endforeach
              
            </table>            
          </div>
          
        </div> 
      
      @else      
        <i>No registered users...</i>             
      @endif
      
    </div>

  </div>

@stop