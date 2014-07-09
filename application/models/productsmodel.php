<?php

class productsmodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsRequest");

	}

	public function getProducts()
	{
		return $this->db->query("SELECT * FROM productos WHERE nombre_producto LIKE '%".$this->input->post("products")."%' ")->result_array();
	}

	public function getNameById()
	{
		return $this->db->get_where("productos", array('id_producto' => $this->input->post("id")))->row_array();
	}

	public function getAll()
	{
		return $this->db->query("SELECT * FROM productos ORDER BY nombre_producto ASC ")->result_array();
	}

	public function getProductById()
	{
		$validations = new validationsrequest();
		return $this->db->query("SELECT * FROM productos WHERE id_producto = ".(int)$validations->clearPost($this->db->escape($this->input->post("productID")))." ")->row_array();
	}

	public function editProduct()
	{
		$validations = new validationsrequest();
		$data = array('nombre_producto' => $validations->clearPost($this->db->escape($this->input->post("nameProduct"))) );
		return $this->db->update("productos", $data, array('id_producto' => $validations->clearPost($this->db->escape($this->input->post("idProduct"))) ));
	}

	public function addProduct()
	{
		$validations = new validationsrequest();
		$data = array('nombre_producto' => $validations->clearPost($this->db->escape($this->input->post("nameProduct")))  );
		$this->db->insert("productos", $data);
		return  $this->db->insert_id();
	}

	public function searchServiceAsyncronus()
	{
		
	}
}