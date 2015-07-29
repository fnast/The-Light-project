<?php namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;

class Content extends Model {

	public static function saveContent($request){
	  
    $content = new Content();
    $content->title = $request['title'];
    $content->body = $request['article'];
    $content->menu_id = $request['menu'];
    $content->save();
    Session::flash('success_message', 'Content has been saved!');
    return true;
    
	}
  
  public static function updateContent($id, $request){
    
    $content = Content::find($id);
    $content->title = $request['title'];
    $content->body = $request['article'];
    $content->menu_id = $request['menu'];
    $content->save();
    Session::flash('success_message', 'Content has been updated!');
    return true;
    
  }
  
  public static function deleteContent($id){

    Content::destroy($id);
    Session::flash('success_message', 'Content has been deleted!');
    
  }

}
