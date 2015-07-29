<?php namespace App;

use Request;
use Session;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

  public static function saveProduct($request){
    
    $valid = false;
    
    if(! Product::where('title', '=', $request['title'])->first()){
      
      $valid = true;      
      $fileName = str_random(30) . '.' . Request::file('upload_file')->getClientOriginalExtension();
      Request::file('upload_file')->move( public_path() . '/images/', $fileName);      
      $product = new Product();
      $product->categorie_id = $request['categorie'];
      $product->title = $request['title'];
      $product->article = $request['article'];
      $product->price = $request['price'];
      $product->url = General::make_clean_url($request['title']);
      $product->image = $fileName;    
      $product->save();
      Session::flash('success_message', 'Product has been saved!');
      
    } else{
      
      Session::flash('error_messege', 'Product with this title already exists');
      
    }

    return $valid;
    
  }	
  
  public static function updateProduct($id, $request){
    
    $allow_title = true;

    if($exist_product = Product::where('title', '=', $request['title'])->first()){
      
      $exist_product = $exist_product->toArray();
      
      if($exist_product['id'] != $id){
        
        $allow_title = false;
        Session::flash('error_messege', 'Product with this title already exists');
        
      }
      
    }
    
    if($allow_title){
      
      if (Request::hasFile('upload_file')) {
       
      $fileName = str_random(30) . '.' . Request::file('upload_file')->getClientOriginalExtension();
      Request::file('upload_file')->move( public_path() . '/images/', $fileName); 
      $product = Product::find($id)->toArray();
      unlink(public_path() . '/images/' . $product['image']); 
       
      }
      
      $product = Product::find($id);
      $product->categorie_id = $request['categorie'];
      $product->title = $request['title'];
      $product->article = $request['article'];
      $product->price = $request['price'];
      $product->url = General::make_clean_url($request['title']);
      
      if(!empty($fileName)){
        
        $product->image = $fileName;
        
      }
      
      $product->save();
      Session::flash('success_message', 'Product has been updated!');
        
    }
    
    return $allow_title;
    
  }
  
  public static function deleteProduct($id){
    
    $product = Product::find($id)->toArray();
    unlink(public_path() . '/images/' . $product['image']);
    Product::destroy($id);
    Session::flash('success_message', 'Product has been deleted!');
    
  }
  
}
