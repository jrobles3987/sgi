<?php
/**
* 
*/
class Usuario extends CI_Controller
{
	public function BuscarPersonal($cedula='')
	{
		//if ($this->input->is_ajax_request()) {
			$cedula = $this->input->post('cedula');
			if ($cedula) {
				$this->load->model('usuarios');				
				$datos = $this->usuarios->getBuscarUsuarioSistema($cedula);
				if ($datos){
					echo json_encode($datos);	
				}else{
					echo 'null';
				}
			}else{
				show_404();
			}			
		//}
	}

	public function VerificaPersonal()
	{
		if ($this->input->is_ajax_request()) {
			$cedula = $this->input->post('cedula');
			if ($cedula) {
				$this->load->model('usuarios');
				$datos = $this->usuarios->getUsuariosSistemaVerifica($cedula);
				if ($datos){
					echo json_encode($datos);	
				}else{
					echo 'null';
				}
			}else{
				show_404();
			}			
		}
	}

	public function RegistrarUsuarios()
	{
		if ($this->input->is_ajax_request()) {
			$idpersonal = $this->input->post('idpersonal');
			$idrol 		= $this->input->post('idrol');
			if ($idpersonal && $idrol) {
				$this->load->model('usuarios');
				$datos = $this->usuarios->setUsuariosSistemas($idpersonal, $idrol);
				$data= array(
					"res" => $datos->f_ingreso_usuarios_personal
				);
				echo json_encode($data);
			}else{
				show_404();
			}			
		}
	}
}