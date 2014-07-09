<?php

class paymentsmodel extends CI_Model
{
	public static $objValidations;

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsrequest");
		self::$objValidations = new validationsrequest();
	}

	public function getPaymentsType()
	{
		return $this->db->get("tipo_pago")->result_array();
	}

	public function addPaymentTypeAsyncronus()
	{
		$data = array(	'cantidad' 		=>	self::$objValidations->clearPost($this->db->escape($this->input->post("amount"))),
						'descripcion' 	=>  self::$objValidations->clearPost($this->db->escape($this->input->post("description"))));

		$this->db->insert("tipo_pago", $data);
		return $this->db->insert_id();
	}

	public function getPaymentTypeForId()
	{
		return $this->db->get_where("tipo_pago", array('id_tipo_pago' => self::$objValidations->clearPost($this->db->escape($this->input->post("id")))  ))->row_array();
	}

	public function edit()
	{
		$data = array(	'cantidad' 		=>	self::$objValidations->clearPost($this->db->escape($this->input->post("amount"))),
						'descripcion' 	=>  self::$objValidations->clearPost($this->db->escape($this->input->post("description"))));

		return $this->db->update("tipo_pago", $data, array('id_tipo_pago' => self::$objValidations->clearPost($this->db->escape($this->input->post("typeOfPayment"))) ));
	}

	public function delete()
	{
		return $this->db->delete("tipo_pago", array('id_tipo_pago' => self::$objValidations->clearPost($this->db->escape($this->input->post("typeOfPayment"))) ));
	}
}