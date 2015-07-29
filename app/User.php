<?php namespace App;

use DB;
use Hash;
use Session;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

	public static function validateUser($email, $password){
    
    $valid = false;
    
    if($user = User::where('email', '=', $email)->first()){
      
      $user = $user->toArray();
      
      if (Hash::check($password, $user['password'])) {
        
        $valid = true;
        Session::put('user_id', $user['id']);
        Session::put('user_name', $user['name']);
        
        $role = DB::select('SELECT * FROM roles WHERE user_id = ?', [$user['id']]);
        
        if($role[0]->role_id == 1){
          
          Session::put('is_admin', true);
          
        }
          
      }
      
    }
    
    return $valid;
    
  }
  
  public static function saveUser($request){
    
    $register = false;
    
    if( ! User::where('email', '=', $request['email'])->first() ){
      
      $user = new User();      
      $user->name = $request['name'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['password']);
      $user->save();
      $user_id = $user->id;
      DB::insert("INSERT INTO roles VALUES( {$user->id}, 2 )");
      Session::flash('success_message', 'Thank you for sign up!');
      $register = true;
            
    } else{
      
      Session::flash('error_messege', 'User with this email already exists');
      
    }
    
    return $register;
    
  }
  
  public static function deleteUser($id){
    
    User::destroy($id);
    Session::flash('success_message', 'User has been deleted!');
    
  }

}
