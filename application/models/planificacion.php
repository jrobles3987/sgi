<?php
/**
 *
 */
class planificacion extends CI_Model
{
  public function GetListarPlanificaiones(){
      $result=$this->db->get('incidencias.v_listar_planificaciones');
      if($result->num_rows()>0)
      {
        return $result->result();
    }else{
        return null;
      }
  }

  public function GetListarPlanificaionesCalendario(){
      $result=$this->db->query("SELECT idplanificacion, titulo as title, descripcion_planificacion,fecha_apertura_real as start, fecha_finalizacion_real as end FROM incidencias.planificacion;");
      if($result->num_rows()>0)
      {
        return $result->result();
    }else{
        return null;
      }
  }

  public function setGuardarPlanificacion ($data){
    $bandera = true;
    $result = $this->db->query("SELECT incidencias.f_ingreso_planificacion(
                                '".$data['tituloplanificacion']."',
                                '".$data['fechainicio']."',
                                '".$data['fechavencimiento']."',
                                '".$data['descripcion']."',
                                ".$data['localizacion']."
                              );");
    if ($result->num_rows() > 0) {
      $idplanifi = $result->row();
      for ($i=0; $i < count($data['tecnicosasignados']); $i++) {
        if ($bandera) {
          if ($data['tecnicosasignados'][$i]){
            $result2 = $this->db->query("SELECT incidencias.f_ingreso_planificacion_tecnicos(
                                        ".$idplanifi->f_ingreso_planificacion.",
                                        ".$data['tecnicosasignados'][$i]."
                                      );");
            if ($result2->num_rows() > 0) {
              $bandera = array(
                'f_ingreso_planificacion_tecnicos' => 't'
              );
            }else {
              $bandera = array(
                'f_ingreso_planificacion_tecnicos' => 't'
              );
            }
          }
        }
      }
      return $result->row();;
    }else {
      return null;
    }
  }

}
?>
