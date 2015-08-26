<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



// Route::get('/sayhello/{name}', function($name)
// {
//     return View::make('sayhello')->with('name', $name);
// });



// Route::get('resume', function()
// {
// 	$message = "resume";
// 	return View::make('resume')->with('message',$message);

// });

Route::get('resume', 'HomeController@showResume');



// Route::get('/rolldice/{guess}', function($guess)
// {
// 	$number = rand(1,6);
// 	if($number == $guess){
// 		$message = "winner dinner";
// 	}else{
// 		$message = "you lose";
// 	}
// 	$data=array(
// 		'number'=>$number,
// 		'guess' =>$guess,
// 		'message'=>$message

// 		);
	// return View::make('rolldice')->with($data);


// });

Route::resource('posts', 'PostsController');
// Route::get('orm-test', function()
// {
// 	$post1 = new Post();
// 	$post1->title = 'Eloquent is awesome!';
// 	$post1->body  = 'It is super easy to create a new post.';
// 	$post1->save();

// 	$post2 = new Post();
// 	$post2->title = 'Post number two';
// 	$post2->body  = 'The body for post number two.';
// 	$post2->save();
// });
// 

Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');