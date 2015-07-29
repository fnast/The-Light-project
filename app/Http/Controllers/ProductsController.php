<?php namespace App\Http\Controllers;

use DB;
use App\Categorie;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductValidation;
use App\Http\Requests\EditProductValidation;

use Illuminate\Http\Request;

class ProductsController extends Controller {
  
   function __construct(){
    
    $this->middleware('admin');
    
  }

	public function index(){
	  
		$data['products'] = [];
    
    if($products = Product::all()){
      
      $data['products'] = $products->toArray();
      
    }  
      
		return view('cms.products', $data);
    
	}

	public function create(){
	  
		$data['categories'] = [];
    
    if($categories = Categorie::all()){
      
      $data['categories'] = $categories->toArray();
      
    }  
    
		return view('cms.add_products', $data);
    
	}

	public function store(SaveProductValidation $request){
	  
	  if(Product::saveProduct($request)){
	    
      return redirect('cms/products');
      
	  } else {
	    
      return redirect('cms/products/create');
      
	  }
    
		return $request;
    
	}

	public function show($id){
	  
		return view('cms.delete_product', compact('id'));
    
	}

	public function edit($id){
	  
		$data['product'] = Product::find($id)->toArray(); 
    $cat_id = $data['product']['categorie_id'];
    $sql = "SELECT * FROM categories ORDER BY CASE WHEN id = $cat_id THEN 0 ELSE id END";
    $data['categories'] = DB::select($sql);
		return view('cms.edit_product', $data);
    
	}

	public function update($id, EditProductValidation $request){
	  
		if(Product::updateProduct($id, $request)){
		  
      return redirect('cms/products'); 
      
		} else{
		  
      return redirect('cms/products/' . $id . '/edit'); 
      
		}
		
	}

	public function destroy($id){
	  
    Product::deleteProduct($id);	
    return redirect('cms/products'); 
	}

}
