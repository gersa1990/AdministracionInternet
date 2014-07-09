<?php

class sessionmodel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}

	public function get_admins($admin = FALSE)
	{
	
		if ($admin === FALSE)
		{
			$query = $this->db->get('administradores');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('administradores', array('admin' => $name));

		return $query->row_array();
	}

	public function verifySession()
	{
		$data = array(
			'usuario_administrador' 	=> $this->input->post('user'),
			'contrasena_administrador' 	=> $this->input->post('password')
		);

		return $this->db->get_where('administradores', array(
															'usuario_administrador' 	=> $this->input->post('user'),
															'contrasena_administrador' 	=> $this->input->post('password')
															)
									)->row_array();
	}


	public function insertIntoSessionTable($data)
	{
		$dataWhere 	= array('usuario_session' 				=> $data['id_administrador']);	

		$dataSQLInsert 	= array('nombre_usuario_session' 	=> $data['nombre_administrador'],
							'apellidos_usuario_session' 	=> $data['apellidos_administrador'],
							'usuario_session'				=> $data['id_administrador'],
							'fecha'							=> date("Y-m-d"),
							'hora'							=> date("H:m:s"),
							'sid'							=> $data['session_id']);

		$dataSQLUpdate 	= array('nombre_usuario_session' 	=> $data['nombre_administrador'],
							'apellidos_usuario_session' 	=> $data['apellidos_administrador'],
							'fecha'							=> date("Y-m-d"),
							'hora'							=> date("H:m:s"),
							'sid'							=> $data['session_id']);

		

		$exist =  $this->db->get_where("sessiones", $dataWhere)->row_array();


		if ($exist) {
			$correct = $this->db->update("sessiones",$dataSQLUpdate, array('usuario_session' => $data['id_administrador'] ));
		}
		else{
			$correct = $this->db->insert("sessiones",$dataSQLInsert);
		}

		return $correct;
	}

	public function getAdminWhereSessionId($sid)
	{
		return $this->db->get_where("sessiones", array('sid' => $sid ))->row_array();
	}
}

?>