<?php
class Reportes_model extends CI_Model {
    public function __construct() {
      parent::__construct();
      $this->db_personas = $this->load->database('personal', TRUE);
    }


	public function get_report($fecha_inicio,$fecha_fin){
		return $this->db->query("SELECT * FROM incidencias.v_listar_incidencias WHERE fechaapertura >= '$fecha_inicio' AND fechaapertura <='$fecha_fin'")->result();
	}
  ///reporte de equios x fecha
  public function get_report_equipos($fecha_inicio,$fecha_fin){
		return $this->db->query("SELECT * FROM incidencias.v_listar_equipos WHERE
                            v_listar_equipos.fechaingreso >= '$fecha_inicio' AND v_listar_equipos.fechaingreso <='$fecha_fin'")->result();
	}
  ///reporte de equios en general
  public function get_report_equipos_general(){
    return $this->db->query("SELECT * FROM incidencias.v_listar_equipos")->result();
  }
  ///reporte de equios x fecha de compra
  public function get_report_equipos_comprados($fecha_inicio,$fecha_fin){
    return $this->db->query("SELECT * FROM incidencias.v_listar_equipos WHERE
                            v_listar_equipos.fechacompra >= '$fecha_inicio' AND v_listar_equipos.fechacompra <='$fecha_fin'")->result();
  }
  /////localizacion de los equipos
  public function get_equipos_local($equilo){
    return $this->db->query("SELECT * FROM incidencias.v_listar_equipos WHERE
                            v_listar_equipos.idlocalizacion = '$equilo'")->result();
  }
  ///busqueda de localizacion de los equipos
public function get_equipolocal($q){
		return $this->db->query("SELECT *
		 FROM incidencias.localizaciones
		WHERE idlocalizacion ='$q'")->row();
	}
/////custodio de los equipos
public function get_custodio($q){
		return $this->db_personas->query("SELECT
		idpersonal,
		cedula,
    concat(personal.apellido1, ' ', personal.apellido2, ' ', personal.nombres) AS nombrescompletos
	FROM
		esq_datos_personales.personal
	WHERE
	 (concat(personal.apellido1, ' ', personal.apellido2, ' ', personal.nombres) LIKE '%$q%' OR cedula LIKE '%$q%') LIMIT 20 offset 0")->result();
	}
///busqueda de custodio de los equipos
public function get_equipocusto($get_equipocusto){
		return $this->db->query("SELECT * FROM incidencias.v_listar_equipos WHERE
                            v_listar_equipos.cedula = '$get_equipocusto'")->result();
	}
  /////localizacion de los equipos
  public function get_datospersonales($custodioequipo){
  		return $this->db_personas->query("SELECT
  		idpersonal,
  		cedula,
      concat(personal.apellido1, ' ', personal.apellido2, ' ', personal.nombres) AS nombrescompletos
  	FROM
  		esq_datos_personales.personal
  	WHERE
  	 cedula= '$custodioequipo'")->row();
  	}
/////////////estados esuipos
    public function get_estados(){
      return $this->db->query("SELECT idequiposestado, nombre FROM incidencias.equipos_estados")->result();
    }
///busqueda de estado equipos
    public function get_equipocus($est_equi){
    		return $this->db->query("SELECT * FROM incidencias.v_listar_equipos WHERE
                                v_listar_equipos.idestadoequipo = '$est_equi'")->result();
    	}
      /////////////estados esuipos
          public function get_datos_est_equi($est_equi){
            return $this->db->query("SELECT * FROM incidencias.equipos_estados WHERE idequiposestado = '$est_equi'")->row();
          }
}////fin
?>
