<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',FALSE);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		
		$this->load->model("sessionmodel");
		$this->load->library("validationsrequest");
	}


	public function sessionIgniter()
	{
		$admin = $this->sessionmodel->verifySession();

		if(count($admin)>0)
		{
			$dataSession = array(
				'id_administrador' 			=> $admin['id_administrador'],
				'usuario_administrador' 	=> $admin['usuario_administrador'],
				'nombre_administrador' 		=> $admin['nombre_administrador'],
				'apellidos_administrador' 	=> $admin['apellidos_administrador'],
				'tipo_administrador' 		=> $admin['tipo_administrador'],
				'logged_in' => TRUE
			);

			$this->session->set_userdata($dataSession);

			$added = $this->sessionmodel->insertIntoSessionTable($this->session->all_userdata());

			if ($added) {

				redirect(base_url(),"refresh");
			}
			
			else{
				redirect(base_url()."index.php/session/killSession/","refresh");
			}
		}		
		else
		{
			redirect(base_url()."index.php/home/errorSession/","refresh");
		}
	}

	public function killSession()
	{
		$this->session->sess_destroy('administradoresSession');
		redirect(base_url()."index.php","refresh");
	}
}