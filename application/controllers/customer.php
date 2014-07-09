<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript',FALSE);
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library("validationsrequest");
		$this->load->model('customermodel');
		$this->load->model("requestmodel");

		$this->load->library("encrypter");
	}

	public function addRequestFromService()
	{
		$objValidations = new validationsrequest();
		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($objValidations->validate($_POST))
		{
			$customerAdded = $this->customermodel->addToBD();

			if ($customerAdded) {

				$requestAdded  = $this->requestmodel->addToBD($customerAdded, $loggeidIn);

				if ($requestAdded) {

					redirect(base_url()."index.php/customer/showRequest/".$requestAdded,"refresh");
				}
			}
			else{

				redirect(base_url()."index.php/customer/requestFail/","refresh");
			}
		}
		else{
			
			$data = $_POST;
			
			$this->session->set_flashdata('postData',$data);
			redirect(base_url()."index.php/customer/requestFail/","refresh");
		}
	}

	public function requestFail()
	{
		$objValidations = new validationsrequest();

		$this->session->keep_flashdata('postData');
		$postData = $this->session->flashdata('postData');

		$data['postData'] =$objValidations->clearPost($postData);

		$data['resignResponder'] = 1;

		$loggeidIn = $this->session->userdata('usuario_administrador');

		$this->load->view('core/header', $data);
		$this->load->view('service/request', $data);
		$this->load->view('core/resignResponder',$data);
		$this->load->view('core/footer');
	}

	public function showRequest($hash)
	{
		$objValidations = new validationsrequest();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();
		}

		$data['hash'] = $hash;

		$data['request'] 	= $this->requestmodel->getRequestByHash($hash);
		$data['customer']	= $this->customermodel->getCustomer( $data['request']['id_cliente']);

		$data['request']['fecha_solicitada_peticion'] = $objValidations->convertIntoHumanDate($data['request']['fecha_solicitada_peticion']);

		$this->load->view('core/header', $data);
		$this->load->view('customer/show', $data);
		$this->load->view('core/footer');
	}

	public function showRequestForWaiting()
	{
		$objValidations = new validationsrequest();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		 $waitings = $this->customermodel->getWaitongForServices(); 

		foreach ($waitings as $key => $customer) {
			
			$waitings[$key]['fecha_realizada_peticion'] = $objValidations->convertIntoHumanDate($customer['fecha_realizada_peticion']);
			$waitings[$key]['fecha_solicitada_peticion'] = $objValidations->convertIntoHumanDate($customer['fecha_solicitada_peticion']);
		}

		$data['waitings'] = $waitings;

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('customer/showWaitingRequests', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url()."index.php/home/session/","refresh");
		}
	}

	public function detail($cliente)
	{
		
		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$encrypter = new encrypter();
			$objValidations = new validationsrequest();

			$customerId =  $encrypter->decrypt($cliente);
			$history = $customerHistory = $this->customermodel->getHistoryForCustomer($customerId);

			$data['Loggued'] = $this->session->all_userdata();

			$data['customer'] 	= $history['customer'];
			$data['payments'] 	= $history['payments'];
			$data['products']	= $history['products'];
			//$data['']

			$total = 0;

			foreach ($data['payments'] as $key => $payment) {
				
				$data['payments'][$key]["fecha_pago_parsed"] = $objValidations->convertIntoHumanDate($payment['fecha_pago']); 
				$total += $payment['cantidad'];
				$data['payments'][$key]['concepto_parsed'] = $objValidations->getMonthOfFacrure($payment['concepto']);
			}

			$data['total'] = $total;

			foreach ($data['products'] as $key => $product) {

				if (empty($data['fecha_instalacion'])){

					$data['fecha_instalacion'] =  $objValidations->convertIntoHumanDate($product['fecha_instalacion_servicio']);
					$dateInstalation = $product['fecha_instalacion_servicio'];
				}
			}

			$data['console'] = "";
			$data['delays']  = "";

			if (empty($data['payments'])){
				
				$data['console'] = "No existen pagos para este usuario.";
			}

			if (strtotime($dateInstalation) <= strtotime(date("Y-m-d")) && ( strtotime(date("Y-m-d", strtotime(date("Y-m-d")." -1 month"))) <= strtotime($dateInstalation)) ){
	
				$data['console'] .= "<br/>La fecha de tu próximo pago es: ".$objValidations->convertIntoHumanDate(date("Y-m-d", strtotime($dateInstalation." +1 month")));
			}

			if (strtotime($dateInstalation) <= strtotime(date("Y-m-d")) && ( strtotime(date("Y-m-d", strtotime(date("Y-m-d")." -1 month"))) >= strtotime($dateInstalation)) ){
			
				$rotor = 1;
				$delayed = 0;
				for ($i = date("m", strtotime($dateInstalation)) ; $i < date("m", strtotime(date("Y-m-d"))) ; $i++, $rotor++ ) { 

					if ( strtotime(date("Y-m-d", strtotime($dateInstalation." +".$rotor." month"))) <  strtotime(date("Y-m-d", strtotime(date("Y-m-d")))) ) {

						
						$data['delays'][$delayed]['fecha_vencida'] 		= $objValidations->convertIntoHumanDate(date("Y-m-d", strtotime($dateInstalation." +".$rotor." month")));
						$data['delays'][$delayed]['cantidad_vencida'] 	= $data['products'][0]['cantidad'];
						$delayed++;
					}
				}
			}


			$this->load->view('core/header', $data);
			$this->load->view('customer/detail', $data);
			$this->load->view('core/footer');
		}
		else
		{
			redirect(base_url()."","refresh");
		}

	}

	public function editRequestFromService()
	{
		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$Loggued = $this->session->all_userdata();
			$edited = $this->customermodel->editToBD($Loggued);
		}
		else
		{
			redirect(base_url()."index.php/home/session/","refresh");
		}

		if ($edited) {
			redirect(base_url()."index.php/admin/editService/".$this->input->post("hash"),"refresh");
		}
	}
}