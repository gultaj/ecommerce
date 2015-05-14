<?php

class AuthController extends \BaseController {



  public function getLogin() {
    return View::make('auth.login');
  }

  public function postLogin() {
    $data = Input::all();

    $validator = Validator::make($data, User::$auth_rules);

    if ($validator->fails()) {
      return Redirect::back()->withErrors($validator)->withInput();
    }

    if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
      return Redirect::intended('/');
    }

    return Redirect::route('auth.login.get')->with('message', 'You are not registered');
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::route('auth.login.get');
  }

}

 ?>
