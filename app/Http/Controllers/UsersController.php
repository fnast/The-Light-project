<?php namespace App\Http\Controllers;

use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {
  
  function __construct(){
    
    $this->middleware('admin');
    
  }

	public function index(){
	  
	  $data['users'] = [];
    
    $sql = "SELECT id, name, email, DATE_FORMAT(created_at, '%d/%m/%Y') registered_at, 
            (SELECT COUNT(id) orders FROM orders WHERE user_id = users.id) orders FROM users 
            WHERE id != 1 ORDER BY id";
    
    $data['users'] = DB::select($sql);

    return view('cms.users', $data);
		
	}

	public function show($id)
	{
		return view('cms.delete_user', compact('id'));
	}

	public function destroy($id)
	{
		User::deleteUser($id);  
    return redirect('cms/users');
	}

}
