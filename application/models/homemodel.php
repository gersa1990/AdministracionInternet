<?php

class homemodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library("form_validation");
		$this->load->library("validationsRequest");
		$this->load->library("encrypter");
	}

	public function getNextDatePayDay()
	{
		$objValidations = new validationsrequest();
		$encrypter		= new encrypter();

		$limit 			= $objValidations->getDaysOfmonth();

		$limitDateStart = $objValidations->betweenDates(date("Y-m-d"),15,0); 
		$limitDateEnd  	= $objValidations->betweenDates(date("Y-m-d"),15); 

		$startDate 	= $limit["startDate"];
		$endDate  	= $limit["endDate"];

		$payedServices 	= array();
		$cleaned 		= array();
		$mes    		= (int)date("m");

		$payed    		= $this->db->query("	SELECT * FROM pagos 
												INNER JOIN cliente 		ON cliente.id_cliente 		= pagos.id_cliente
												INNER JOIN servicios    ON servicios.id_cliente 	= pagos.id_cliente
												WHERE (pagos.fecha_pago BETWEEN '".date('Y')."-".(date("m")-1)."-".date("d")."' AND '".date('Y')."-".(date("m")+1)."-".date("d")."') GROUP BY pagos.id_cliente  ")->result_array(); 

		$proximos	 	= $this->db->query("	SELECT * FROM servicios
												INNER JOIN cliente 		ON cliente.id_cliente 		= servicios.id_cliente
												WHERE servicios.fecha_instalacion_servicio != '000-00-00' 
												AND   (servicios.fecha_instalacion_servicio BETWEEN '".date("Y-m-d", strtotime(date("Y-m-d")." -1 month"))."' AND '".date("Y-m-d", strtotime(date("Y-m-d")." +1 month"))."') ")->result_array();


		$payeds = array();

		foreach ($payed as $key => $pays) {
			
				$payedDay = explode("-",$pays['concepto']);
				$mounthPayedDay = (int)$payedDay[0];
			
			if (($mounthPayedDay == $mes) || ($mounthPayedDay == $mes +1) || ($mounthPayedDay == $mes -1)){

				$pays['fecha_instalacion_servicio'] 	= $objValidations->convertIntoHumanDate($pays['fecha_instalacion_servicio']);
				$pays['id_cliente_parsed'] 					= $encrypter->encrypt($pays['id_cliente']);
				$payeds[$pays['id_cliente']] = $pays;
			}
		}

		foreach ($proximos as $key => $proxim){
			
			if (!array_key_exists($proxim['id_cliente'], $cleaned)) {			

				if (!array_key_exists($proxim['id_cliente'], $payeds)) //Verificar si ya pago el cliente
				{	
					$proxim['fecha_instalacion_servicio'] 	= $objValidations->convertIntoHumanDate($proxim['fecha_instalacion_servicio']);
					$proxim['id_cliente_parsed'] 					= $encrypter->encrypt($proxim['id_cliente']);
					$cleaned[$proxim['id_cliente']] = $proxim;
				}
			}
		}

		$payedServices['proximos']  = $cleaned;

		$cleaned = array();

		$pastDueDate = $this->db->query("	SELECT * FROM servicios 
											INNER JOIN cliente 		ON cliente.id_cliente 		= servicios.id_cliente
											WHERE servicios.fecha_instalacion_servicio != '000-00-00' 
											AND   servicios.fecha_instalacion_servicio < '".date("Y-m-d", strtotime(date("Y-m-d")." -1 month"))."'  ")->result_array();

		foreach ($pastDueDate as $key => $pastDateOfPay) {

			if (!array_key_exists($pastDateOfPay['id_cliente'], $payeds))
			{ //Verificar si ya pago el cliente

				$customerID = $pastDateOfPay['id_cliente'];

				$facture = explode("-", $pastDateOfPay['fecha_instalacion_servicio']);

				$pastDateOfPay['fecha_facturacion_servicio'] 	= $objValidations->getFacturationMonth($facture[2]."-".$facture[1]);
				$pastDateOfPay['fecha_instalacion_servicio'] 	= $objValidations->convertIntoHumanDate($pastDateOfPay['fecha_instalacion_servicio']);
				$pastDateOfPay['id_cliente_parsed'] 			= $encrypter->encrypt($pastDateOfPay['id_cliente']);
				
				$cleaned[$customerID] = $pastDateOfPay;
			}
		}

		$payedServices['delayed']  = $cleaned;
		$payedServices['payed']    = $payeds;
		

		return $payedServices;
	}
}
?>