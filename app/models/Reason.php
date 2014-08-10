<?php

class Reason extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reasons';	

	/**
	 * Get reasons from DB.
	 *
	 * @param $userId
	 * @param $categoryId
	 * @return mixed
	 */
	public static function getReasons($userId, $categoryId) {
		$userReasons = static::where('user_id', '=', $userId)
							->where('category_id', '=', $categoryId)
							->lists('reason_text');
		return $userReasons;					
	}

}