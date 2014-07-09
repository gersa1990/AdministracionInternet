<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',FALSE);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model("ws/usermodel");
		$this->load->library("validationsrequest");
	}

	public function search($type = "json")
	{
		$user = $this->usermodel->searchAdmin();

		if ($type == "json") {
			if (empty($user)) {
				
				var_dump("expression");
			}
			
			print json_encode($user);
		}
	}
}