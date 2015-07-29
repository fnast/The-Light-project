<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveContentValidation extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
		  'menu' => 'different:menu_dafault',
			'title' => 'required|min:2',
			'article' => 'required',
		];
	}
  
  public function messages(){
    
    return [      
      'menu.different' => 'Please chose menu link',
    ];
    
  }

}
