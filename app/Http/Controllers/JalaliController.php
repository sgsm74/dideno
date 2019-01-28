<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JDF;

class JalaliController extends Controller
{
    //
    public $jdf;

    public static function getJalaliFullTime($fullDate){
    	$jdf = new JDF();
		$array = explode(' ', $fullDate);
		list($year, $month, $day) = explode('-', $array[0]);
		list($hour, $minute, $second) = explode(':', $array[1]);
		$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
		$jalali_fullDate = $jdf->jdate("Y/m/d  H:i:s", $timestamp);
		
		return $jalali_fullDate;
    }

    public static function getJalaliDate($date){
    	$jdf = new JDF();
		$array = explode(' ', $date);
		list($year, $month, $day) = explode('-', $array[0]);
		list($hour, $minute, $second) = explode(':', $array[1]);
		$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
		$jalali_fullDate = $jdf->jdate("Y/m/d", $timestamp);
		
		return $jalali_fullDate;
    }
}
