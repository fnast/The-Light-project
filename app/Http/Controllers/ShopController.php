<?php namespace App\Http\Controllers;

use DB;
use App\General;
use App\Categorie;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ShopController extends Controller {

	public function index(){
	  
    $data['categories'] = [];
    $data['title'] = 'Categories';
    
    if($categories = Categorie::all()){
      
      $data['categories'] = $categories->toArray();
      
    }
    
    return view('content.categories', $data);
    
  }
  
  public function products($cat){
    
    $data['products'] = [];
    
    if($cat = General::xss_clean($cat)){   
        
      if($categorie = Categorie::where('url', '=', $cat)->first()){
        
        $categorie->toArray();
        $data['title'] = $categorie['name'] . ' products';      
        
        if($products = Categorie::find($categorie['id'])->products){
            
          $data['url'] = $cat;
          $data['cat'] = $categorie['name'];
          $data['products'] = $products->toArray();
          
        }

      } 
    
    }
    
    return view('content.products', $data);   

  }
  
  public function item($cat, $item){
      
    $data = [];
    
    if($item = General::xss_clean($item)){
      
      if($product = Product::where('url', '=', $item)->first()){
        
        $data = $product->toArray();
        
      }
      
    }
    
    return view('content.item', $data);
    
  }

}
