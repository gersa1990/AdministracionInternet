<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',true);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('homemodel');
	}

	public function index()
	{
		$loggeidIn = $this->session->userdata('usuario_administrador');
		$data['nextDatePay'] = $this->homemodel->getNextDatePayDay();

		$data['error'] = "";

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			$this->load->view('core/header', $data);
			$this->load->view('home/session', $data);
			$this->load->view('core/footer');
		}
	}

	public function errorSession()
	{
		$data['error'] = "true";

		$this->load->view('core/header', $data);
		$this->load->view('home/session', $data);
		$this->load->view('core/footer');
		
	}

	public function session()
	{
		$loggeidIn = $this->session->userdata('usuario_administrador');

		$data['error'] = "";

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			$this->load->view('core/header', $data);
			$this->load->view('home/session', $data);
			$this->load->view('core/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */