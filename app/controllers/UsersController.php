<?php

 
class UsersController extends BaseController {
 	

	public function __construct() {

	    $this->beforeFilter('csrf', array('on'=>'post'));
	    // $this->beforeFilter('custom.auth');
	    
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

	/**
     * Login page
     *
     * @return view
     */
	public function getLogin() 
	{

	    return View::make('users.login');

	}

	/**
     * Login user
     * @param  credentials
     * @return response
     */
	public function postLogin() 
	{

		$email 	  = Input::get('email');
		$password = Input::get('password');

		$this->email = $email;

		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {

		    return Redirect::to('health');

		} else {

		    return Redirect::to('users/login')
		        ->with('message', '<p class="alert alert-error">Your username/password combination was incorrect</p>')
		        ->withInput();

		}

	}

	/**
     * Logout user
     * @return response
     */
	public function getLogout() 
	{
		Auth::logout();
		return Redirect::to('/');
	}

	/**
     * Get category data and display on the page
     * @return response
     */
	public function getCategory( $category ) 
	{	

		$categoryId = Category::switchCategory( $category );

		if( Auth::check() ) 
		{

			$data 						 = static::getValues();
			$data['userReasons'] 		 = Reason::getReasons( Auth::user()->id, $categoryId );
			$data['reasonNames'] 		 = Reason::getReasonsText( Auth::user()->id, $categoryId );
			$data['numberOfTodaySubmissions'] = CategoryValue::countLast24HoursSubmissions( $categoryId );

			return View::make( "lifegraphic.$category", $data );

		} else {

			return Redirect::to( '/' );

		}	

	}

	/**
     * Post category value and reasons
     * @return response
     */
	public function postCategory( $category )  
	{

		$inputs = Input::get();

		$categoryValue = $category . 'Value';

		$rules = array(
			$categoryValue => 'required',
			'reasons' => 'array|required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::back()->withErrors($validator);

		}

		$categoryId          = Category::switchCategory( $category );

		$numberOfSubmissions = CategoryValue::countLast24HoursSubmissions( $categoryId );

		if( $numberOfSubmissions >= 7 ) 
		{

			return Redirect::back()->with( 'warning', 'You cannot submit more than 7 times per category per day.' );

		}							

		$bindings = [

			'user_id' 	     => Auth::user()->id,
			'category_id'    => $categoryId,
			'category_value' => $inputs[$categoryValue],
			'reasons'        => serialize( $inputs['reasons'] )

		];

		CategoryValue::saveValue( $bindings );

		return Redirect::to( $category );

	}

	/**
     * Pull categories values from database for a client
     * @return array
     */
	private static function getValues() {
		
		$data = CategoryValue::getValues();

		$email = Auth::user()->email;

		$data['firstname'] = User::where('email', $email)->pluck('first_name');
		$data['lastname'] = User::where('email', $email)->pluck('last_name');

		return $data;
	}

	// Note: Leave the code like this for now, 
	// but reorganize later
	
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

	/**
     * View Submissions page
     * @param none
     * @return view
     */

	public function viewSubmissions() {
		
		if(Auth::check()) {
			$data = static::getValues();
			$data['$submissionsPage'] = true;
			// $data['submissionValues'] = $values;
			$data['numberOfTotalSubmissions'] = CategoryValue::countTotalSubmissions();
			$data['submissionPreview'] = true;
			return View::make('lifegraphic.submissions', $data);
		} else {
			return Redirect::to('/');
		}

	}


	/**
     * Pull submissions with AJAX request
     * @param none
     * @return json
     */

	public function pullSubmissions() {

		$submissionData = CategoryValue::getSubmissions();

		if( ! $submissionData->isEmpty() ) {
			$values = array();
			foreach ($submissionData as $data) {
				$category = Category::find($data->category_id)->name;
				$class = Category::getClass($data->category_id);
				$categoryValue = CategoryValue::getDescriptiveValue($data->category_value);
				$values[] = array(
					'class'    => $class,
					'category' => ucfirst($category),
					'date'     => $data->created_at->toDateTimeString(),
					'reasons'  => Reason::toWords(unserialize($data->reasons)),
					'value'    => $categoryValue
				); 
			}
		} else {
			$values = array();
		}

		return json_encode($values);

	}


}