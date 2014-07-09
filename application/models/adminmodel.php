<?php

class adminmodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsRequest");

	}

	public function getAll()
	{
		return $this->db->query("SELECT * FROM administradores 
								 INNER JOIN tipo_administrador ON tipo_administrador.id_tipo_admin = administradores.tipo_administrador 
								 WHERE tipo_administrador != 1
								 ")->result_array();
	}

	public function getAdmin($adminID)
	{
		return $this->db->get_where("administradores", array('id_administrador' => $adminID ))->row_array();
	}

	public function getTypesAdmin()
	{
		return $this->db->query("SELECT * FROM tipo_administrador WHERE id_tipo_admin != 1 ")->result_array();
	}	

	public function editToBD()
	{
		$data = array(
						'nombre_administrador' 		=> $this->input->post('name'),
						'apellidos_administrador'	=> $this->input->post('lastName'),
						'usuario_administrador'		=> $this->input->post('user'),
						'contrasena_administrador'	=> $this->input->post('pass'),
						'tipo_administrador'		=> $this->input->post('type')
					);

		return $this->db->update("administradores", $data, array('id_administrador' => $this->input->post('id')));
	}

	public function getAsincAdminEdited()
	{
		return $this->db->query("	SELECT * FROM administradores 
									INNER JOIN tipo_administrador ON tipo_administrador.id_tipo_admin = administradores.tipo_administrador
									WHERE id_administrador = ".$this->input->post('id')." " )->row_array();
	}

	public function deleteToBD()
	{
		return $this->db->delete("administradores", array('id_administrador' => $this->input->post('id') ));
	}

	public function addToBD()
	{
		$data = array(
						'nombre_administrador' 		=> $this->input->post('name'),
						'apellidos_administrador'	=> $this->input->post('lastName'),
						'usuario_administrador'		=> $this->input->post('user'),
						'contrasena_administrador'	=> $this->input->post('pass'),
						'tipo_administrador'		=> $this->input->post('type')
					);

		$this->db->insert("administradores", $data);
		return $this->db->insert_id();
	}

	public function getAdminAdded($adminID)
	{
				return $this->db->query("	SELECT * FROM administradores 
									INNER JOIN tipo_administrador ON tipo_administrador.id_tipo_admin = administradores.tipo_administrador
									WHERE administradores.id_administrador = ".$adminID." ")->row_array();
	}
}

?>