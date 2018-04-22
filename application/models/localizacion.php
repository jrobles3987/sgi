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
}