<?php
/**
*
*/
class localizacion extends CI_Model
{
	public function getLocalizacion()
	{
		$this->db->order_by('idlocalizacion','asc');
	  	$result=$this->db->get('incidencias.localizaciones');
	  	if($result->num_rows()>0)
  		{
	  		return $result->result();
		}else{
	  		return null;
  		}
	}
	///busqueda de localizacion de los equipos
public function get_equipolocal($q){
		return $this->db->query("SELECT *
		 FROM incidencias.localizaciones
		WHERE (nombrelocalizacion LIKE '%$q%') LIMIT 20 offset 0")->result();
	}
}
