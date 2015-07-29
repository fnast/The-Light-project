<?php namespace App\Http\Controllers;

use App\Menu;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MenuController extends Controller {
  
  function __construct(){
    
    $this->middleware('admin');
    
  }

	public function index(){
		
    $data['menus'] = [];
    
    if($menu = Menu::all()){
      
      $data['menus'] = $menu->toArray();
      
    }  
      
    return view('cms.menu', $data);
    
	}

	public function create(){
    
    return view('cms.add_menu');
    
	}

	public function store(Request $request){
	  
		$this->validate($request, [
        'link' => 'required|regex:/^[a-zA-Z ]+$/|unique:menus|min:2|max:255',
    ]);
    
    if(Menu::saveMenu($request)){
      
      return redirect('cms/menu');
      
    } else {
      
      return redirect('cms/menu/create');
      
    }
    
    return $request;
    
	}

	public function show($id){
	  
		return view('cms.delete_menu', compact('id'));
    
	}

	public function edit($id){
	  
	  $data['menu'] = Menu::find($id)->toArray(); 
    return view('cms.edit_menu', $data);
    
	}

	public function update($id, Request $request){
	  
    $this->validate($request, [
        'link' => 'required|regex:/^[a-zA-Z ]+$/|unique:menus|min:2|max:255',
    ]);
    
		if(Menu::updateMenu($id, $request)){
      
      return redirect('cms/menu'); 
      
    } else{
      
      return redirect('cms/menu/' . $id . '/edit'); 
      
    }
	}

	public function destroy($id){
	  
    Menu::deleteMenu($id);  
    return redirect('cms/menu'); 
    
	}

}
