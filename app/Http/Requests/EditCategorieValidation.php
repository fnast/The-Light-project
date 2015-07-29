<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCategorieValidation extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => 'required|regex:/^[a-zA-Z ]+$/|min:2|max:255',
      'article' => 'required',
		];
	}
  
  public function messages(){
    
    return [
      'name.regex' => 'Only letters allowed!'
    ];
    
  }

}
