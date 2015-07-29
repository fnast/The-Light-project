@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-6">
      
      <h3>Are you sure you want to delete this categorie?</h3>
      
      <form method="post" action="{{ url('cms/categories/' . $id) }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
  
        <button type="submit" name="submit" class="btn btn-default">Delete</button>
        <a class="btn btn-default" href="{{ url('cms/categories') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop
