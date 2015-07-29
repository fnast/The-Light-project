<?php namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
  
  public function contents(){
    
    return $this->hasMany('App\content');
    
  }
  
  public static function saveMenu($request){
   
    $menu = new Menu();
    $menu->link = $request['link'];
    $menu->url = General::make_clean_url($request['link']);
    $menu->save();
    Session::flash('success_message', 'Menu has been saved!');
    return true;
    
  }

  public static function updateMenu($id, $request){
    
    $menu = Menu::find($id);
    $menu->link = $request['link'];
    $menu->url = General::make_clean_url($request['link']);
    $menu->save();
    Session::flash('success_message', 'Menu has been updated!');
    return true;
    
  }
  
  public static function deleteMenu($id){
    
    Menu::destroy($id);
    Session::flash('success_message', 'Link has been deleted!');
    
  }

}
