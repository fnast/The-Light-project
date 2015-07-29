@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-12">
      
      <h2>Categories section</h2>
      
      <p>  
        <a class="btn btn-primary btn-sm" href="{{ url('cms/categories/create') }}" role="button">+ Add new categorie</a>
      </p>
      
      @if(count($categories) > 0)      
        <div class="row">
          
          <div class="col-md-6"><br />
            <table class="table">              
              <th>#</th>
              <th>Categorie</th>
              <th>Operation</th>
              
              @foreach($categories as $row)             
                <tr>
                  <td>{{ $row['id'] }}</td>
                  <td>{{ $row['name'] }}</td>
                  <td>
                    <a href="{{ url('cms/categories/' . $row['id'] . '/edit')}}">Edit</a> |
                    <a href="{{ url('cms/categories/' . $row['id'])}}">Delete</a>
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