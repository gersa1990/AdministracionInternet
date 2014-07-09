<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WSservice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',FALSE);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->model("sessionmodel");
		$this->load->model("requestmodel");
		$this->load->model("customermodel");
		$this->load->model("servicemodel");
		$this->load->model("adminmodel");
		$this->load->model("sessionmodel");
		$this->load->library("validationsrequest");
	}

	public function add()
	{
		$sid = $this->input->get("sid");
		$admin = $this->sessionmodel->getAdminWhereSessionId($sid);

		var_dump($admin);
	}
}