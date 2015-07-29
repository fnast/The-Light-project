<?php namespace App\Http\Controllers;

use DB;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrdersController extends Controller {

	function __construct(){
    
    $this->middleware('admin');
    
  }
  
  public function index(){
     
    $ar = [1,2,3];
    $data['orders'] = [];
    $status = !empty($_GET['status']) ? $_GET['status'] : '';      
            
    if(!empty($status) && in_array($status, $ar)){
      
       $sql = "SELECT u.name, o.id, o.data, o.total, s.name status, s.class, DATE_FORMAT(o.created_at, '%d/%m/%Y') date, DATE_FORMAT(o.updated_at, '%d/%m/%Y') last_update FROM orders o 
               JOIN users u ON u.id = o.user_id 
               JOIN status s ON o.status = s.id 
               WHERE status = $status";
      
    } else{
      
      $sql = "SELECT u.name, o.id, o.data, o.total, s.name status, s.class, DATE_FORMAT(o.created_at, '%d/%m/%Y') date, DATE_FORMAT(o.updated_at, '%d/%m/%Y') last_update FROM orders o 
              JOIN users u ON u.id = o.user_id 
              JOIN status s ON o.status = s.id";
      
    } 

    $data['orders'] = DB::select($sql); 

    return view('cms.orders', $data);
    
  }
  
  public function edit($id){
    
    $data['orders'] = Order::find($id)->toArray(); 
    $order_st = $data['orders']['status'];    
    $sql = "SELECT s.id, s.name status FROM status s ORDER BY CASE WHEN id = $order_st THEN 0 ELSE id END";    
    $data['status'] = DB::select($sql);
    return view('cms.edit_order', $data);
    
  }

  public function update($id, Request $request){
    
    if(Order::updateOrder($id, $request)){
      
      return redirect('cms/orders'); 
      
    } else{
      
      return redirect('cms/orders/' . $id . '/edit'); 
      
    }
    
  }

}
