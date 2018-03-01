<?php
/**
* 
*/
class Bienes extends CI_Controller
{
	public function listado(){
		
	}
	
	public function listarfamiliasbienesequipos()
	{
		$idtipobien = $this->input->post('idTipoBien');

		if ($idtipobien) {
			$this->load->model('tiposbienes');
			$familiasbienes = $this->tiposbienes->getListarFamiliasBienesEquipos($idtipobien);
			echo '<option value="0">Seleccione la Familia del Equipo...</option>';
			foreach ($familiasbienes as $fila) {
				echo '<option value="'.$fila->idfamiliabien.'">'.$fila->nombrefamiliabien.'</option>';
			}
		}else{
			echo '<option value="0">Seleccione la Familia del Equipo...</option>';
		}
	}

	public function listarfamiliasbienessistemas()
	{
		$idtipobien = $this->input->post('idTipoBien');

		if ($idtipobien) {
			$this->load->model('tiposbienes');
			$familiasbienes = $this->tiposbienes->getListarFamiliasBienesSistemas($idtipobien);
			echo '<option value="0">Seleccione la Familia del Sistema...</option>';
			foreach ($familiasbienes as $fila) {
				echo '<option value="'.$fila->idfamiliabien.'">'.$fila->nombrefamiliabien.'</option>';
			}
		}else{
			echo '<option value="0">Seleccione la Familia del Sistema...</option>';
		}
	}

	public function listarsubfamiliasbienes()
	{
		$idfamiliabien = $this->input->post('idFamiliaBien');

		if ($idfamiliabien) {
			$this->load->model('tiposbienes');
			$subfamiliasbienes = $this->tiposbienes->getListarSubFamiliasBienes($idfamiliabien);
			echo '<option value="0">Seleccione la SubFamilia del Equipo...</option>';
			foreach ($subfamiliasbienes as $fila) {
				echo '<option value="'.$fila->idsubfamiliabien.'">'.$fila->nombresubfamiliabien.'</option>';
			}
		}else{
			echo '<option value="0">Seleccione la SubFamilia del Equipo...</option>';
		}
	}
}