<?php

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';	

	/**
	 * Switch between categories
	 * @var string
	 * @return int
	 */
	public static function switchCategory( $category ) 
	{

		switch ( $category ) 
		{

		 	case 'love':
		 		$categoryId = 1;
		 		break;

		 	case 'health':
		 		$categoryId = 2;
		 		break;

		 	case 'assets':
		 		$categoryId = 3;	
		 		break;

		 	case 'mood':
		 		$categoryId = 4;
		 		break;

		} 

		return $categoryId;

	}

}

