<?php
class Reportes_model extends CI_Model {
    public function __construct() {
      parent::__construct();
    }


	public function get_report($fecha_inicio,$fecha_fin){
		return $this->db->query("SELECT * FROM incidencias.v_listar_incidencias WHERE fechaapertura >= '$fecha_inicio' AND fechaapertura <='$fecha_fin'")->result();
	}

}
?>
