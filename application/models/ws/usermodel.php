<?php

class usermodel extends CI_Model
{
	public static $objValidations;

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsRequest");
		self::$objValidations = new validationsrequest();
	}

	public function searchAdmin()
	{
		$data = array(	'usuario_administrador' 	=> self::$objValidations->clearPost($this->db->escape($this->input->get("userAdmin"))),
						'contrasena_administrador'	=> self::$objValidations->clearPost($this->db->escape($this->input->get("passAdmin"))) );

		return $this->db->get_where("administradores", $data)->row_array();
	}
}