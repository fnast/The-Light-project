
@extends('layout')

@section('carousel')
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="first-slide" src="{{ asset('images/carousel/lighting_design1.jpg') }}" alt="First slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Welcome to The Light Shop!</h1>
            <p>Because it's all about "The Light"!</p>
            <p><a class="btn btn-lg btn-primary" href="{{ url('user/register') }}" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="second-slide" src="{{ asset('images/carousel/lighting_design2.jpg') }}" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>The best-designed lamps</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ url('about-us') }}" role="button">Who we are</a></p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="third-slide" src="{{ asset('images/carousel/lighting_design3.jpg') }}" alt="Third slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ url('shop') }}" role="button">See our products</a></p>
          </div>
        </div>
      </div>
      
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
  </div>

@stop

@section('content')  
  <div class="row">
    <div class="col-md-12 wrap-content"> 
      <h2 class="page-header">What is so special about us?</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam ut laoreet erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
      </p>
    </div>
  </div>  
@stop