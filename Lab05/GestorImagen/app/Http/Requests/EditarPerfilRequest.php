<?php namespace GestorImagen\Http\Requests;

use GestorImagen\Http\Requests\Request;

class EditarPerfilRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'=>'required',
			'password' => 'min:6|confirmed',
			'pregunta'=>'',
			'respuesta'=>'required_with:pregunta',
		];
	}

}
