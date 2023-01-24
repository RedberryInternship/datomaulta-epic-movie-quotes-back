<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Email;
use App\Models\User;

class LoginController extends Controller
{
	public function login(LoginRequest $request)
	{
		$attributes = $request->validated();

		if (filter_var($attributes['email_username'], FILTER_VALIDATE_EMAIL))
		{
			$email = Email::where('email', $attributes['email_username'])->first();
			if (!$email)
			{
				return response()->json(['message'=>'incorrect credentials'], 401);
			}
			elseif (!$email->email_verified_at)
			{
				return response()->json(['message'=>'Your email is not verified'], 401);
			}

			$usernameField = $email->user->name;
		}
		else
		{
			$user = User::where('name', $attributes['email_username'])->first();
			if (!$user->has_verified_email)
			{
				return response()->json(['message'=>'Your email is not verified'], 401);
			}
			$usernameField = $attributes['email_username'];
		}

		if (auth()->attempt(['name' => $usernameField, 'password' => $attributes['password']]))
		{
			request()->session()->regenerate();
			return response()->json(['message'=>'successfully logged in'], 200);
		}
		else
		{
			return response()->json(['message'=>'incorrect credentials'], 401);
		}
	}

	public function logout()
	{
		auth()->logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		return response(['message' => 'Logged out']);
	}
}