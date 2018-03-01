<?php
/**
* 
*/
class incidencia extends CI_Model
{

	public function getlistarfuenteincidencia()
	{
  //$this->db-where('idincidenciafuente',$idfuenteincidencia);
  $this->db->order_by('nombre','asc');
  $result=$this->db->get('incidencias.v_fuente_incidencias');
  if($result->num_rows()>0)
  		{
	  return $result->result();
		}else{
	  return null;
  		}

	  }
	  
	  public function getlistarestado()
	  {
		$this->db->order_by('estado','asc');
		$result=$this->db->get('incidencias.v_incidencia_estado');
		if ($result->num_rows()>0)
		{ return $result->result();
		}else {
			return null;
		}
		}
		
		public function getlistarnecesidades()
	  {
			$this->db->order_by('idnecesidad','asc');
			$result=$this->db->get('incidencias.incidencias_necesidad');
			if ($result->num_rows()>0)
			{ 
				return $result->result();
			}else {
				return null;
			}
	  }

	  public function getlistarcategorias()
	  {
			$this->db->order_by('nombre','asc');
			$result=$this->db->get('incidencias.incidencias_categorias');
			if ($result->num_rows()>0)
			{ 
				return $result->result();
			}else {
				return null;
			}
	  }

public function setGuardarincidencia($data) // escribe bien.l.
	{//pasa los mismos nombres que en el controlador solo estan demas a la comilla urgencia impacto prioridad 
		$result = $this->db->query("SELECT
	    incidencias.f_ingreso_incidencias(
				'".$data['fechaapertura']."',
				'".$data['fechavencimiento']."',
				null,
				null,
				".$data['idincidenciaestado'].", 
				".$data['urgencia'].",  
				".$data['impacto'].",
				".$data['prioridad'].",
				".$data['idincidenciafuente'].",
				'".$data['tituloincidencia']."',
				'".$data['descripcion']."',
				".$this->session->userdata('idusuario').",
				".$data['tecnicoasignado'].",
				".$data['idlugarincidente'].",
				".$data['idcategorias']." 
											);");
		// $this->db->insert('incidencias.incidencias', $data);
	//'17/12/2017','17/12/2017','17/12/2017','17/12/2017',1,'NORMAL','NORMAL','NORMAL',1,'TITULO 1','DESCRIPCION 1','1','1'

		if($result->num_rows() > 0 ){		// cuando ya vengan bien validades de la vista, ninguno lleva comillas simples
			return $result->row();
		}else{
			return null;
		}
	}
	
	public function setActualizarIncidencia($data)
	{
		$result = $this->db->query("SELECT
	    incidencias.f_actualiza_incidencias(
				".$data['idincidencia'].",
				'".$data['fechavencimiento']."',
				null,
				null,
				".$data['idincidenciaestado'].", 
				".$data['urgencia'].",  
				".$data['impacto'].",
				".$data['prioridad'].",
				".$data['idincidenciafuente'].",
				'".$data['tituloincidencia']."',
				'".$data['descripcion']."',				
				".$data['tecnicoasignado'].",
				".$data['idlugarincidente'].",
				".$this->session->userdata('idusuario').",
				'".$data['tiemporesolucion']."'
		);");

		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}

	public function getlistartabla()
	{
		$this->db->order_by('fechaapertura','DESC');
	  	$result=$this->db->get('incidencias.v_listar_incidencias');
	  	if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
			return null;
	  	}
	}

	public function getmostrarincidencias($idincidencia)
	{
	  	$result = $this->db->query("SELECT incidencias.idincidencias,
			incidencias.fechaapertura,
			incidencias.fechavencimiento,
			incidencias.fechaaceptacion,
			incidencias.fechaaprovacion,
			incidencias.idincidenciaestado,
			incidencias.urgencia,
			incidencias.impacto,
			incidencias.prioridad,
			incidencias.idincidenciafuente,
			incidencias.usuarioaprobacion,
			incidencias.tituloincidencia,
			incidencias.descripcion,
			incidencias.idlugarincidente,
			incidencias.usuariocreador,
			incidencias.ultimamodificacion,
			incidencias.tecnicoasignado,
			incidencias.idincidenciaestado = incidencias_estados.idincidenciaestado
			FROM incidencias.incidencias,incidencias.incidencias_estados
			WHERE
			idincidencias = ".$idincidencia.";");
	  	if ($result->num_rows()>0)
	  	{ 
			return $result->row();
	  	}else {
		  	return null;
	  	}
	}

	public function getmostrarincidenciasnotificacion()
	{
	  	$result = $this->db->query("SELECT incidencias.tituloincidencia,
									incidencias_estados.estado,
									incidencias.idincidencias
									from incidencias.incidencias,
									incidencias.incidencias_estados
									where incidencias.idincidenciaestado = incidencias_estados.idincidenciaestado
								    and  estado <> 'CERRADO' ORDER BY fechaapertura DESC;
	
									");
	  	if ($result->num_rows()>0)
	  	{ 
			return $result->result();
	  	}else {
		  	return null;
	  	}
	}

}