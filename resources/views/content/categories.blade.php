@extends('layout')

@section('content')

  <div class="row">
    
    @if(count($categories) > 0)
    
      @foreach($categories as $value)    
        <div class="col-md-4">
          <div class="cat">
            <img class="img-thumbnail img-responsive" src="{{ asset('images/categories/' . $value['image']) }}">
            <div class="cat-info">
              <h2>{{ $value['name'] }}</h2>
              <p>{{ $value['article'] }}</p>
              <p class="btn-group"><a class="btn btn-primary" href="{{ url('shop/' . $value['url']) }}" role="button">View products »</a></p>
            </div>
          </div>
        </div>   
      @endforeach
      
    @else      
      <div class="col-md-12"><i>No categories available...</i></div>      
    @endif
  
  </div>

@stop
