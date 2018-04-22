<?php
/**
* 
*/
class Marcasequipos extends CI_Controller
{
	public function ListarEquiposMarcas()
	{					
		$this->load->model('marcas');
		$marcas = $this->marcas->getListarMarcas($idmarca);
		echo '<option value="0">Seleccione la Marca del Equipo...</option>';
		foreach ($marcas as $fila) {
			echo '<option value="'.$fila->idmarca.'">'.$fila->nombremarca.'</option>';
		}		
	}

	public function ListarEquiposModelos()
	{			
		$idmarca = $this->input->post('idMarcaseleccionada');

		if ($idmarca) {
			$this->load->model('marcas');
			$modelos = $this->marcas->getListarModelos($idmarca);
			echo '<option value="0">Seleccione el Modelo del Equipo...</option>';
			foreach ($modelos as $fila) {
				echo '<option value="'.$fila->idmodelo.'">'.$fila->nombremodelo.'</option>';
			}
		}else{
			echo '<option value="0">Seleccione el Modelo del Equipo...</option>';
		}	
	}

	public function GuardarEquiposMarcas()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('NombreMarca', 'Nombre de la Marca', 'trim|required|xss_clean');
			$this->form_validation->set_message('required', 'El campo %s es requerido');

			if($this->form_validation->run() == FALSE ){
				$data = array(
					"res"	=>	"error"
				);

			}else{
				$nombremarca = $this->input->post('NombreMarca');
				if ($nombremarca) {
					$this->load->model('marcas');
					$marcas = $this->marcas->setGuardarMarcas($nombremarca);
					$data= array(
						"res" => $marcas->f_ingreso_equipos_marcas
					);
				}else{
					show_404();
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function GuardarEquiposModelos()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('NombreModelo', 'Nombre del Modelo', 'trim|required|xss_clean');
			$this->form_validation->set_message('required', 'El campo %s es requerido');

			if($this->form_validation->run() == FALSE ){
				$data = array(
					"res"	=>	"error"
				);

			}else{
				$idmarca = $this->input->post('IdMarca');
				$nombremodelo = $this->input->post('NombreModelo');
				if ($nombremodelo && $idmarca) {
					$this->load->model('marcas');
					$modelos = $this->marcas->setGuardarModelos($idmarca, $nombremodelo);
					$data= array(
						"res" => $modelos->f_ingreso_equipos_modelos
					);
				}else{
					show_404();
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}
}