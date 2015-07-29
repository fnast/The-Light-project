@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-6">
      
      <h3>Are you sure you want to delete this user?</h3>
      <p class="text-danger">* Pay attention! Order data of this user will be saved.</p>
      
      <form method="post" action="{{ url('cms/users/' . $id) }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
  
        <button type="submit" name="submit" class="btn btn-default">Delete</button>
        <a class="btn btn-default" href="{{ url('cms/users') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop
