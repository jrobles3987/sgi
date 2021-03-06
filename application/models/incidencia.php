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

  	public function getlistarplanificaiones()
	{
	  	$result=$this->db->get('incidencias.v_listar_planificaciones');
	  	if($result->num_rows()>0)
  		{
	  		return $result->result();
		}else{
	  		return null;
  		}
	}

	public function setGuardarincidencia($data) // escribe bien.l.
	{//pasa los mismos nombres que en el controlador solo estan demas a la comilla urgencia impacto prioridad
		$result = $this->db->query("SELECT incidencias.f_ingreso_incidencias(
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

		if($result->num_rows() > 0 ){// cuando ya vengan bien validades de la vista, ninguno lleva comillas simples
			return $result->row();
		}else{
			return null;
		}
	}


	public function setguardarplanificacion (){
		$result = $this->db->query("SELECT incidencias.f_ingreso_planificacion(
	                              '".$data['titulo']."',
	                              '".$data['fecha_apertura_programado']."',
	                              '".$data['fecha_finalizacion_programado']."',
	                              '".$data['descripcion_planificacion']."',
	                              '".$data['idlocalizacion']."',
	                              '".$data['informe_planificacion']."',
	                              '".$data['fecha_apertura_real']."',
	                              '".$data['fecha_finalizacion_real']."');");
		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return null;
		}

	}

	public function setActualizarIncidenciaNormal($data)
	{
		$result = $this->db->query("UPDATE
	    incidencias.incidencias set
				urgencia =".$data['urgencia'].",
				tituloincidencia ='".$data['tituloincidencia']."',
				descripcion ='".$data['descripcion']."',
				idlugarincidente =".$data['idlugarincidente'].",
				ultimamodificacion = CURRENT_TIMESTAMP,
				idcategoria = ".$data['idcategoria']."
				WHERE idincidencias = ".$data['idincidencia'].";");

		return $result;		
	}

	public function setActualizarIncidencia($data)
	{
		$result = $this->db->query("SELECT
	    incidencias.f_actualiza_incidencias(
				".$data['idincidencia'].",
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

	public function GetListarTabla()
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

	public function GetListarTablaAdministrador()
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

	public function GetListarTablaTecnico($idpersonal)
	{
		$this->db->order_by('fechaapertura','DESC');
		$this->db->where('tecnico',$idpersonal);
	  	$result=$this->db->get('incidencias.v_listar_incidencias');
	  	if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
			return null;
	  	}
	}

	public function GetListarTablaNormal($idpersonal)
	{
		$this->db->order_by('fechaapertura','DESC');
		$this->db->where('creador',$idpersonal);
	  	$result=$this->db->get('incidencias.v_listar_incidencias');
	  	if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
			return null;
	  	}
	}

	public function GetListarTablaSupervisor()
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

	public function getListartablaUsuarioNormal($usuario_creador = '')
	{
		//$this->db-where('creador', $usuario_creador);
		//$this->db->order_by('fechaapertura','DESC');
	  	$result=$this->db->query('SELECT * FROM incidencias.v_listar_incidencias WHERE creador = '.$usuario_creador.' and calificacionusuario is null ORDER BY fechaapertura DESC');
	  	if ($result->num_rows()>0){
			return $result->result();
	  	}else{
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
			incidencias.idcategoria
			FROM incidencias.incidencias,incidencias.incidencias_estados
			WHERE idincidencias = ".$idincidencia.";");
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
							    and (estado = 'NUEVO' or estado = 'EN CURSO (ASIGNADO)' or estado = 'EN CURSO (PLANIFICACIÓN)' or estado = 'EN ESPERA (OBSERVACIÓN)') ORDER BY fechahoracreacion DESC;
		");

	  	if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
		  	return null;
	  	}
	}

	public function getHistorialTecnico($idpersonal = '')
	{

		$result = $this->db->query("SELECT count(incidencias.idincidencias) as incidencias_activas
									FROM incidencias.incidencias,incidencias.incidencias_estados
									WHERE incidencias.idincidenciaestado = incidencias_estados.idincidenciaestado and incidencias_estados.estado <> 'CERRADO' and incidencias_estados.estado <> 'RESUELTO' and incidencias.tecnicoasignado = ".$idpersonal.";
									");
		if ($result->num_rows()>0)
	  	{
			return $result->row();
	  	}else {
		  	return null;
	  	}
	}

	public function getPromediosCalificacionTecnico($idpersonal = '')
	{

		$result = $this->db->query("SELECT ROUND(avg(incidencias.calificacionusuario),0) as calificacionusuario, ROUND(avg(incidencias.calificacionadministrativa),0) as calificacionadministrativa
									FROM incidencias.incidencias,incidencias.incidencias_estados
									WHERE incidencias.idincidenciaestado = incidencias_estados.idincidenciaestado and (incidencias_estados.estado = 'CERRADO' or incidencias_estados.estado = 'RESUELTO') and incidencias.tecnicoasignado = ".$idpersonal.";
									");
		if ($result->num_rows()>0)
	  	{
			return $result->row();
	  	}else {
		  	return null;
	  	}
	}

	public function getEstadisticasIncidenciasEstados($idusuariocreador = '')
	{

		$result = $this->db->query("SELECT incidencias_estados.estado,count(incidencias.idincidencias) as conteo
									FROM incidencias.incidencias,incidencias.incidencias_estados
									WHERE incidencias.idincidenciaestado = incidencias_estados.idincidenciaestado and incidencias.usuariocreador = ".$idusuariocreador."
									GROUP BY incidencias.idincidenciaestado,incidencias_estados.estado
									ORDER BY incidencias_estados.estado;
									");
		if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
		  	return null;
	  	}
	}

	public function getEstadisticasIncidenciasUrgencia($idusuariocreador = '')
	{

		$result = $this->db->query("SELECT incidencias_necesidad.nombre,count(incidencias.idincidencias) as conteo
									FROM incidencias.incidencias,incidencias.incidencias_necesidad
									WHERE incidencias.urgencia = incidencias_necesidad.idnecesidad and incidencias.usuariocreador = ".$idusuariocreador."
									GROUP BY incidencias.urgencia,incidencias_necesidad.nombre
									ORDER BY incidencias.urgencia;
									");
		if ($result->num_rows()>0)
	  	{
			return $result->result();
	  	}else {
		  	return null;
	  	}
	}

	public function setAsignarCalificacionesIncidencias($idincidencia='',$calificacion='',$detallecalificacion='',$tipo='')
	{

		$result = $this->db->query("SELECT incidencias.f_ingreso_incidencias_calificaciones(
									".$idincidencia.",
									".$calificacion.",
									'".$detallecalificacion."',
									".$tipo.");");
		if ($result->num_rows()>0)
	  	{
			return $result->row();
	  	}else {
		  	return null;
	  	}
	}


		public function getlistarpersonal()
  	{
		$this->db->order_by('nombres','DESC');
		$result = $this->db->query("SELECT idpersonal, nombres FROM incidencias.v_listar_usuariospersonal where rol like '%TÉCNICO%';");
		if ($result->num_rows()>0)
	  	{
			return $result->row();
	  	}else {
		  	return null;
	  	}
  	}

  	public function getlistarmarcas()
  	{
  		$this->db->order_by('nombremarca','DESC');
   		$result= $this->db->query("SELECT idmarca,nombremarca,estado from incidencias.v_listar_marca_equipo;");
   		if ($result->num_rows()>0) {
   			return $result->row();
   		}else{
   			return null;
   		}

  	}
 	public function getlistarmodelos()
  	{
  		$this->db->order_by('nombremodelo','DESC');
   		$result= $this->db->query("SELECT idmodelo, nombremodelo, estado from incidencias.v_listar_modelo_equipo;");
   		if ($result->num_rows()>0) {
   			return $result->row();
   		}else{
   			return null;
   		}

  	}
		/////////////estados incidencia
	public function get_enca($insi){
		return $this->db->query("SELECT * FROM incidencias.incidencias_estados WHERE idincidenciaestado = '$insi'")->row();
	}

	public function setEliminarIncidenciasNormal($idIncidencia)
	{
		try {
			$result = $this->db->query("DELETE FROM incidencias.incidencias WHERE idincidencias = ".$idIncidencia.";");
			return $result;
		} catch (Exception $e) {
			return false;
		}		
	}
}
