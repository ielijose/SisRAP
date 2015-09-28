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

	public function index()
	{
		return View::make('public.index');
	}

	public function login()
	{
		return View::make('public.login');
	}

	public function postLogin()
	{

		$rules = array(
            'username'    => 'required',
            'password' => 'required'
        );

        $messages = array(
            'username.required'    => 'Username is required.',
            'password.required' => 'Password is required.'
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username'     => Input::get('username'),
                'password'  => Input::get('password')
            );
            $remember = (Input::has('remember')) ? true : false;

           /* if ($r = Auth::attempt($userdata, $remember)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('/login')->with('alert', array('type' => 'danger', 'message' => 'Invalid credentials.'));
            }*/

            $message = "";

            try {
                if(Auth::attempt($userdata, Input::get('rememberme', false))) {
                    return Redirect::to('/');
                }
            } catch( \Toddish\Verify\UserNotFoundException $e ) {
                $message = _("User not found.");
            } catch( \Toddish\Verify\UserUnverifiedException $e ) {
                $message = _("User not verified.");
            } catch( \Toddish\Verify\UserDisabledException $e ) {
                $message = _("Disabled User.");
            } catch( \Toddish\Verify\UserDeletedException $e ) {
                $message = _("Deleted User.");
            } catch( \Toddish\Verify\UserPasswordIncorrectException $e ) {
                $message = _("Invalid credentials.");
            }


            return Redirect::to('/login')->with('alert', array('type' => 'danger', 'message' => $message));


        }
	}

    public function logout()
    {
       Auth::logout();
       return Redirect::to('/login')->with('alert', array('type' => 'success', 'message' => 'See you later.'));
    }



}
