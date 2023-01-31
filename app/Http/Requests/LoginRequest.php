<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email_username'            => 'required|min:3',
			'password'                  => 'required|min:3',
			'rememberMe'                => 'required',
		];
	}
}
