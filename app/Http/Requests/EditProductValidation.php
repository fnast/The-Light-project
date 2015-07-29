<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProductValidation extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'title' => 'required|min:2',
			'price' => 'required|numeric',
			'article' => 'required',
		];
	}

}
