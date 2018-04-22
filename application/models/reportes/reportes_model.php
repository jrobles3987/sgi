<?php
class Reportes_model extends CI_Model {
    public function __construct() {
      parent::__construct();
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
}
?>
