<?php
/**
* 
*/
class Usuarios extends CI_Model
{
	
	private $db_usuarios;

	public function __construct() {
	    parent::__construct();
		$this->db_usuarios = $this->load->database('usuarios', TRUE);
	}

	public function getLogin($Usuario='', $Password='')
	{			
		$result = $this->db_usuarios->query( "SELECT esq_roles.fnc_encripta_clave('".$Password."');");
		if($result->num_rows() > 0 ){					
			$PasswordEncrip = $result->row();
		}
		$result = $this->db_usuarios->query( "SELECT esq_roles.fnc_login(
																		'".$Usuario."', 
																		'".$PasswordEncrip->fnc_encripta_clave."',
																		'21', 
																		'Windows7', 
																		'5453', 
																		'192.8.8.8', 
																		'Opera',
																		'2') AS msj;"
											);		 
		//select fnc_login('jrobles3987@utm.edu.ec', '99e72064c29e90b6dc7657899dc9e291b4fc735f753ddd59a7ec06a02817994011947178f950406e46109c7b554bf17598de044ce4f01f671ad58fad95c784b7', '21', 'W7', '8080', '192.168.1.2', 'Opera', '1')
		if($result->num_rows() > 0 ){					
			return $result->row();
		}else{
			return null;
		}
	}

	public function getUsuariosSistema()
	{
		$result = $this->db->query("SELECT * FROM incidencias.v_listar_usuariospersonal;");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function getUsuariosSistemaVerifica($cedula = '')
	{
		$result = $this->db->query("SELECT * FROM incidencias.v_listar_usuariospersonal WHERE v_listar_usuariospersonal.cedula = '".$cedula."';");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function getBuscarUsuarioSistema($cedula = '')
	{
		$result = $this->db->query("SELECT * FROM incidencias.v_listar_personal WHERE v_listar_personal.cedula = '".$cedula."';");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}	

	public function getUsuariosRol()
	{
		$result = $this->db->query("SELECT * FROM incidencias.usuarios_roles;");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function getListarUsuariosSistemaTipo($tipo = '')
	{
		$result = $this->db->query("SELECT * FROM incidencias.v_listar_usuariospersonal WHERE v_listar_usuariospersonal.rol = '".$tipo."';");
		if($result->num_rows() > 0 ){
			return $result->result();
		}else{
			return null;
		}
	}

	public function setUsuariosSistemas($idpersonal = '', $idrol = '')
	{
		$result = $this->db->query("SELECT incidencias.f_ingreso_usuarios_personal(".$idpersonal.",".$idrol.");");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}

	public function getCredencialesPersonal($idpersonal = '')
	{
		$result = $this->db->query("SELECT idpersonal, idrol, estado 
									FROM incidencias.v_listar_personal_rol 
									WHERE idpersonal = ".$idpersonal." and estado = 'S';");
		if($result->num_rows() > 0 ){
			return $result->row();
		}else{
			return null;
		}
	}

}