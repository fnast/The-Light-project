<?php namespace App\Http\Controllers;

use DB;
use Session;
use App\Menu;
use App\Content;
use App\General;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {
    
  public function boot($page){
    
    $data['contents'] = [];
    
    if($page = General::xss_clean($page)){
    
      if($menu = Menu::where('url', '=', $page)->first()){
        
        if($contents = Menu::find($menu['id'])->contents){
          
          $data['title'] = $menu['link'];
          $data['contents'] = $contents->toArray();
          
        }
   
      }
    
    }
    
    return view('content.boot', $data);
    
  }  

  public function index(){
      
    $data = [];
    $data['title'] = 'Home page';
    return view('content.home', $data);
    
  }
  
  public function orderInfo(){
    
    $user_id = Session::get('user_id');
    
    $sql = "SELECT o.id, o.data, o.total, s.name status, s.class, DATE_FORMAT(o.created_at, '%d/%m/%Y') date FROM orders o 
            JOIN status s ON o.status = s.id
            WHERE user_id = $user_id";
            
    $data['orders'] = DB::select($sql);
    
    return view('content.orderInfo', $data);
    
  }

}
