<?php
/**
 *
 */
class planificacion extends CI_Model
{

  function setguardarplanitec($idplanificacion='',$idtecnico='',$comentario='')
  {
    $result=$this->bd->query("INSERT INTO incidencias.planificacion_tecnicos(
                          	   idplanificacion, idtecnico, comentario)
                          	   VALUES ('".$idplanificacion."','".idtecnico."','".$comentario."');
                            ");
    if ($result->num_rows()>0) {
      return $result->row();
    }else {
      return null;
    }
  }

  public function GetListarPlanificaiones()
  {
      $result=$this->db->get('incidencias.v_listar_planificaciones');
      if($result->num_rows()>0)
      {
        return $result->result();
    }else{
        return null;
      }
  }

  public function GetListarPlanificaionesCalendario()
  {
      $result=$this->db->query("SELECT idplanificacion, titulo as title, descripcion_planificacion,fecha_apertura_real as start, fecha_finalizacion_real as end FROM incidencias.planificacion;");
      if($result->num_rows()>0)
      {
        return $result->result();
    }else{
        return null;
      }
  }

  public function setguardarplanificacion ($data){
    $bandera = true;
    $result = $this->db->query("SELECT incidencias.f_ingreso_planificacion(
                                '".$data['tituloincidencia']."',
                                '".$data['fechainicio']."',
                                '".$data['fechavencimiento']."',
                                '".$data['descripcion']."',
                                ".$data['localizacion']."
                              );");
    if ($result->num_rows() > 0) {
      $idplanifi = $result->row();
      for ($i=0; $i < count($data['tecnicosasignados']); $i++) {
        if ($bandera) {
          $result = $this->db->query("SELECT incidencias.f_ingreso_planificacion_tecnicos(
                                      ".$idplanifi->f_ingreso_planificacion.",
                                      ".$data['tecnicosasignados'][$i]."
                                    );");
          if ($result->num_rows() > 0) {
            $bandera = $result->row();
          }else {
            $bandera = null;
          }
        }
      }
      return $bandera;
    }else {
      return null;
    }
  }


 public function setultimaplanificacion (){
   $result=$this->db->query("SELECT MAX  (idplanificacion) FROM incidencias.planificacion;");
    if($result->num_rows()>0)
    {
      return $result->result();
  }else{
      return null;
    }

 }

}
?>
