<?php namespace App;

use Session;
use Cart;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model {

	public static function addToCart($id){
	  
    if (!Cart::get($id)) {
    
      if($product = Product::find($id)){
        
        $product = $product->toArray();
        
        Cart::add(array(
          'id' => $id,
          'name' => $product['title'],
          'price' => $product['price'],
          'quantity' => 1,
          'attributes' => array()
        ));        
        
        Session::flash('success_message', $product['title'] . ' added to cart!');
        
      }
              
    }

	}
  
  
  public static function updateCart($input){
    
    if(!empty($input['op']) && !empty($input['id'])){
      
      if($input['op'] == 'add'){
        
        Cart::update($input['id'], array(
          'quantity' => 1, 
        ));
        
      } else {
        
        $cart = Cart::get($input['id']);
        
        if($cart['quantity'] - 1 == 0){
          
          Cart::remove($input['id']);
      
        } else {
          
          Cart::update($input['id'], array(
            'quantity' => -1, 
          ));
          
        }
            
      }
      
      Session::flash('success_messege', 'Cart updated!');
      
    }
    
  }

}
