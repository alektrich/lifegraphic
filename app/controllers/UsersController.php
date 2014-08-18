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
		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		if(Auth::check()) {
			$data = static::getValues();
			$data['userReasons'] = Reason::getReasons(Auth::user()->id, 1);
			$data['reasonNames'] = Reason::getReasonsText(Auth::user()->id, 1);
			$data['numberOfSubmissions'] = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 1)
									->where('created_at', '>', $last24Hours)
									->count();
			return View::make('lifegraphic.love', $data);
		} else {
			return Redirect::to('/');
		}
	}

	public function postLove() 
	{
		$inputs = Input::get();

		$rules = array(
			'loveValue' => 'required',
			'reasons' => 'array|required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('love')->withErrors($validator);
		}

		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		$now = date('Y-m-d h:i:s', strtotime('now'));

		$numberOfSubmissions = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 1)
									->where('created_at', '>', $last24Hours)
									->count();

		if($numberOfSubmissions >= 7) {
			return Redirect::back()->with('warning', 'You cannot submit more than 7 times per category per day.');
		}							
		// $catValue = new CategoryValue;

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 1,
				'category_value' => $inputs['loveValue'],
				'reasons' => serialize($inputs['reasons']),
				'created_at' => $now, 
				'updated_at' => $now
			));

		return Redirect::to('love');
	}

	public function getHealth() 
	{	
		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		if(Auth::check()) {
			$data = static::getValues();
			$data['userReasons'] = Reason::getReasons(Auth::user()->id, 2);
			$data['reasonNames'] = Reason::getReasonsText(Auth::user()->id, 2);
			$data['numberOfSubmissions'] = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 2)
									->where('created_at', '>', $last24Hours)
									->count();
			// dd($data['numberOfSubmissions']);						
			return View::make('lifegraphic.health', $data);
		} else {
			return Redirect::to('/');
		}
	}

	public function postHealth()
	{
		$inputs = Input::get();

		$rules = array(
			'healthValue' => 'required',
			'reasons' => 'array|required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('health')->withErrors($validator);
		}

		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		$now = date('Y-m-d h:i:s', strtotime('now'));

		$numberOfSubmissions = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 2)
									->where('created_at', '>', $last24Hours)
									->count();
		// dd($numberOfSubmissions);							

		if($numberOfSubmissions >= 7) {
			return Redirect::back()->with('warning', 'You cannot submit more than 7 times per category per day.');
		}

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 2,
				'category_value' => $inputs['healthValue'],
				'reasons' => serialize($inputs['reasons']),
				'created_at' => date('Y-m-d h:i:s', strtotime('now')), 
				'updated_at' => date('Y-m-d h:i:s', strtotime('now'))
			));

		return Redirect::to('health');
	}

	public function getAssets() 
	{	
		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		if(Auth::check()) {
			$data = static::getValues();
			$data['userReasons'] = Reason::getReasons(Auth::user()->id, 3);
			$data['reasonNames'] = Reason::getReasonsText(Auth::user()->id, 3);
			$data['numberOfSubmissions'] = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 3)
									->where('created_at', '>', $last24Hours)
									->count();
			return View::make('lifegraphic.assets', $data);
		} else {
			return Redirect::to('/');
		}
	}

	public function postAssets()
	{
		$inputs = Input::get();

		$rules = array(
			'assetsValue' => 'required',
			'reasons' => 'array|required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('assets')->withErrors($validator);
		}

		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		$now = date('Y-m-d h:i:s', strtotime('now'));

		$numberOfSubmissions = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 3)
									->where('created_at', '>', $last24Hours)
									->count();

		if($numberOfSubmissions >= 7) {
			return Redirect::back()->with('warning', 'You cannot submit more than 7 times per category per day.');
		}

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 3,
				'category_value' => $inputs['assetsValue'],
				'reasons' => serialize($inputs['reasons']),
				'created_at' => date('Y-m-d h:i:s', strtotime('now')), 
				'updated_at' => date('Y-m-d h:i:s', strtotime('now'))
			));

		return Redirect::to('assets');
	}

	public function getMood() 
	{	
		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		if(Auth::check()) {
			$data = static::getValues();
			$data['userReasons'] = Reason::getReasons(Auth::user()->id, 4);
			$data['reasonNames'] = Reason::getReasonsText(Auth::user()->id, 4);
			$data['numberOfSubmissions'] = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 4)
									->where('created_at', '>', $last24Hours)
									->count();
			return View::make('lifegraphic.mood', $data);
		} else {
			return Redirect::to('/');
		}
	}

	public function postMood() 
	{
		$inputs = Input::get();

		$rules = array(
			'moodValue' => 'required',
			'reasons' => 'array|required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('mood')->withErrors($validator);
		}

		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));
		$now = date('Y-m-d h:i:s', strtotime('now'));

		$numberOfSubmissions = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', 4)
									->where('created_at', '>', $last24Hours)
									->count();

		if($numberOfSubmissions >= 7) {
			return Redirect::back()->with('warning', 'You cannot submit more than 7 times per category per day.');
		}

		DB::table('category_values')
			->insert(array(
				'user_id' => Auth::user()->id,
				'category_id' => 4,
				'category_value' => $inputs['moodValue'],
				'reasons' => serialize($inputs['reasons']),
				'created_at' => date('Y-m-d h:i:s', strtotime('now')), 
				'updated_at' => date('Y-m-d h:i:s', strtotime('now'))
			));

		return Redirect::to('mood');
	}

	private static function getValues() {
		$userId = Auth::user()->id;

		$loveValue = CategoryValue::getLoveValue($userId);
		$healthValue = CategoryValue::getHealthValue($userId);
		$assetsValue = CategoryValue::getAssetsValue($userId);
		$moodValue = CategoryValue::getMoodValue($userId);

		$email = Auth::user()->email;

		$data = array(
			'loveValue' => $loveValue,
			'healthValue' => $healthValue,
			'assetsValue' => $assetsValue,
			'moodValue' => $moodValue
		);

		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		return $data;
	}

	//Note: Leave the code like this for now, but reorganize later for better MVC Laravel structure
	public function postReason() {
		$inputs = Input::get();

		$reason   = strtolower($inputs['reason']);
		$category = $inputs['category'];

		$rules = array(
			'reason' => 'required|max:19',
			'category' => 'required'
		);

		$categoryId = (int)Category::where('name', '=', $category)->pluck('id');
		$userId = Auth::user()->id;

		$validator = Validator::make($inputs, $rules);

		if($validator->fails()) {
			return Redirect::to($category)->withErrors($validator);
		}

		$reasonWords = explode(' ', $reason);
		// dd($reasonWords);
		$reasonText = '';
		if(count($reasonWords) > 1) {
			for($i = 0; $i < count($reasonWords); $i++) {
				if($i === 0) {
					$reasonText .= $reasonWords[$i];
				} else {
					$reasonText .= '-' . $reasonWords[$i];
				}
			}
		} else {
			$reasonText = $reasonWords[0];
		}

		$newReason = new Reason;

		$checkReasons = Reason::where('user_id', '=', $userId)->where('category_id', '=', $categoryId)->lists('reason_text');

		if(in_array($reasonText, $checkReasons)) {
			// Session::flash('alert', '<p class="alert alert-warning">Reason already exists.</p>');
			return Redirect::back()->with('warning', 'Reason already exists.');
		}

		if(count($checkReasons) === 9) {
			return Redirect::back()->with('warning', 'You cannot add more reasons.');
		}

		$newReason->user_id = $userId;
		$newReason->category_id = $categoryId;
		$newReason->reason = $reasonText;
		$newReason->reason_text = $inputs['reason'];

		$newReason->save(); 

		return Redirect::back();
	}

	public function viewSubmissions($category_id) {
		$submissionData = CategoryValue::where('user_id', '=', Auth::user()->id)
							// ->where('category_id', '=', $category_id)
							->get();

		$last24Hours = date('Y-m-d h:i:s', strtotime('now - 24 hours'));					
		$numberOfSubmissions = CategoryValue::where('user_id', '=', Auth::user()->id)
									->where('category_id', '=', $category_id)
									->where('created_at', '>', $last24Hours)
									->count();					

		// dd($submissionData);					
		if(!$submissionData->isEmpty()) {
			$values = array();
			foreach ($submissionData as $data) {
				$values[] = array(
					'category_id' => (int)$data->category_id,
					'date' => $data->created_at->toDateString(),
					'reasons' => unserialize($data->reasons),
					'value' => $data->category_value 
				); 
			}
		} else {
			$values = array();
		}
		if(Auth::check()) {
			$data = static::getValues();
			$data['submissionValues'] = $values;
			$data['numberOfSubmissions'] = $numberOfSubmissions;
			$data['submissionPreview'] = true;
			return View::make('lifegraphic.submissions', $data);
		} else {
			return Redirect::to('/');
		}
	}
}