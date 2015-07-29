@extends('cms.master') 

@section('content')

  <div class="row">
    
    <div class="col-md-6">
    
      <h2>Add new link</h2>
      
      <form method="post" action="{{ url('cms/menu') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group">
          <label for="exampleInputLink1">Link</label>
          <input type="text" name="link" class="form-control" id="exampleInputLink1" placeholder="Enter link">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Save menu</button>
        <a class="btn btn-default" href="{{ url('cms/menu') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop
