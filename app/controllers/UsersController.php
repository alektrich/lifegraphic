<?php

 
class UsersController extends BaseController {
 	

	public function __construct() {

	    $this->beforeFilter('csrf', array('on'=>'post'));
	    
	}

	protected $layout = "layouts.main";
	protected $email = "";

	/**
     * Page with link code for page
     *
     * @param none
     * @return Registration View
     */
	public function getRegister() {

	    $this->layout->content = View::make('users.register');

	}


	/**
     * Page with link code for page
     *
     * @param none
     * @return Save user into DB
     */
	public function postCreate() {

		$validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	    	$user = new User;
		    $user->first_name = Input::get('firstname');
		    $user->last_name = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

	        return Redirect::to('users/login')->with('message', 'Thanks for registering!');

	    } else {
	        // validation has failed, display error messages  
	        return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
	    }


	}

	public function getLogin() {

	    $this->layout->content = View::make('users.login');

	}

	public function postLogin() {

		$email 	  = Input::get('email');
		$password = Input::get('password');

		$this->email = $email;

		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {

			$data['firstname'] = User::where('email', $email)->pluck('first_name');

			// dd($this->email);

		    return View::make('lifegraphic', $data);

		} else {

		    return Redirect::to('users/login')
		        ->with('message', '<p class="alert alert-error">Your username/password combination was incorrect</p>')
		        ->withInput();

		}

	}

}