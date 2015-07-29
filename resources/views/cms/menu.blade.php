@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-12">
      
      <h2>Menu section</h2>
      
      <p>  
        <a class="btn btn-primary btn-sm" href="{{ url('cms/menu/create') }}" role="button">+ Add new link</a>
      </p>
      
      @if(count($menus) > 0)      
        <div class="row">
          
          <div class="col-md-6"><br />
            <table class="table">              
              <th>#</th>
              <th>Link</th>
              <th>Operation</th>
              
              @foreach($menus as $row)             
                <tr>
                  <td>{{ $row['id'] }}</td>
                  <td>{{ $row['link'] }}</td>
                  <td>
                    <a href="{{ url('cms/menu/' . $row['id'] . '/edit')}}">Edit</a> |
                    <a href="{{ url('cms/menu/' . $row['id'])}}">Delete</a>
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