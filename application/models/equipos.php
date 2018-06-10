<?php
/**
* 
*/
class Equipos extends CI_Model
{
	
	public function setIngresarEquiposComputadores($data)
	{
		if ($data['idpersonacustodio'] == ""){
			$data['idpersonacustodio'] = "null";
		}

		$result = $this->db->query("SELECT incidencias.f_ingreso_equipos_computador(
									    ".$data['idtipobien'].",
										".$data['idfamiliabien'].",
										".$data['idsubfamiliabien'].",
										'".$data['fechacompra']."',
									    ".$data['valorcompra'].",
										".$data['garantia'].",
										".$data['vidautil'].",
									    ".$data['idpersonacustodio'].",
										'".$data['codinventario']."',
										'".$data['codequipo']."',
										'".$data['descripcion']."',
									    '".$data['observacion']."',
									    ".$data['idlocalizacion'].",
									    '".$data['vidautiltiempo']."',
									    '".$data['garantiatiempo']."'
									);");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
		
	}

	public function setIngresarSistemas($data)
	{
		$result = $this->db->query("SELECT incidencias.f_ingreso_sistemas(
									    ".$data['idtipobien'].",
										".$data['idfamiliabien'].",
										null,
										'".$data['fechaingreso']."',
									    ".$data['idlocalizacion'].",
										'".$data['descripcion']."',
										'".$data['codigosistema']."'
									);");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}

	public function setBorrarEquiposSubidaArchivo($usuario)
	{
		$result = $this->db->query("DELETE FROM incidencias.equipos_temp where usuario='".$usuario."';");		
	}

	public function getEquiposSubidosTemp($usuario='')
	{
		$result = $this->db->query("SELECT * FROM incidencias.equipos_temp WHERE usuario = '$usuario';");		
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function setIngresarEquiposSubidaArchivo($data)
	{
		try {
			
			if ($data['fechaingreso']=='' || $data['fechaingreso']==null){
				$data['fechaingreso']="null";
			}else{
				$data['fechaingreso']="'".$data['fechaingreso']."'";
			}

			if ($data['fechacompra']=='' || $data['fechacompra']==null){
				$data['fechacompra']="null";
			}else{
				$data['fechacompra']="'".$data['fechacompra']."'";
			}

			if ($data['pvpcompra']=='' || $data['pvpcompra']==null){
				$data['pvpcompra']="null";
			}

			if ($data['revalorizacion']=='' || $data['revalorizacion']==null){
				$data['revalorizacion']="null";
			}

			$result = $this->db->query("SELECT incidencias.f_ingreso_equipos_temp(
										'".$data['nombreproducto']."',
										'".$data['marca']."', 
										'".$data['modelo']."', 
										".$data['fechaingreso'].",
										'".$data['descripcion']."',
										'".$data['codigoequipo']."',
										'".$data['codigoinventario']."',
										'".$data['usuario']."',
										".$data['fechacompra'].",
										'".$data['garantia']."',
										'".$data['vidautil']."',
										'".$data['pvpcompra']."',
										'".$data['revalorizacion']."'
									);");
			//echo $result;
			if($result->num_rows() > 0 ){
				return $result->row();
			}
		} catch (Exception $e) {
			return false;
		}		
	}

	public function setIngresarEquiposLote($usuario)
	{
		try {
			$result = $this->db->query("SELECT incidencias.f_ingreso_equipos_lote('$usuario');");
			if($result->num_rows() > 0 ){
				return $result->row();
			}
		} catch (Exception $e) {
			return false;
		}		
	}

	public function getListarEquipos()
	{
		try {
			$result = $this->db->query("SELECT * from incidencias.v_listar_equipos order by fechaingreso;");
			if($result->num_rows() > 0 ){
				return $result->result();
			}
		} catch (Exception $e) {
			return false;
		}		
	}

	public function getListarSistemas()
	{
		try {
			$result = $this->db->query("SELECT * from incidencias.v_listar_sistemas order by fechaingreso;");
			if($result->num_rows() > 0 ){
				return $result->result();
			}
		} catch (Exception $e) {
			return false;
		}		
	}

	public function getListarEquiposDarbaja()
	{
		try {
			$result = $this->db->query("SELECT * from incidencias.v_listar_equipos where estado_equipo <> 'DE BAJA' order by fechaingreso;");
			if($result->num_rows() > 0 ){
				return $result->result();
			}
		} catch (Exception $e) {
			return false;
		}		
	}

	public function setDardeBajaEquipos($idEquipo)
	{
		try {
			$result = $this->db->query("UPDATE incidencias.equipos set idestadoequipo = 6, fechabajaequipo=CURRENT_DATE where idequipo = ".$idEquipo.";");
			return $result;			
		} catch (Exception $e) {
			return false;
		}		
	}


}