<?php

class Marcas extends CI_Model
{
	public function getListarMarcas()
	{
		//$this->db->order_by('idmarca','asc');	
		$this->db->order_by('nombremarca','asc');
		$result = $this->db->get('incidencias.equipos_marcas');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}		
	}

	public function getListarModelos($idmarca='')
	{	
		$this->db->where('idmarca', $idmarca);
		$this->db->order_by('nombremodelo','asc');
		$result = $this->db->get('incidencias.equipos_modelos');
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function setGuardarMarcas($NombreMarca='')
	{
		$result = $this->db->query("SELECT incidencias.f_ingreso_equipos_marcas('".$NombreMarca."');");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}

	public function setGuardarModelos($IdMarca = '', $NombreModelo = '')
	{
		$result = $this->db->query("SELECT incidencias.f_ingreso_equipos_modelos('".$NombreModelo."','".$IdMarca."');");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}
}