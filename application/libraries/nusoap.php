<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class nusoap {
	
	public function __construct()
	{
		$this->nusoap();
	}

	public function nusoap()
	{
		require_once (APPPATH."libraries/nusoap/lib/nusoap.php");
	}
}