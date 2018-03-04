<?php
/**
* 
*/
class Login extends CI_Controller
{	
	
	public function iniciasesion($usuario ='',$password='')
	{

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('loginname', 'Usuarios', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');
			$this->form_validation->set_message('required', 'El campo %s es requerido');
			//$this->form_validation->set_message('max_length', 'El campo %s no puede tener menos de %s caracteres');
			//$this->form_validation->set_message('min_length', 'El campo %s debe tener más de %s caracteres');

			$usuario 	= $this->input->post('loginname').'@utm.edu.ec';
			$password   = $this->input->post('password');

			if($this->form_validation->run() == FALSE ){
				$data = array(					
					"loginname"		=>		form_error("loginname"),
					"password"		=>		form_error("password"),
					"res"			=>		"error"
				);

			}else{
				$this->load->model('usuarios');
				$this->load->model('personas');

				$login = $this->usuarios->getLogin($usuario, $password);
				$datos = $this->personas->getDatosSesionPersonas($usuario);

				if ($login!=null || $datos!=null) {

					if( $login->msj=='Ok.'){
						$credenciales = $this->usuarios->getCredencialesPersonal($datos->idpersonal);
						if ($credenciales) {
							//print_r ($credenciales);
							if ($credenciales->idrol == '1') {
								$data = array(  
									"idusuario" => $datos->idpersonal,
									"cedula"	=> $datos->cedula, 
									"user" 		=> $usuario, 
									"nomuser" 	=> $datos->nombres,
									"apeuser" 	=> $datos->apellido1.' '.$datos->apellido2,
									"rol"		=> $credenciales->idrol,
									//"idfoto" 	=> $datos->idfichero_foto,
									"login"   	=> TRUE);
								$this->session->set_userdata($data);
								$data = array(
									"res"			=>		"success",
									"sess"			=>		TRUE,
									"redireccion"	=>		base_url("menu"),
									"mensaje" 		=>		"El usuario esta logueado"
								);	
							}else{
								$data = array(
									"res"			=>		"success",
									"sess"			=>		FALSE,
									"mensaje" 		=>		"No se pudo iniciar sesión debido a que sus credenciales no son las apropiadas para ingresar al Sistema."
								);	
							}
						}else{
							$data = array(
								"res"			=>		"success",
								"sess"			=>		FALSE,
								"mensaje" 		=>		"No se pudo iniciar sesión debido a que sus credenciales no son las apropiadas para ingresar al Sistema."
							);	
						}

					} else {

						if ($login->msj=='no') {
							$data = array(
							"res"			=>		"success",
							"sess"			=>		FALSE,						
							"mensaje" 		=>		"La contraseña es incorrecta porfavor vuleva a intentarlo");
						} else {
							$data = array(
							"res"			=>		"success",
							"sess"			=>		FALSE,
							"mensaje" 		=>		$login->msj);
						}										
					}
				}else{
					show_404();
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function logout()
	{
		if ($this->input->is_ajax_request()) {
			$this->session->sess_destroy();
			$this->remover_cache();
			$data = array('redireccion' => base_url());
			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function remover_cache(){
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
}