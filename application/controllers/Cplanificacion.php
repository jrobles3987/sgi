<?php
/**
 *
 */
class Cplanificacion extends CI_Controller
{
  public function ReDibujarTablaPlanificaciones()
  {
    if ($this->session->userdata('login')==TRUE) {
      $this->load->model('incidencia');
      $planificaciones = $this->incidencia->getlistarplanificaiones();
      echo '<TABLE id="tablaplanificaciones" class="table table-striped table-bordered table-hover">';
      echo '<THEAD>';
      echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Fecha Apertura</TH><TH>Fecha Finalización</TH><TH>Localización</TH></TR>';
      echo '</THEAD>';
      echo '<TBODY>';
      $num=0;
      if($planificaciones){
        foreach ($planificaciones as $fila) {
          $num++;
          echo '<TR id="'.$fila->idplanificacion.'" onclick="Llama_modal_calificacion(this)"><TD>'.$num.'</TD><TD>'.$fila->titulo.'</TD><TD>'.$fila->fecha_apertura_real.'</TD><TD>'.$fila->fecha_finalizacion_real.'</TD>
          <TD>'.$fila->nombrelocalizacion.'</TD></TR>';
        }
      }
      echo '</TBODY>';
      echo '</TABLE>';
    }else{
      show_404();
    }
  }

  public function ListarPlanificaciones()
  {
    //if ($this->input->is_ajax_request()) {
      $this->load->model('planificacion');
      $planificaciones = $this->planificacion->GetListarPlanificaionesCalendario();
      echo json_encode ($planificaciones);
    /*}else{
      show_404();
    }*/
  }

  public function GuardarPlanificaciones()
  {
    if ($this->input->is_ajax_request()) {
      $data = array(
        'tituloplanificacion'=>$this->input->post('tituloplanificacion'),
        'fechainicio' => $this->input->post('fechainicio'),
        'fechavencimiento'	=> $this->input->post('fechavencimiento'),
        'tecnicosasignados'	=> $this->input->post('tecnicosasignados'),
        'descripcion'	=> $this->input->post('descripcion'),
        'localizacion'	=> $this->input->post('localizacion')
      );

      if ($data) {
        $this->load->model('planificacion');
        $planificacion = $this->planificacion->setguardarplanificacion($data);
        if ($planificacion){
          $data2= array(
            "res" => $planificacion->f_ingreso_planificacion
          );
        }else{
          $data2= array(
            "res" => 'f'
          );
        }
      }
      echo json_encode($data2);
    }else{
      show_404();
    }
  }

}

?>
