<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveCategorieValidation extends Request {

	public function authorize(){
		return true;
	}

	public function rules(){
		return [
      'name' => 'required|regex:/^[a-zA-Z ]+$/|unique:categories|min:2|max:255',
      'article' => 'required',
      'upload_file' => 'required|image',
    ];
	}
  
  public function messages(){
    
    return [ 
      'upload_file.required' => 'Categorie\' image is required!', 
      'name.regex' => 'Only letters allowed!',
    ];
    
  }

}
