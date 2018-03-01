<?php

class Personas extends CI_Model
{
	private $db_personas;

	public function __construct() {
	    parent::__construct();
	    $this->db_personas = $this->load->database('personal', TRUE);
	}

	public function getDatosSesionPersonas($Usuario='')
	{
		$result = $this->db_personas->query("SELECT
												idpersonal,
												cedula,
												apellido1,
												apellido2,
												nombres
												--idfichero_hoja_vida_foto AS idfichero_foto
											FROM
												esq_datos_personales.personal
											WHERE
												correo_personal_institucional = '".$Usuario."';");
		if($result->num_rows() > 0 ){			
			return $result->row();
		}else{
			return null;
		}
	}
}