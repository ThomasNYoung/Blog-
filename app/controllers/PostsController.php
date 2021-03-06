<?php

class PostsController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		$posts = Post::paginate(6);
		return View::make('posts.index')->with(array('posts' => $posts));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//show form by returning view
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // create the validator
        $validator = Validator::make(Input::all(), Post::$rules);
        // attempt validation
        if ($validator->fails()) {
            Session::flash('errorMessage', 'Something went wrong. Please read errors below:');
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            // validation succeeded, create and save the post
            $directory = 'img/uploads/';
            $post = new Post;
            $post->title = Input::get('title');
            $post->body = Input::get('body');
            $post->user_id = Auth::id();
            $post->img_path = Input::file('img_path')->move($directory);
            $post->img_path = '/' . $post->img_path;
            $post->save();
            Session::flash('successMessage', 'You created ' . $post->title . ' post successfully');
            return Redirect::action('PostsController@index');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
        return View::make('posts.show')->with(array('post' => $post));		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')->with(['post' => $post]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create the validator
        $validator = Validator::make(Input::all(), Post::$rules);
        // attempt validation
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
            // validation failed, redirect to the post create page with validation errors and old inputs
        } else {
            // validation succeeded, create and save the post
            $post = Post::find($id);
            $post->title = Input::get('title');
            $post->body = Input::get('body');
            $post->save();
            return Redirect::action('PostsController@index');
		}	

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($id)
	// {
	// 	Post::find($id)->delete();
 //        return Redirect::action('PostsController@index');
	// }

	public function destroy($id)
    {
        // ...
        
        // Modify destroy() to send back JSON if it's been requested
        if (Request::wantsJson()) {
            return Response::json(array('return'=>'deleted'));
        } else {
            return Redirect::action('PostsController@index');
        }
    }
}

	// public function getManage()
 //    {
 //        return View::make('posts.manage');
 //    }
    
 //    public function getList()
 //    {
 //        $posts = Post::with('user')->get();
 //        return Response::json($posts);
 //    }
