<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $fillable = [
		'name',
		'release_date',
		'director',
		'description',
		'thumbnail',
		'user_id',
	];

	public $translatable = ['name', 'director', 'description'];
}
