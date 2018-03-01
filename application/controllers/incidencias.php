<?php
/**
* 
*/
class Incidencias extends CI_Controller
{
	public function Incidentesnuevos()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data = array('contenido' => 'incidenciasincidentesnuevos');
			$this->load->view('menuincidentesnuevos.php',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function Guardarincidencias()
	{	
		if ($this->input->is_ajax_request()) {
			$data = array(
				'fechaapertura'		=> $this->input->post('fechaapertura'),
				'fechavencimiento'	=> $this->input->post('fechavencimiento'),
				//'fechaaceptacion'	=> $this->input->post('fechaaceptacion'), ???
				//'fechaaprovacion'	=> $this->input->post('fechaaprovacion'),
				'idincidenciaestado'=> $this->input->post('incidenciaestado'),
				'urgencia'			=> $this->input->post('urgencia'),		
				'impacto'			=> $this->input->post('impacto'),
				'prioridad' 		=> $this->input->post('prioridad'),
				'idincidenciafuente'=> $this->input->post('idincidenciafuente'),
				//'usuarioaprobacion'	=> $this->input->post('usuarioaprobacion'), ????
				'tituloincidencia'	=> $this->input->post('tituloincidencia'),
				'descripcion'		=> $this->input->post('descripcion'),
				'tecnicoasignado'   => $this->input->post('tecnicoasignado'),
				'idlugarincidente'	=> $this->input->post('idlocalizacion'),
				'idcategorias'		=> $this->input->post('idcategorias')
				//'idincidenciaaprovacion'		=> $this->input->post('idincidenciaaprovacion'),
				//'tipoincidencia'	=> $this->input->post('tipoincidencia'),
				//'usuariocreador'	=> $this->input->post('usuariocreador')
			);

			if ($data) {
				$this->load->model('incidencia');
				$modelos = $this->incidencia->setGuardarincidencia($data);

				$data= array(
					"res" => $modelos->f_ingreso_incidencias
				);	

				//echo json_encode($data);
			}else{
				//show_404();
			}	
			echo json_encode($data);
		}else{
			//show_404();
		}
	}

	public function ActualizarIncidencias()
	{	
		if ($this->input->is_ajax_request()) {
			$data = array(
				'idincidencia'		=> $this->input->post('idincidencia'),
				'fechavencimiento'	=> $this->input->post('fechavencimiento'),
				//'fechaaceptacion'	=> $this->input->post('fechaaceptacion'),
				//'fechaaprovacion'	=> $this->input->post('fechaaprovacion'),
				'idincidenciaestado'=> $this->input->post('incidenciaestado'),
				'urgencia'			=> $this->input->post('urgencia'),		
				'impacto'			=> $this->input->post('impacto'),
				'prioridad' 		=> $this->input->post('prioridad'),
				'idincidenciafuente'=> $this->input->post('idincidenciafuente'),
				//'usuarioaprobacion'	=> $this->input->post('usuarioaprobacion'),
				'tituloincidencia'	=> $this->input->post('tituloincidencia'),
				'descripcion'		=> $this->input->post('descripcion'),
				'tecnicoasignado'   => $this->input->post('tecnicoasignado'),
				'idlugarincidente'	=> $this->input->post('idlocalizacion'),
				'tiemporesolucion'  => $this->input->post('tiemporesolucion')
				//'idincidenciaaprovacion'		=> $this->input->post('idincidenciaaprovacion'),
				//'tipoincidencia'	=> $this->input->post('tipoincidencia'),
				//'usuariocreador'	=> $this->input->post('usuariocreador')
			);

			if ($data) {
				$this->load->model('incidencia');
				$modelos = $this->incidencia->setActualizarIncidencia($data);

				$data= array(
					"res" => $modelos->f_actualiza_incidencias
				);	

				//echo json_encode($data);
			}else{
				//show_404();
			}	
			echo json_encode($data);
		}else{
			//show_404();
		}
	}

	public function Mostrarincidentes()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idincidencia = $this->input->post('idincidencia');
			$this->load->model('incidencia');
			$equipos = $this->incidencia->getmostrarincidencias($idincidencia);					
			echo json_encode($equipos);
		}else{
			show_404();
		}
	}

	public function Mostrarincidentesnotificaciones()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idincidencia = $this->input->post('idincidencia');
			$this->load->model('incidencia');
			$incidencias = $this->incidencia->getmostrarincidenciasnotificacion();					
			echo json_encode($incidencias);
		}else{
			show_404();
		}
	}

}