<?php

 
class UsersController extends BaseController {
 	

	public function __construct() {

	    $this->beforeFilter('csrf', array('on'=>'post'));
	    
	}

	// protected $layout = "layouts.main";
	protected $email = "";

	/**
     * Page with link code for page
     *
     * @param none
     * @return Registration View
     */
	public function getRegister() {

	    return View::make('users.register');

	}


	/**
     * Page with link code for page
     *
     * @param none
     * @return Save user into DB
     */
	public function postCreate() 
	{

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

	public function getLogin() 
	{

	    return View::make('users.login');

	}

	public function postLogin() 
	{

		$email 	  = Input::get('email');
		$password = Input::get('password');

		$this->email = $email;

		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {

			/*$data['firstname'] = User::where('email', $email)->pluck('first_name');
			$data['lastname'] = User::where('email', $email)->pluck('last_name');*/

			// dd($this->email);

		    return Redirect::to('health');

		} else {

		    return Redirect::to('users/login')
		        ->with('message', '<p class="alert alert-error">Your username/password combination was incorrect</p>')
		        ->withInput();

		}

	}

	public function getLogout() 
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function getLove() 
	{

		$email = Auth::user()->email;
		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		$loveValues = DB::table('category_values')
			->where('user_id', '=', Auth::user()->id)
			->where('category_id', '=', 1)
			->get(array('category_value'));
	

		if($loveValues) {

			$loveArray = array();
			foreach($loveValues as $value) {
				$loveArray[] = $value->category_value;
			} 

			$finalValue = array_sum($loveArray)/count($loveArray);

			$data['loveValue'] = $finalValue;
		} else {
			$data['loveValue'] = 0;
		}	

		return View::make('lifegraphic.love', $data);
	}

	public function postLove() 
	{
		$inputs = Input::get();

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 1,
				'category_value' => $inputs['loveValue'],
				'created_at' => date('m/d/Y h:i:s', time()),
				'updated_at' => date('m/d/Y h:i:s', time())
			));

		return Redirect::to('love');
	}

	public function getHealth() 
	{

		$email = Auth::user()->email;
		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		$healthValues = DB::table('category_values')
			->where('user_id', '=', Auth::user()->id)
			->where('category_id', '=', 2)
			->get(array('category_value'));
	

		if($healthValues) {

			$healthArray = array();
			foreach($healthValues as $value) {
				$healthArray[] = $value->category_value;
			} 

			$finalValue = array_sum($healthArray)/count($healthArray);

			$data['healthValue'] = $finalValue;
		} else {
			$data['healthValue'] = 0;
		}	

		return View::make('lifegraphic.health', $data);
	}

	public function postHealth()
	{
		$inputs = Input::get();

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 2,
				'category_value' => $inputs['healthValue'],
				'created_at' => date('m/d/Y h:i:s', time()),
				'updated_at' => date('m/d/Y h:i:s', time())
			));

		return Redirect::to('health');
	}

	public function getAssets() 
	{

		$email = Auth::user()->email;
		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		$assetsValues = DB::table('category_values')
			->where('user_id', '=', Auth::user()->id)
			->where('category_id', '=', 2)
			->get(array('category_value'));
	

		if($assetsValues) {

			$assetsArray = array();
			foreach($assetsValues as $value) {
				$assetsArray[] = $value->category_value;
			} 

			$finalValue = array_sum($assetsArray)/count($assetsArray);

			$data['assetsValue'] = $finalValue;
		} else {
			$data['assetsValue'] = 0;
		}

		return View::make('lifegraphic.assets', $data);
	}

	public function postAssets()
	{
		$inputs = Input::get();

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 3,
				'category_value' => $inputs['assetsValue'],
				'created_at' => date('m/d/Y h:i:s', time()),
				'updated_at' => date('m/d/Y h:i:s', time())
			));

		return Redirect::to('assets');
	}

	public function getMood() 
	{

		$email = Auth::user()->email;
		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		$moodValues = DB::table('category_values')
			->where('user_id', '=', Auth::user()->id)
			->where('category_id', '=', 2)
			->get(array('category_value'));
	

		if($moodValues) {

			$moodArray = array();
			foreach($moodValues as $value) {
				$moodArray[] = $value->category_value;
			} 

			$finalValue = array_sum($moodArray)/count($moodArray);

			$data['moodValue'] = $finalValue;
		} else {
			$data['moodValue'] = 0;
		}

		return View::make('lifegraphic.mood', $data);
	}

	public function postMood() 
	{
		$inputs = Input::get();

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 4,
				'category_value' => $inputs['moodValue'],
				'created_at' => date('m/d/Y h:i:s', time()),
				'updated_at' => date('m/d/Y h:i:s', time())
			));

		return Redirect::to('mood');
	}

}