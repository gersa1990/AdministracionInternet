<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',FALSE);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model("servicemodel");
		$this->load->library("validationsrequest");
	}

	public function request()
	{
		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('service/request', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url(),"refresh");
		}
	}

	public function sendRequestToNewCustomer()
	{
		$this->load->view('service/request');
	}

	public function addProductsAssinc()
	{
		$loggeidIn = $this->session->userdata('usuario_administrador');
		$admin = $this->session->all_userdata();

		$added = $this->servicemodel->asignProductToCustomer($admin['nombre_administrador']);

		print $added;
	}

	public function fetEditFormProductFromId()
	{
		$product = $data['product'] = $this->servicemodel->getAssincDataFromProductAdded();

		$this->load->view("service/asyncronus/formEdit",$data);
	}

	public function getAssincDataFromProductAdded()
	{

		$data['product'] = $this->servicemodel->getAssincDataFromProductAdded();

		$this->load->view("service/asyncronus/productAdded",$data);
	}

	public function getDeleteFormProductFromId()
	{
		$product = $data['product'] = $this->servicemodel->getAssincDataFromProductAdded();
		$this->load->view("service/asyncronus/formDelete",$data);
	}

	public function deleteFromId()
	{
		$deleted = $this->servicemodel->deleteFromId();
		print $deleted;
	}

	public function showServiceInstalled()
	{
		$objValidations = new validationsrequest();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		$installed = $this->servicemodel->getServicesInstalled();

		foreach ($installed as $key => $value) {

			$installed[$key]['fecha_expedicion_servicio'] 	= $objValidations->convertIntoHumanDate($value['fecha_expedicion_servicio']);
			$installed[$key]['fecha_instalacion_servicio'] 	= $objValidations->convertIntoHumanDate($value['fecha_instalacion_servicio']);
		}

		$cleaned = array();

		foreach ($installed as $key => $service) {
			
			if (array_key_exists($service['nombre_cliente'], $cleaned)) {
				
				$cleaned[$service['nombre_cliente']]['added'][] = $service;
			}
			else{
				$cleaned[$service['nombre_cliente']] = $service;
			}
		}

		$data['serviceCleaned'] = $cleaned;

		$data['installedServices'] = $installed;

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('service/showInstalled', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url()."index.php/home/session/","refresh");
		}
	}
}
