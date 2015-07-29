<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditContentValidation extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'title' => 'required|min:2',
      'article' => 'required',
		];
	}

}
