<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/docs.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/simple-sidebar.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <script> var BASE_URL = "{{ url() }}/"</script>     
  </head>
  <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li class="sidebar-brand">
              <a href="{{ url() }}"><img alt="Brand" src="{{ asset('images/logo.png') }}"></a>
            </li>
            <li><a href="{{ url('cms/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('cms/menu') }}">Menu</a></li>
            <li><a href="{{ url('cms/contents') }}">Contents</a></li>
            <li><a href="{{ url('cms/categories') }}">Categories</a></li>
            <li><a href="{{ url('cms/products') }}">Products</a></li>
            <li><a href="{{ url('cms/orders') }}">Orders</a></li>
            <li><a href="{{ url('cms/users') }}">Users</a></li>
            <li><a href="{{ url() }}">Back to site</a></li>
            <li><a href="{{ url('user/logout') }}">Logout</a></li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">She shop cms management system</h1>
              
              <div class="col-md-10">
        
                @if(Session::has('success_message'))
                
                  <div class="row">                          
                    <div class="col-md-12">                            
                      <div class="alert alert-success success-message" role="alert">{{ Session::get('success_message') }}</div>                            
                    </div>                         
                  </div>
                
                @endif
                
                @if($errors->any())
                
                  <div class="row">                            
                    <div class="col-md-12">                              
                      <div class="alert alert-danger" role="alert">
                        
                        <ul>                                  
                          @foreach($errors->all() as $error)                  
                            <li>{{ $error }}</li>                 
                          @endforeach                                  
                        </ul>
                        
                      </div>                              
                    </div>                            
                  </div>
                
                @endif
                
                @if(Session::has('error_messege'))
                
                  <div class="row">            
                    <div class="col-md-12">              
                      <div class="alert alert-danger" role="alert">              
                        <ul><li>{{ Session::get('error_messege') }}</li></ul>              
                      </div>              
                    </div>           
                  </div>
                
                @endif
                
                <a href="#menu-toggle" class="btn btn-default btn-sm" id="menu-toggle">Toggle Menu</a>

                @yield('content')
                    
            </div>
          </div>
        </div>
      </div>
     </div>
      <!-- /#page-content-wrapper -->

    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>