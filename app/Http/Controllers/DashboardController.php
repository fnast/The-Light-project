<?php namespace App\Http\Controllers;

use DB;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {
  
  function __construct(){
    
    $this->middleware('admin');
    
  }
  
	public function index(){
	  
    $data['orders'] = [];
    
    $sql = "SELECT u.name, o.id, o.total, s.name status, s.class, DATE_FORMAT(o.created_at, '%d/%m/%Y') date FROM orders o 
            JOIN users u ON u.id = o.user_id 
            JOIN status s ON o.status = s.id 
            ORDER BY id";
    
    $data['orders'] = DB::select($sql);
    $data['new_orders'] = DB::table('orders')->where('status', '=', '1')->count('id');
    $data['in_trans'] = DB::table('orders')->where('status', '=', '2')->count('id');            
    $data['delivered'] = DB::table('orders')->where('status', '=', '3')->count('id');            
    $data['users'] = DB::table('users')->count('id');            
 
    return view('cms.dashboard', $data);
    
	}

}
