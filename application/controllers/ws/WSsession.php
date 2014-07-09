<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WSsession extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("sessionmodel");
		$this->load->model("requestmodel");
		$this->load->model("customermodel");
		$this->load->model("servicemodel");
		$this->load->model("adminmodel");
		$this->load->model("sessionmodel");
		$this->load->library("validationsrequest");
		$this->load->library("nusoap");
	}

	public function igniter()
	{
		 $this->nusoap_client = new nusoap_client("http://localhost/Dropbox/AdministracionInternet/");

        if($this->nusoap_client->fault)
        {
             $text = 'Error: '.$this->nusoap_client->fault;
        }
        else
        {
            if ($this->nusoap_client->getError())
            {
                 $text = 'Error: '.$this->nusoap_client->getError();
            }
            else
            {
                 $row = $this->nusoap_client->call(
                          'funcionEnElServidor',
                           array(parametros)
                        );
               
            }
     }
	}

}