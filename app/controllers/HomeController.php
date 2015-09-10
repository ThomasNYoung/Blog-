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

	 public function showWelcome()
    {
        return View::make('hello');
    }

    // public function showPosts()
    // {
    //     return View::make('posts');
    // }

    public function showResume()
    {
    	return View::make('resume');
    }

    // public function showIndex()
    // {
    //   return View::make('index');
    // }

    public function showPortfolio()
    {
    	return View::make('portfolio');
    }

    public function showTestIndex()
    {
      return View::make('test_index');
    }

    public function showSimon()
    {
      return View::make('simple_simon');
    }

    public function showWhack()
    {
      return View::make('whack');
    }

     public function showHome()
    {
      return View::make('home');
    }

    public function showLogin()
   	{
   		return View::make('login');
   	}

   	public function doLogin()
   	{
   		$email    = Input::get('email');
   		$password = Input::get('password');

   		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    return Redirect::intended('posts');
		} else {
		    // login failed, go back to the login screen
		    // 1.display a session flash error
		    // 2.log email that tried to authenticate
		    Session::flash('errorMessage', 'eMail or password was incorrect.');
            Log::error('User failed to authenticate!', array('email' => $email));
		    return Redirect::action('HomeController@showLogin')->withInput;
			}
   	}

   	public function doLogout()
   	{
   		Auth::logout();
   		return Redirect::to('posts');
   	}
}
