<?php namespace App;

use Session;
use Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	public static function saveOrder(){
	  
    $order = new Order();
    $order->user_id = Session::get('user_id');
    $order->data = Cart::getContent()->toJson();
    $order->total = Cart::getTotal();
    $order->status = 'new';
    $order->save();
    Cart::clear();
    Session::flash('success_message', 'Your order has been saved!');
    
	}
  
  public static function updateOrder($id, $request){
    
    $status = false;
    $ar = [1,2,3];
    
    if(in_array($request['status'], $ar)){
            
      $order = Order::find($id);
      $order->status = $request['status'];
      $order->save();
      $status = true;
      Session::flash('success_message', 'Status has been updated!');
      
    } else{
      
      Session::flash('error_messege', 'Wrong status given!');
      
    }
    
    return $status;
    
  }

}
