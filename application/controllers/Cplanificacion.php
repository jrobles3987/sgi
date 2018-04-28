<?php
/**
 *
 */
class Cplanificacioes extends CI_Controller
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

  public function planificaciones()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('planificacion');
			$guardarplani= $this->incidencia->setguardarplanificacion();
			echo json_encode($guardarplani);
		}else{
			show_404();
		}
	}
 public function guardar_plani_tec()
{
  if ($this->session->userdata('login'==TRUE)) {
    $idplanificacion->$this->input->post('idplanificacion');
    $idtecnico->$this->input->post('idtecnico');
    $comentario->$this->input->post('comentario');
    $this->load->model('planificacion');
    $res_pla_tec =$this->planificacion->setguardarplanitec($idplanificacion,$idtecnico,$comentario);
    $data= array(
      "res" => $res_pla_tec->setguardarplanitec());
    echo json_encode($data);
  }else {
    show_404();
  }
}

public function GuardarPlanificaciones()
{
  if ($this->input->is_ajax_request()) {
    $data = array(
      'txttituloplanificacion'=>$this->input->post('txttituloplanificacion'),
      'fechainicio-fechafin'		=> $this->input->post('fechainicio-fechafin'),
      '#ui-datepicker-div'	=> $this->input->post('#ui-datepicker-div'),
      'txtareadescripcion2'		=> $this->input->post('txtareadescripcion2'),
      'txttituloincidencia2'	=> $this->input->post('txttituloincidencia2'),
      'fechainicio-fechafin'		=> $this->input->post('fechainicio-fechafin'),
      '#ui-datepicker-div'	=> $this->input->post('#ui-datepicker-div')
    );

    if ($data) {
      $this->load->model('incidencia');
      $modelos = $this->planificacion->setguardarplanificacion($data);

      $data= array(
        "res" => $modelos->f_ingreso_planificacion
      );

      //echo json_encode($data);
    }else{
      //show_404();
    }
    echo json_encode($data);
  }else{
    //show_404();
  }
}



}




 ?>
