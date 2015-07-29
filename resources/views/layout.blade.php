<?php $cartCollection = Cart::getContent(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @if(!empty($title)) {{ $title }} @else The Light @endif </title> 
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/docs.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" /> 
    <script> var BASE_URL = "{{ url() }}/"</script>   
  </head>
  <body>
    
    <div class="page-wrapper">
      <!--navbar-->
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="{{ url() }}" class="navbar-brand"><img alt="Brand" src="{{ asset('images/logo.png') }}"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
              @if($menu = App\Menu::all())
                 
                @foreach($menu->toArray() as $value)              
                  <li id="{{ url($value['id']) }}"><a href="{{ url($value['url']) }}">{{ $value['link']}}</a></li>             
                @endforeach
                 
              @endif

              @if($categories = App\Categorie::all())              
                <li class="dropdown">
                  <a data-target="#" href="{{ url('shop') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
  
                    @foreach($categories as $cat)
                      <li><a href="{{ url('shop/' . $cat['url']) }}">{{ $cat['name'] }}</a></li>
                    @endforeach
  
                    <li class="divider"></li>
                    <li class="dropdown-header">All categories</li>
                    <li><a href="{{ url('shop') }}">Shop</a></li>               
                  </ul>
                </li>              
              @else
                <li><a href="{{ url('shop') }}">Shop</a></li> 
              @endif
              
              @if( !Cart::isEmpty() )
               <li>
                 <a href="{{ url('cart/checkout') }}">
                  <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;
                   {{ $cartCollection->count() }} item(s)
                 </a>
               </li> 
              @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
              
            @if(!Session::has('user_id'))
              <li><a href="{{ url('user/login') }}">Sign in</a></li>
              <li><a href="{{ url('user/register') }}">Sign up</a></li>
            @else              
              <li><a href="{{ url('orderInfo/') }}">Welcome - {{ Session::get('user_name') }}</a></li>
              
              @if(Session::has('is_admin'))          
                <li><a href="{{ url('cms/dashboard') }}">CMS</a></li>         
              @endif
              
              <li><a href="{{ url('user/logout') }}">Log out</a></li>          
            @endif
            
             <!-- <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li> -->
            </ul>
          </div>
        </div>
      </nav>
      
      @yield('carousel')

      <div class="container">
        
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
        <!--content-->
        @yield('content')
      </div>
      <!--footer-->
      <footer class="bs-docs-footer sticky-footer" role="contentinfo">
        <div class="container">
          <div class="col-md-4 column">
            <h4>Information</h4>
            <ul class="bs-docs-footer-links">
              @if($menu = App\Menu::all())
                 
                @foreach($menu->toArray() as $value)              
                  <li id="{{ url($value['id']) }}"><a href="{{ url($value['url']) }}">{{ $value['link']}}</a></li>             
                @endforeach
                 
              @endif
            </ul>
          </div>
          <div class="col-md-4 column">
            <h4>Categories</h4>
            <ul class="bs-docs-footer-links">
              @if($categories = App\Categorie::all())              

                @foreach($categories as $cat)
                  <li><a href="{{ url('shop/' . $cat['url']) }}">{{ $cat['name'] }}</a></li>
                @endforeach
          
              @endif
            </ul>
          </div>
          <div class="col-md-4 column">
            <h4>Follow us</h4>
            <ul class="bs-docs-footer-links">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Google Plus</a></li>
              <li><a href="#">Twitter</a></li>
            </ul>
          </div>
        </div>
        <div id="copyright">
          <p>The Light &copy; {{ date('Y') }}</p>        
        </div>
      </footer>
      
    </div>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  @yield('map_script')
  <script src="{{ asset('js/script.js') }}"></script>
    
  </body>
</html>