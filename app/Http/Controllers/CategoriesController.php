<?php namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCategorieValidation;
use App\Http\Requests\EditCategorieValidation;

use Illuminate\Http\Request;

class CategoriesController extends Controller {
  
  function __construct(){
    
    $this->middleware('admin');
    
  }

	public function index() {
		
    $data['categories'] = [];
    
    if($cat = Categorie::all()){
      
      $data['categories'] = $cat->toArray();
      
    }  
      
    return view('cms.categories', $data);
    
	}

	public function create(){ 
    
    return view('cms.add_categorie');
    
	}

	public function store(SaveCategorieValidation $request){
	  
	  if(Categorie::saveCategorie($request)){
      
      return redirect('cms/categories');
      
    } else {
      
      return redirect('cms/categories/create');
      
    }
    
    return $request;
		
	}
  
	public function show($id){
	  
	  return view('cms.delete_categorie', compact('id'));
		
	}

	public function edit($id){
	  
		$data['categories'] = Categorie::find($id)->toArray(); 
    return view('cms.edit_categorie', $data);
    
	}

	public function update($id, EditCategorieValidation $request){
	  
		if(Categorie::updateCategorie($id, $request)){
      
      return redirect('cms/categories'); 
      
    } else{
      
      return redirect('cms/categories/' . $id . '/edit'); 
      
    }
    
	}

	public function destroy($id){
	  
		Categorie::deleteCategorie($id);  
    return redirect('cms/categories');
    
	}

}
