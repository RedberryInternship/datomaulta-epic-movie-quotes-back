<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
	public function getMovies()
	{
		$user = auth()->user();
		return $user->movies;
	}

	public function addMovie(NewMovieRequest $request)
	{
		$attributes = $request->validated();
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');

		Movie::create([
			'name_eng'       => $attributes['name_eng'],
			'name_ka'        => $attributes['name_ka'],
			'director_eng'   => $attributes['director_eng'],
			'director_ka'    => $attributes['director_ka'],
			'description_eng'=> $attributes['description_eng'],
			'description_ka' => $attributes['description_ka'],
			'thumbnail'      => $attributes['thumbnail'],
		]);

		return response()->json(['message'=>'Movie created successfully']);
	}
}
