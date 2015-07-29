<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveProductValidation extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
		  'categorie' => 'different:categorie_dafault',
			'title' => 'required|min:2',
			'price' => 'required|numeric',
			'article' => 'required',
			'upload_file' => 'required|image',
		];
	}
  
  public function messages(){
    
    return [
      
      'categorie.different' => 'Please chose categorie',
      'upload_file.required' => 'Product\' image is required!', 

    ];
    
  }

}
