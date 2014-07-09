<?php

class requestmodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("session");
	}

	public function addToBD( $idCustomer , $loggeidIn =  null)
	{

		if ($loggeidIn != null) {
			$admin = $this->session->all_userdata();

			$userRequest =  $admin['nombre_administrador']." ".$admin['apellidos_administrador']."";
		}
		else{

			$userRequest =  "Cliente";
		}

		$validations = new validationsRequest();

		$request = array( 'id_cliente'								=> $idCustomer,
						  'fecha_solicitada_peticion' 				=> $validations->clearPost($this->db->escape($this->input->post("dayForVisit")))."",
						  'fecha_realizada_peticion'				=> date("Y-m-d"),
						  'status'									=> "Pendiente",
						  'usuario_peticion'						=> $userRequest,
						  'hash_peticion' 							=> strtoupper(uniqid()),
						  'hora_deseada_visita'						=> $validations->clearPost($this->db->escape($this->input->post('timeForVisit')))
						  );

	
		$this->db->insert('peticiones', $request); 
		$id =  $this->db->insert_id();

		$added = $this->db->get_where("peticiones", array('id_peticion' => $id))->row_array();

		return $added['hash_peticion'];
	}

	public function getRequestByHash($hash)
	{
		return $this->db->get_where("peticiones", array('hash_peticion' => $hash))->row_array();
	}
}

?>