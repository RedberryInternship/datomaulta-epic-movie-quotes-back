<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewMovieRequest extends FormRequest
{
	public function rules()
	{
		return [
			'name_eng'            => ['required', Rule::unique('movies', 'name')],
			'name_ka'             => ['required'],
			'director_eng'        => ['required'],
			'director_ka'         => ['required'],
			'description_eng'     => ['required'],
			'description_ka'      => ['required'],
			'release_date'        => ['required'],
			'thumbnail'           => ['required'],
		];
	}
}
