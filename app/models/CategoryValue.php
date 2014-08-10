<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class CategoryValue extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category_values';

	public static function getLoveValue($userId) {
		$values = static::where('user_id', '=', $userId)
				->where('category_id', '=', 1)
				->get(array('category_value'));		

		if(count($values)) {

			$loveArray = array();
			foreach($values as $value) {
				$loveArray[] = $value->category_value;
			} 

			$finalValue = array_sum($loveArray)/count($loveArray);

			$loveValue = $finalValue;
		} else {
			$loveValue = 0;
		}	

		return $loveValue;		
	}

	public static function getHealthValue($userId) {
		$values = static::where('user_id', '=', $userId)
				->where('category_id', '=', 2)
				->get(array('category_value'));

		if(count($values)) {

			$healthArray = array();
			foreach($values as $value) {
				$healthArray[] = $value->category_value;
			} 

			$finalValue = array_sum($healthArray)/count($healthArray);

			$healthValue = $finalValue;
		} else {
			$healthValue = 0;
		}	

		return $healthValue;		
	}


	public static function getAssetsValue($userId) {
		$values = static::where('user_id', '=', $userId)
				->where('category_id', '=', 3)
				->get(array('category_value'));

		if(count($values)) {

			$assetsArray = array();
			foreach($values as $value) {
				$assetsArray[] = $value->category_value;
			} 

			$finalValue = array_sum($assetsArray)/count($assetsArray);

			$assetsValue = $finalValue;
		} else {
			$assetsValue = 0;
		}	

		return $assetsValue;		
	}

	public static function getMoodValue($userId) {
		$values = static::where('user_id', '=', $userId)
				->where('category_id', '=', 4)
				->get(array('category_value'));

		if(count($values)) {

			$moodArray = array();
			foreach($values as $value) {
				$moodArray[] = $value->category_value;
			} 

			$finalValue = array_sum($moodArray)/count($moodArray);

			$moodValue = $finalValue;
		} else {
			$moodValue = 0;
		}	

		return $moodValue;		
	}

	//Just for testing
	public static function getReasons($categoryId) {
		$reasonsSerialized = static::where('user_id', '=', Auth::user()->id)
					->where('category_id', '=', $categoryId)
					->pluck('reasons');
	
		if($reasonsSerialized) 
		{
			$reasons = unserialize($reasonsSerialized);
		} else {
			$reasons = array();
		}			

		return $reasons;			
	} 

}