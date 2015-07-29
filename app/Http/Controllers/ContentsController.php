<?php namespace App\Http\Controllers;

use App\Content;
use DB;
use App\Menu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveContentValidation;
use App\Http\Requests\EditContentValidation;

use Illuminate\Http\Request;

class ContentsController extends Controller {
  
  function __construct(){
    
    $this->middleware('admin');
    
  }

	public function index(){
	  
	  $data['contents'] = [];
    
    if($contents = Content::all()){
      
      $data['contents'] = $contents->toArray();
      
    }  
      
    return view('cms.contents', $data);
		
	}

	public function create(){
	  
		$data['menus'] = [];
    
    if($menus = Menu::all()){
      
      $data['menus'] = $menus->toArray();
      
    }  
    
    return view('cms.add_content', $data);
    
	}

	public function store(SaveContentValidation $request){
	  
		if(Content::saveContent($request)){
      
      return redirect('cms/contents');
      
    } else {
      
      return redirect('cms/contents/create');
      
    }
    
    return $request;
    
	}

	public function show($id){
	  
		return view('cms.delete_content', compact('id'));
    
	}

	public function edit($id){
	  
    $data['contents'] = Content::find($id)->toArray(); 
    $menu_id = $data['contents']['menu_id'];
    $sql = "SELECT * FROM menus ORDER BY CASE WHEN id = $menu_id THEN 0 ELSE id END";
    $data['menus'] = DB::select($sql);
    return view('cms.edit_content', $data);
		
	}

	public function update($id, EditContentValidation $request){
	  
    if(Content::updateContent($id, $request)){
      
      return redirect('cms/contents'); 
      
    } else{
      
      return redirect('cms/contents/' . $id . '/edit'); 
      
    }
		
	}

	public function destroy($id){
	  
		Content::deleteContent($id);  
    return redirect('cms/contents'); 
    
	}

}
