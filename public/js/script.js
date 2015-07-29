
/*menu toggle script*/
$("#menu-toggle").click(function(e){
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

$('.success-message').delay(2000).slideUp(300);

/* Shopping cart */
$('.add-to-cart').on('click', function(){
  
  var id = $(this).data('id');
  
  $.ajax({
    
    url: BASE_URL + "cart/addToCart",
    type: "get",
    dataType: "html",
    data: {"id": id},
    success: function( response ){
      
      location.reload();
      
    }
    
  });
  
});

$('.update-cart').on('click', function(){
  
  var id = $(this).data('id');
  var op = $(this).data('op');
  
  $.ajax({
    
    url: BASE_URL + "cart/update",
    type: "get",
    dataType: "html",
    data: {"id": id, "op": op},
    success: function( response ){
      
      location.reload();
      
    }
    
  });
  
});
