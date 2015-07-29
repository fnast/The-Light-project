<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model {

	public static function xss_clean($input){
	  
    $config = \HTMLPurifier_Config::createDefault();
    $purifier = new \HTMLPurifier($config);
    $input = $purifier->purify($input);
    return $input; 
    
	}
  
  public static function make_clean_url($str){
      
    $str = trim($str);
    $str = strtolower($str);
    $str = str_replace(' ', '-', $str);  
    
    return $str;
    
  }
  
    public static function deleteItem($id, $file = true, $model, $success_message){
    
    if($file){
      
      $item = $model::find($id)->toArray();
      unlink(public_path() . '/images/' . $item['image']);
      
    }
    
    $model::destroy($id);
    Session::flash('success_message', $success_message);
    
  }

}
