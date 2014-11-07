<?php

class SessionController extends BaseController {

	public $user;

	public function __construct(User $user)	
	{
		$this->user = $user;
	}

	public function create()
	{
		if (Auth::check()) return Redirect::to('admin');
		return View::make('session.create');
	}

	public function store()
	{
		$rules = [
			'recaptcha_response_field' => '',
		];
		$v = Validator::make(Input::all(), $rules);
		if ($v->passes()) {
			if (!Auth::attempt(Input::only('username', 'password')))	{
				return Redirect::back()->withInput()->with('alert-danger', 'Username or password incorrect');
			}
			return Redirect::to('admin');
		} else {
			return Redirect::back()->withInput()->withErrors($v->messages());
		}
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}