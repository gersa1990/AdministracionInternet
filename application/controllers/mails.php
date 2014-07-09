<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mails extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("homemodel");
		$this->load->library('email');
		$this->load->helper('email');
	}

	public function remenber()
	{
		$nextDatePay = $this->homemodel->getNextDatePayDay();

		$nextToPay = $nextDatePay['proximos'];
		$delayed   = $nextDatePay['delayed'];

		
		$me = "gersain.aguilar.pardo@gmail.com";

		foreach ($nextToPay as $key => $customerToPay) {

			if(valid_email($customerToPay['correo_cliente']))
			{
				var_dump($customerToPay['correo_cliente']);

				$this->email->clear(TRUE);

				$this->email->from('gersain.aguilar.pardo@gmail.com', 'Gersain Aguilar Pardo');
				$this->email->to($customerToPay['correo_cliente']);
				$this->email->cc($me);
				$this->email->bcc($me);

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');

				$this->email->send();

				echo $this->email->print_debugger();			
			}
		}

		foreach ($delayed as $key => $customerToPay) {

			if(valid_email($customerToPay['correo_cliente']))
			{
				var_dump($customerToPay['correo_cliente']);

				$this->email->clear(TRUE);

				$this->email->from('gersain.aguilar.pardo@gmail.com', 'Gersain Aguilar Pardo');
				$this->email->to($customerToPay['correo_cliente']);
				$this->email->cc($me);
				$this->email->bcc($me);

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');

				$this->email->send();

				echo $this->email->print_debugger();
			}
		}
		
	}
}
