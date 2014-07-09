<?php

class servicemodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsRequest");

	}

	public function getServiceProvidedByCustomer($idCustomer)
	{
		return $this->db->query("SELECT * FROM servicios 
								
								INNER JOIN prestamos ON prestamos.id_prestamo  = servicios.id_prestamo
								INNER JOIN productos ON prestamos.id_productos = productos.id_producto 
								AND servicios.id_cliente = ".$idCustomer."  ")->result_array();
	}

	public function asignProductToCustomer($nameAdmin)
	{
		$customer = $this->db->get_where("peticiones", array('hash_peticion' => $this->input->post('hash')))->row_array();

		$data = array('status' => "ok");

		$updated = $this->db->update('peticiones', $data, array('hash_peticion' => $this->input->post('hash') ));

		$dataPrestamos = array('id_productos' 					=> $this->input->post('productID'),
					  			'mac_address_prestamo'			=> $this->input->post('productMACAddress'),
					  			'numero_serie_prestamo'			=> $this->input->post('serieProduct'),
					  			'descripcion_cantidad_prestamo'	=> $this->input->post('descriptionProduct')
					  		  );

		$this->db->insert("prestamos", $dataPrestamos);
		$idPrestamo =  $this->db->insert_id();

		$dataService = array('id_cliente' 					=> $customer['id_cliente'],
							 'id_prestamo'					=> (int)$idPrestamo,
							 'fecha_expedicion_servicio'	=> date("Y-m-d"),
							 'fecha_instalacion_servicio'	=> date("Y-m-d"),
							 'status_servicio'				=> $nameAdmin);

		$this->db->insert("servicios", $dataService);

		return $this->db->insert_id();

	}

	public function getAssincDataFromProductAdded()
	{
		return $this->db->query("	SELECT * FROM servicios
									INNER JOIN prestamos ON prestamos.id_prestamo = servicios.id_prestamo
									INNER JOIN productos ON productos.id_producto = prestamos.id_productos 
									WHERE servicios.id_servicio = ".(int)$this->input->post('serviceID')." ")->row_array();
	}

	public function deleteFromId()
	{
		$servicio = $this->db->get_where("servicios", array('id_servicio' => $this->input->post('serviceID')))->row_array();
		$prestamoID = $servicio['id_prestamo'];

		$deletedService = $this->db->delete("servicios", array('id_servicio' => $this->input->post('serviceID')));

		if ($deletedService) {
			
			return $this->db->delete("servicios", array('id_prestamo' => $prestamoID ));
		}
	}

	public function getServicesInstalled()
	{
		return $this->db->query("	SELECT * FROM servicios 
									INNER JOIN prestamos ON prestamos.id_prestamo = servicios.id_prestamo 
									INNER JOIN productos ON productos.id_producto = prestamos.id_productos
									INNER JOIN cliente   ON cliente.id_cliente    = servicios.id_cliente
									WHERE  servicios.fecha_instalacion_servicio != '0000-00-00' 
									ORDER BY cliente.nombre_cliente ASC 
								")->result_array();
	}
}

?>