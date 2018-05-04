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
///////////////
public function ReDibujarTablaMarca()
{
	if ($this->session->userdata('login')==TRUE) {
		$this->load->model('marcas');
		$marcae = $this->marcas->getListarMarcas($this->session->userdata('idusuario'));
		echo '<TABLE id="tablamarca" class="table table-striped table-bordered table-hover">';
		echo '<THEAD>';
		echo '<TR><TH>N°</TH><TH>Nombre</TH><TH>Estado</TH><TH width="15">Acciones</TH></TR>';
		echo '</THEAD>';
		echo '<TBODY>';
		$num=0;
		if($marcae){
			foreach ($marcae as $fila) {
					$num++;
					echo '<TR><TD>'.$num.'</TD><TD>'.$fila->nombremarca.'</TD><TD>'.$fila->estado.'</TD><td width="15"><a title= "Modificar"  class= "btn btn-xs btn-info modificar" id="'.$fila->idmarca.'"><i class="fa fa-refresh"></i></a>   <a title= "Eliminar" class= "btn btn-xs btn-info eliminar" id="'.$fila->idmarca.'" ><i class="fa fa-trash-o"></i></a></td></TR>';
			}
		}
		echo '</TBODY>';
		echo '</TABLE>';
	}else{
		show_404();
	}
}
/////
public function mostrarmarcas()
{
	if ($this->session->userdata('login')==TRUE) {
		$idmarca = $this->input->post('idmarca');
		$this->load->model('marcas');
		$marcas = $this->marcas->getmostrarmarcas($idmarca);
		echo json_encode($marcas);
	}else{
		show_404();
	}
}

public function ActualizarIncidencias()
{
	if ($this->input->is_ajax_request()) {
		$data = array(
			'idmarca'		=> $this->input->post('idmarca'),
			'idmarca'		=> $this->input->post('idmarca'),

			//'usuariocreador'	=> $this->input->post('usuariocreador')
		);

		if ($data) {
			$this->load->model('marcas');
			$modelos = $this->marca->getactualizamarcas($data);
		echo json_encode($data);
	}else{
		show_404();
	}
}


}//fin controlador
//////
