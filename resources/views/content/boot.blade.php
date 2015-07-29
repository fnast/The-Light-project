@extends('layout')

@section('content')

  <div class="row">
    
    @if(count($contents) > 0)
     
      @foreach($contents as $row)    
        <div class="col-md-12">      
          <h2>{{ $row['title'] }}</h2>
          <p>{!! $row['body'] !!}</p>      
        </div>    
      @endforeach
  
    @else  
      <div class="col-md-12"><i>No content available...</i></div>  
    @endif
    
  </div>

@stop

@section('map_script')
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  $(document).ready(function(){
    if(window.location.href.indexOf("contact") >=0){
      var locate = true; 
      function initialize() {
      var mapCanvas = document.getElementById('map-wrap');
      var myLatlng = new google.maps.LatLng(32.8155556, 34.9891667);
      var mapOptions = {
        center: myLatlng,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(mapCanvas, mapOptions)
      var marker =  new google.maps.Marker({position: myLatlng, map: map}); 
    }
    google.maps.event.addDomListener(window, 'load', initialize);     
    }   
  });
</script>    
@stop
