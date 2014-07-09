<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

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

		$this->load->library("validationsrequest");
	}

	

	public function takeService($hash = null)
	{		

		if (empty($hash)) {
			
			redirect(base_url()."index.php/home/index/","refresh");
		}

		$objValidations = new validationsrequest();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();
			$data['hash'] = $hash;

			$data['request'] 	= $this->requestmodel->getRequestByHash($hash);
			$data['customer']	= $this->customermodel->getCustomer( $data['request']['id_cliente']);

			$data['service']    =  $this->servicemodel->getServiceProvidedByCustomer($data['request']['id_cliente']);

			$data['request']['fecha_solicitada_peticion'] = $objValidations->convertIntoHumanDate($data['request']['fecha_solicitada_peticion']);
			$data['request']['fecha_realizada_peticion']  = $objValidations->convertIntoHumanDate($data['request']['fecha_realizada_peticion']);

			$this->load->view('core/header', $data);
			$this->load->view('admin/takeService', $data);
			$this->load->view('core/footer');
		}
		else
		{
			redirect(base_url()."home/index/","refresh");
		}
	}

	public function editService($hash)
	{
		if (empty($hash)) {
			
			redirect(base_url()."index.php/home/index/","refresh");
		}
		
		$objValidations = new validationsrequest();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();
			$data['hash'] = $hash;

			$data['request'] 	= $this->requestmodel->getRequestByHash($hash);
			$data['customer']	= $this->customermodel->getCustomer( $data['request']['id_cliente']);

			$data['service']    =  $this->servicemodel->getServiceProvidedByCustomer($data['request']['id_cliente']);

			$data['postData'] = array(
							'name' 							=> $data['customer']['nombre_cliente'],
							'paternaLastName'				=> $data['customer']['apellido_paterno_cliente'],
							'maternLastName'				=> $data['customer']['apellido_materno_cliente'],
							'cellPhone'						=> $data['customer']['telefono_cliente'],
							'email'							=> $data['customer']['correo_cliente'],
							'street_address'				=> $data['customer']['calle_cliente'],
							'neighborhood'					=> $data['customer']['colonia_cliente'],
							'postal_code'					=> $data['customer']['codigo_postal_cliente'],
							'administrative_area_level_1'	=> $data['customer']['ciudad_cliente'],
							'sublocality'					=> $data['customer']['municipio_cliente'],
							'references'					=> $data['customer']['referencias_cliente'],
							'dayForVisit'					=> $data['request']['fecha_solicitada_peticion'],
							'timeForVisit'					=> $data['request']['hora_deseada_visita'],
						 );


			$data['request']['fecha_solicitada_peticion'] = $objValidations->convertIntoHumanDate($data['request']['fecha_solicitada_peticion']);
			$data['request']['fecha_realizada_peticion']  = $objValidations->convertIntoHumanDate($data['request']['fecha_realizada_peticion']);

			$data['Loggued'] = $this->session->all_userdata();


			$this->load->view('core/header', $data);
			$this->load->view('admin/editService', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url(),"refresh");
		}
	}

	public function showAll()
	{
		$objValidations = new validationsrequest();
		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();
			
			$data['admins'] = $this->adminmodel->getAll();

			$this->load->view('core/header', $data);
			$this->load->view('admin/showAll', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url(),"refresh");
		}
	}

	public function editAdminForm()
	{
		$admin 			= $this->adminmodel->getAdmin($this->input->post("admin"));
		$tipesAdmin 	= $this->adminmodel->getTypesAdmin();

		$data['admin'] 		= $admin;
		$data['typesAdmin']	= $tipesAdmin;

		$this->load->view("admin/editForm",$data);
	}

	public function editAdmin()
	{
		$edited = $this->adminmodel->editToBD();

		if ($edited) {

			print "Edited";
		}
	}

	public function deleteAdminForm()
	{
		$data['admin'] 	= $this->adminmodel->getAdmin($this->input->post("admin"));

		$this->load->view("admin/deleteForm",$data);
	}


	public function getAsincAdminEdited()
	{
		$admin = $this->adminmodel->getAsincAdminEdited();
		$data['admin'] = $admin;
		
		$this->load->view("admin/asyncronus/rowTableAdmin",$data);
	}

	public function deleteAdmin()
	{
		$deleted = $this->adminmodel->deleteToBD();

		print $deleted;
	}

	public function getFormToAddAdmin()
	{
		$tipesAdmin 	= $this->adminmodel->getTypesAdmin();

		$data['typesAdmin']	= $tipesAdmin;

		$this->load->view("admin/addForm",$data);
	}

	public function addAdmin()
	{
		$added = $this->adminmodel->addToBD();

		print $added;
	}

	public function getAsincAdminAdded()
	{
		$data['admin'] 	= $this->adminmodel->getAdminAdded($this->input->post("id"));

		$this->load->view("admin/asyncronus/rowTableAdminAdded",$data);
	}
}