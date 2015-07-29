<?php namespace App;

use Request;
use Session;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

	public function products(){
    
    return $this->hasMany('App\product');
    
  }
  
  public static function saveCategorie($request){
    
    $fileName = str_random(30) . '.' . Request::file('upload_file')->getClientOriginalExtension();
    Request::file('upload_file')->move( public_path() . '/images/categories/', $fileName);      
    $categorie = new Categorie();
    $categorie->name = $request['name'];
    $categorie->article = $request['article'];
    $categorie->url = General::make_clean_url($request['name']);
    $categorie->image = $fileName;    
    $categorie->save();
    Session::flash('success_message', 'Categorie has been saved!');
    
  }
  
  public static function updateCategorie($id, $request){
    
    $allow_title = true;

    if($exist_categorie = Categorie::where('name', '=', $request['name'])->first()){
      
      $exist_categorie = $exist_categorie->toArray();
      
      if($exist_categorie['id'] != $id){
        
        $allow_title = false;
        Session::flash('error_messege', 'Categorie with this name already exists');
        
      }
      
    }
    
    if($allow_title){
      
      if(Request::hasFile('upload_file')) {
       
      $fileName = str_random(30) . '.' . Request::file('upload_file')->getClientOriginalExtension();
      Request::file('upload_file')->move( public_path() . '/images/categories/', $fileName); 
      $categorie = Categorie::find($id)->toArray();
      unlink(public_path() . '/images/categories/' . $categorie['image']); 
       
      }
      
      $categorie = Categorie::find($id);
      $categorie->name = $request['name'];
      $categorie->article = $request['article'];
      $categorie->url = General::make_clean_url($request['name']);   
      
      if(!empty($fileName)){
        
        $categorie->image = $fileName;
        
      }
      
      $categorie->save();
      Session::flash('success_message', 'Categorie has been updated!');
        
    }
    
    return $allow_title;
    
  }

  public static function deleteCategorie($id){
    
    $categorie = Categorie::find($id)->toArray();
    unlink(public_path() . '/images/categories/' . $categorie['image']);
    Categorie::destroy($id);
    Session::flash('success_message', 'Categorie has been deleted!');
    
  }

}
