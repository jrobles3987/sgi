<<?php
/**
 *
 */
class planificacion extends CI_Model
{

  function setguardarplanitec($idplanificacion='',$idtecnico='',$comentario='')
  {
$result=$this->bd->query("INSERT INTO incidencias.planificacion_tecnicos(
	idplanificacion, idtecnico, comentario)
	VALUES ('".$idplanificacion."','".idtecnico."','".$comentario."');");
  if ($result->num_rows()>0) {
    return $result->row();
    }else {
    return null;
    }

  }

  public function getlistarplanificaiones()
{
    $result=$this->bd->get('incidencias.v_listar_planificaciones');
    if($result->num_rows()>0)
    {
      return $result->result();
  }else{
      return null;
    }
}

public function setguardarplanificacion (){
  $result = $this->bd->query("SELECT incidencias.f_ingreso_planificacion(
                              '".$data['txttituloplanificacion']."',
                              '".$data['fechainicio-fechafin']."',
                              '".$data['#ui-datepicker-div']."',
                              '".$data['txtareadescripcion2']."',
                              '".$data['idlocalizacion']."',
                              null,
                              '".$data['fechainicio-fechafin']."',
                              '".$data['#ui-datepicker-div']."');");
  if ($result->num_rows() > 0) {
    $idplanifi = $result->row();


    return $result->row();
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
