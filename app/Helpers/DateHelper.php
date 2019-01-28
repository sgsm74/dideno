<?php
namespace App\Helpers;
use App\Http\Controllers\JalaliController;
/**
 * Convert to Jalali Date within helpers
 */
class DateHelper {


	/**
	 * check for exist
	 */
		

		public static function setToJalaliTime($timestamps,$default=null){

			return JalaliController::getJalaliFullTime($timestamps);
		}
	
		public static function setToJalaliDate($timestamps,$default=null){

			return JalaliController::getJalaliDate($timestamps);
		}



}