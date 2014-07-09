<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class encrypter {

	public function __construct()
	{

	}

	public function encrypt($string)
	{
		$integer = '';
		
		foreach (str_split($string) as $char) {

		    $integer .= sprintf("%03s", ord($char));
		}
		return $integer;
	}

	public function decrypt($integer)
	{
		$string = '';
		
		foreach (str_split($integer, 3) as $number) {
		    $string .= chr($number);
		}

		return $string;
	}
}