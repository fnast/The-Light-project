<?php namespace App\Http\Controllers;

use Input;
use Session;
use App\User;
use App\Http\Requests\UserLogin;
use App\Http\Requests;
use App\Http\Requests\UserRegister;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {
  
  function __construct(){
    
    $this->middleware('user', ['except' => 'logout']);
    
  }

	public function login(){
    
    $destination = Input::get('destination');
    return view('form.login', compact('destination'));
    
  }
  
  public function register(){
    
    return view('form.register');
    
  }
  
  public function logout(){
    
    Session::flush();
    return redirect('/');
    
  }
    
  public function loginUser(UserLogin $request){
    
    $valid = User::validateUser($request['email'], $request['password']);
    
    if(!$valid){
      
      Session::flash('error_messege', 'Wrong email/password combination');
      return redirect('user/login');
      
    } else {
      
      $destination = !empty($request['destination'])? $request['destination'] : '/';      
      Session::flash('success_message', 'You are now loged in!');
      return redirect( $destination );
      
    }
     
  }
  
  public function registerUser(UserRegister $request){
    
    if(! User::saveUser($request) ){
      
      return redirect('user/register');
      
    } else{
      
      return redirect('/');
      
    }
    
  }

}
