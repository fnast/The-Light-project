@extends('layout')

@section('content')

  <div class="row">
    
    <div class="form-wrapper center-block">
      
      <div class="panel panel-primary">

        <div class="panel-heading">
          <h2 class="panel-title">Login page</h2>
        </div>
        <div class="panel-body">
          <form method="post" action="{{ url('user/loginUser') }}">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            @if($destination)
              <input type="hidden" name="destination" value="{{ $destination }}">
            @endif
    
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Sign in</button>       
            
          </form>       
        </div>
        
      </div>
      
    </div>
    
  </div>

@stop