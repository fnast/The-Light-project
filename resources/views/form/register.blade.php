@extends('layout')

@section('content')

  <div class="row">
    
    <div class="container">
      <h2 class="page-header">Register</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
      </p>
    </div>
    
    <div class="col-md-6">
      
      <form method="post" action="{{ url('user/registerUser') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter email">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <div class="form-group">
          <label for="exampleInputRePassword1">Confirm password</label>
          <input type="password" name="re_password" class="form-control" id="exampleInputRePassword1" placeholder="Confirm password">
        </div>
        
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary">Sign up</button>       
        </div>
        
      </form>
      
    </div>
    
  </div>

@stop