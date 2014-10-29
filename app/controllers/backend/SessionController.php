<?php

class SessionController extends BaseController {

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        if (Auth::check()) {
            if(Auth::user()->role == "admin" || Auth::user()->role == "cs officer"){
                return Redirect::to('admin/dashboard');
            } else {
                return Redirect::to("");
            }

        }
        return View::make('session.create');
    }

    public function store()
    {
        $rules = [
            // 'recaptcha_response_field' => 'required|recaptcha',
        ];
        $v = Validator::make(Input::all(), $rules);

        if ($v->passes()) {
            if (!Auth::attempt(Input::only('username', 'password'))){
                return Redirect::back()->withInput()->with('alert', 'Username or password incorrect');
            } else {
                if(Auth::user()->status === "active"){
                    return Redirect::to('admin/user');
                } else {
                    Auth::logout();
                    return Redirect::back()->withInput()->with('alert', 'Akun Anda telah dinonaktifkan, mohon hubungi Costumer Service.');
                }
            }
            return Redirect::to('');
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function destroy()
    {
        $successUpdate = Auth::user()->updateLastvisit();
        if($successUpdate){
            Auth::logout();
            return Redirect::to('');
        }
        else {
            return Redirect::to('admin/user');
        }
    }
}
