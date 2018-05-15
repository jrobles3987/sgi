<?php
/**
* 
*/
class Tiposbienes extends CI_Model
{

	public function getListarTiposBienesEquipos()
	{
		$result = $this->db->get('incidencias.v_tiposbienes_equipos');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}
	}

	public function getListarTiposBienesSistemas()
	{
		$result = $this->db->get('incidencias.v_tiposbienes_sistemas');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}
	}

	public function getListarFamiliasBienesEquipos($idtipobien='')
	{
		$this->db->where('idtipobien', $idtipobien);
		$this->db->order_by('nombrefamiliabien','asc');
		$result = $this->db->get('incidencias.v_familiasbienes_equipos');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}
	}

	public function getListarFamiliasBienesSistemas($idtipobien='')
	{
		$this->db->where('idtipobien', $idtipobien);
		$this->db->order_by('nombrefamiliabien','asc');
		$result = $this->db->get('incidencias.v_familiasbienes_sistemas');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}
	}

	public function getListarSubFamiliasBienes($idfamiliabien='')
	{
		$this->db->where('idfamiliabien', $idfamiliabien);
		$this->db->order_by('nombresubfamiliabien','asc');
		$result = $this->db->get('comun.subfamiliasbienes');
		if($result->num_rows() > 0 ){			
			return $result->result();
		}else{
			return null;
		}
	}

	public function getVerificacionTiposEquipos($data)
	{
		$result = $this->db->query("SELECT * FROM incidencias.equipos_tipos WHERE 
									tipobien=".$data['tipobien']." and
									familiabien=".$data['familiabien']." and
									subfamiliabien=".$data['subfamiliabien'].";
									");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}
}