@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-12">
      
      <h2>Contents section</h2>
      
      <p>  
        <a class="btn btn-primary btn-sm" href="{{ url('cms/contents/create') }}" role="button">+ Add new content</a>
      </p>
      
      @if(count($contents) > 0)      
        <div class="row">
          
          <div class="col-md-6"><br />
            <table class="table">              
              <th>#</th>
              <th>Content title</th>
              <th>Operation</th>
              
              @foreach($contents as $row)             
                <tr>
                  <td>{{ $row['id'] }}</td>
                  <td>{{ $row['title'] }}</td>
                  <td>
                    <a href="{{ url('cms/contents/' . $row['id'] . '/edit')}}">Edit</a> |
                    <a href="{{ url('cms/contents/' . $row['id'])}}">Delete</a>
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