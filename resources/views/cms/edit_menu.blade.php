@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-6">
      
      <h3>Edit menu</h3>
      
      <form method="post" action="{{ url('cms/menu/' . $menu['id']) }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH" />
        
        <div class="form-group">
          <label for="exampleInputLink1">Menu link</label>
          <input type="text" value="{{ $menu['link'] }}" name="link" class="form-control" id="exampleInputLink1" placeholder="Enter link">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Update menu</button>
        <a class="btn btn-default" href="{{ url('cms/menu') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop