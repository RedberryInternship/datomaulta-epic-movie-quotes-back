<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewEmailRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email' => ['required', 'email', Rule::unique('emails', 'email')],
		];
	}
}
