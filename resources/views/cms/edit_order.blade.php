@extends('cms.master')

@section('content')

  <div class="row">
    
    <div class="col-md-6">
      
      <h3>Edit order</h3>
      
      <form method="post" action="{{ url('cms/orders/' . $orders['id']) }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH" />
        
        <div class="form-group">
          <label for="exampleInputLink1">Order status</label>
          <select name="status" class="form-control">
              
            @foreach($status as $row)              
              <option value="{{ $row->id }}">{{ $row->status }}</option>              
            @endforeach
              
          </select>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Update status</button>
        <a class="btn btn-default" href="{{ url('cms/orders') }}">Cancel</a>
        
      </form>
      
    </div>
    
  </div>

@stop