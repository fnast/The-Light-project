<?php namespace App\Http\Controllers;

use Cart;
use Input;
use Session;
use App\MyCart;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller {

	public function addToCart(){

    MyCart::addToCart( Input::get('id') );
    
	}
  
  public function update(){
    
    MyCart::updateCart( Input::all());
    
  }
  
  public function checkout(){
    
    return view('content.checkout');
    
  }
  
  public function order(){
    
    if(! Session::has('user_id')){
      
      Session::flash('error_messege', 'You must sign in to order products');
      return redirect('user/login?destination=cart/checkout');
      
    } else {
      
      Order::saveOrder();
      return redirect('shop');
      
    }
    
  }

}
