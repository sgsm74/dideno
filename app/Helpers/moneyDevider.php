<?php
namespace App\Helpers;

/**
 * 
 */
class moneyDevider
{

	private $amount;
	
	public function __construct($amount)
	{
		$this->amount = $amount;
	}

	public function count($cost){
		$count=0;
		while ( $cost/1000 > 0) {
		 	$count++;
		 }
		 return $count; 
	}

	public function convert(){
		
		$temp=(int)$this->amount;
		$count=$this->count($temp);
		$length=strlen($this->amount);
		for ($i=$length; $i > 0 ; $i=$i-3) { 
			# code...
		}
	}



}