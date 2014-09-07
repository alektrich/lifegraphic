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
	 * @return array
	 */
	public static function getReasons($userId, $categoryId) {
		$userReasons = static::where('user_id', '=', $userId)
							->where('category_id', '=', $categoryId)
							->orderBy('id')
							->lists('reason');
		return $userReasons;					
	}

	/**
	 * Get reasons from DB.
	 *
	 * @param $userId
	 * @param $categoryId
	 * @return array
	 */
	public static function getReasonsText($userId, $categoryId) {
		$userReasonsText = static::where('user_id', '=', $userId)
							->where('category_id', '=', $categoryId)
							->orderBy('id')
							->lists('reason_text');
		return $userReasonsText;					
	}

	/**
	 * Convert reasons slugs to words
	 *
	 * @param array
	 * @return array
	 */

	public static function ToWords( $array ) {

		if( ! empty( $array ) ) {
			$newArray = array();

			foreach ($array as $value) {

				if( strpos( $value, '-' ) ) {
					$words = explode( '-', $value );
					$words[0] = ucfirst( $words[0] );
					$value = implode( ' ', $words );
				} else {
					$value = ucfirst( $value );
				}

				$newArray[] = $value;

			}

			return $newArray;
			
		} else {

			return $array;

		}

	}

}