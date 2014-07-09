<?php

class customermodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsrequest");

	}

	public function addToBD()
	{

		$validations = new validationsrequest();

		$customer = array('nombre_cliente' 				=> $validations->clearPost($this->db->escape($this->input->post("name"))),
						  'apellido_paterno_cliente' 	=> $validations->clearPost($this->db->escape($this->input->post("paternaLastName"))),
						  'apellido_materno_cliente'	=> $validations->clearPost($this->db->escape($this->input->post("maternLastName"))),
						  'telefono_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("cellPhone"))),
						  'correo_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("email"))),
						  'calle_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("street_address"))),
						  'colonia_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("neighborhood"))),
						  'codigo_postal_cliente'		=> $validations->clearPost($this->db->escape($this->input->post("postal_code"))),
						  'ciudad_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("administrative_area_level_1"))),
						  'municipio_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("sublocality"))),
						  'referencias_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("references")))
						  );
	

		$this->db->insert('cliente', $customer); 
		return $this->db->insert_id();
	}

	public function getCustomer($idCustomer)
	{
		return $this->db->get_where("cliente", array('id_cliente' => (int)$idCustomer ))->row_array();
	}

	public function getWaitongForServices()
	{
		return $this->db->query("SELECT * FROM peticiones INNER JOIN cliente WHERE cliente.id_cliente = peticiones.id_cliente AND peticiones.status != 'ok' ")->result_array();
	}

	public function editToBD($admin)
	{

		$customer = $this->db->query("SELECT id_cliente FROM peticiones WHERE hash_peticion = '".$this->input->post('hash')."' ")->row_array();

		$cliente = $customer['id_cliente'];

		$validations = new validationsRequest();

		$customer = array('nombre_cliente' 				=> $validations->clearPost($this->db->escape($this->input->post("name"))),
						  'apellido_paterno_cliente' 	=> $validations->clearPost($this->db->escape($this->input->post("paternaLastName"))),
						  'apellido_materno_cliente'	=> $validations->clearPost($this->db->escape($this->input->post("maternLastName"))),
						  'telefono_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("cellPhone"))),
						  'correo_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("email"))),
						  'calle_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("street_address"))),
						  'colonia_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("neighborhood"))),
						  'codigo_postal_cliente'		=> $validations->clearPost($this->db->escape($this->input->post("postal_code"))),
						  'ciudad_cliente'				=> $validations->clearPost($this->db->escape($this->input->post("administrative_area_level_1"))),
						  'municipio_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("sublocality"))),
						  'referencias_cliente'			=> $validations->clearPost($this->db->escape($this->input->post("references")))
						  );

		$request = array(
							'fecha_realizada_peticion'	=> date("Y-m-d") ,
							'fecha_solicitada_peticion' => $validations->clearPost($this->db->escape($this->input->post("dayForVisit"))),
							'hora_deseada_visita'		=> $validations->clearPost($this->db->escape($this->input->post("timeForVisit"))),
							'usuario_peticion'			=> $admin['nombre_administrador']." ".$admin['apellidos_administrador'],
						 );

		$customerEdited = $this->db->update("cliente",$customer,  array('id_cliente' => $cliente ));

		if ($customerEdited) {
			
			return $this->db->update("peticiones", $request, array('hash_peticion' => $validations->clearPost($this->db->escape($this->input->post("hash"))) ));
		}
	}

	private function getPaymentType()
	{

	}

	private function getPaymentsForCustomerID($customerID)
	{
		return $this->db->query("	SELECT * FROM pagos  
										WHERE pagos.id_cliente = ".$customerID." ")->result_array(); 
	}

	public function getHistoryForCustomer($customerID)
	{
		$validations = new validationsRequest();

		$customer = $this->db->query("SELECT * FROM cliente WHERE cliente.id_cliente = ".$customerID." ")->row_array();

		$products = $this->db->query("	SELECT * FROM servicios 
										INNER JOIN prestamos 	ON prestamos.id_prestamo  = servicios.id_prestamo
										INNER JOIN productos 	ON productos.id_producto  = prestamos.id_productos  
										INNER JOIN tipo_pago 	ON tipo_pago.id_tipo_pago = servicios.id_tipo_pago
										WHERE servicios.id_cliente = ".$customerID." ")->result_array();
		
		$data['payments'] = $this->getPaymentsForCustomerID($customerID);
		$data['customer'] = $customer;
		$data['products'] = $products;

		return $data;
	}
}

?>