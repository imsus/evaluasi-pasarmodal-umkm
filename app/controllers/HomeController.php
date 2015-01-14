<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('index');
	}

	public function getPengantar()
	{
		return View::make('pengantar');
	}

	public function getPanduan()
	{
		return View::make('panduan');
	}

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($credentials))
		{
			if(Auth::check()) return Redirect::to('kuesioner');
		}
			return Redirect::to('/');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	public function getKuesioner2()
	{
		if(!Auth::check()) return Redirect::to('login');
		return "hello world";
	}

}
