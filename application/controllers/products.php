<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Controller {


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
		$this->load->model("productsmodel");
	}

	public function searchProducts()
	{
		$data['products'] = $products = $this->productsmodel->getProducts();
		$this->load->view('product/showFounded', $data);
	}

	public function getNameProduct()
	{
		$producto = $this->productsmodel->getNameById();
		print $producto['nombre_producto'];
	}

	public function getFormToAsignProducts()
	{
		$this->load->view('product/assincView');
	}

	public function index()
	{
		$data['products'] = $products = $this->productsmodel->getAll();

		$loggeidIn = $this->session->userdata('usuario_administrador');

		if($loggeidIn!=NULL)
		{
			$data['Loggued'] = $this->session->all_userdata();

			$this->load->view('core/header', $data);
			$this->load->view('product/showAll', $data);
			$this->load->view('core/footer');
		}	
		else
		{
			redirect(base_url()."index.php/home/session/");
		}
	}

	public function getFormToEdit()
	{
		$data['product'] = $product = $this->productsmodel->getProductById();

		$this->load->view("product/editProductForm",$data);
	}

	public function editProduct()
	{
		$edited = $this->productsmodel->editProduct();

		if ($edited) {
			
			print "Edited";
		}
	}

	public function getFormToDelete()
	{
		$data['product'] = $product = $this->productsmodel->getProductById();

		$this->load->view("product/deleteProductForm",$data);
	}

	public function gerFotmToAddProduct()
	{
		$this->load->view("product/addFormProducts");
	}

	public function addAsyncronusProduct()
	{
		$added = $this->productsmodel->addProduct();

		print $added;
	}

	public function getRowProductAsyncronus()
	{
		$product = $data['product'] = $this->productsmodel->getProductById();

		

		$data['identifier'] = $this->input->post("identifier");

		$this->load->view("product/rowProduct",$data);
	}

	public function searchServiceAsyncronus()
	{
		$asd = explode(" ",$this->input->post("token"));

		var_dump($asd);

		//$services = $this->products->searchServiceAsyncronus($asd);

		//var_dump($services);
	}
}