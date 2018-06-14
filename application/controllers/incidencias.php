<?php
/**
*
*/

class Incidencias extends CI_Controller
{
	public function Incidentesnuevos()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data = array('contenido' => 'incidenciasincidentesnuevos');
			$this->load->view('menuincidentesnuevos.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function Guardarincidencias()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'fechaapertura'		=> $this->input->post('fechaapertura'),
				'fechavencimiento'	=> $this->input->post('fechavencimiento'),
				//'fechaaceptacion'	=> $this->input->post('fechaaceptacion'), ???
				//'fechaaprovacion'	=> $this->input->post('fechaaprovacion'),
				'idincidenciaestado'=> $this->input->post('incidenciaestado'),
				'urgencia'			=> $this->input->post('urgencia'),
				'impacto'			=> $this->input->post('impacto'),
				'prioridad' 		=> $this->input->post('prioridad'),
				'idincidenciafuente'=> $this->input->post('idincidenciafuente'),
				//'usuarioaprobacion'	=> $this->input->post('usuarioaprobacion'), ????
				'tituloincidencia'	=> $this->input->post('tituloincidencia'),
				'descripcion'		=> $this->input->post('descripcion'),
				'tecnicoasignado'   => $this->input->post('tecnicoasignado'),
				'idlugarincidente'	=> $this->input->post('idlocalizacion'),
				'idcategorias'		=> $this->input->post('idcategorias')
				//'idincidenciaaprovacion'		=> $this->input->post('idincidenciaaprovacion'),
				//'tipoincidencia'	=> $this->input->post('tipoincidencia'),
				//'usuariocreador'	=> $this->input->post('usuariocreador')
			);

			if ($data) {
				$this->load->model('incidencia');
				$modelos = $this->incidencia->setGuardarincidencia($data);

				$data= array(
					"res" => $modelos->f_ingreso_incidencias
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

	public function ActualizarIncidenciasNormal()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'idincidencia'		=> $this->input->post('idincidencia'),
				'urgencia'			=> $this->input->post('urgencia'),
				'tituloincidencia'	=> $this->input->post('tituloincidencia'),
				'descripcion'		=> $this->input->post('descripcion'),
				'idlugarincidente'	=> $this->input->post('idlocalizacion'),
				'idcategoria'		=> $this->input->post('categoria')
			);

			if ($data) {
				$this->load->model('incidencia');
				$modelos = $this->incidencia->setActualizarIncidenciaNormal($data);
				echo json_encode($modelos);	
			}else{
				show_404();
			}			
		}else{
			show_404();
		}
	}

	public function ActualizarIncidencias()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'idincidencia'		=> $this->input->post('idincidencia'),
				'fechaapertura'		=> $this->input->post('fechaapertura'),
				'fechavencimiento'	=> $this->input->post('fechavencimiento'),
				//'fechaaceptacion'	=> $this->input->post('fechaaceptacion'),
				//'fechaaprovacion'	=> $this->input->post('fechaaprovacion'),
				'idincidenciaestado'=> $this->input->post('incidenciaestado'),
				'urgencia'			=> $this->input->post('urgencia'),
				'impacto'			=> $this->input->post('impacto'),
				'prioridad' 		=> $this->input->post('prioridad'),
				'idincidenciafuente'=> $this->input->post('idincidenciafuente'),
				//'usuarioaprobacion'	=> $this->input->post('usuarioaprobacion'),
				'tituloincidencia'	=> $this->input->post('tituloincidencia'),
				'descripcion'		=> $this->input->post('descripcion'),
				'tecnicoasignado'   => $this->input->post('tecnicoasignado'),
				'idlugarincidente'	=> $this->input->post('idlocalizacion'),
				'tiemporesolucion'  => $this->input->post('tiemporesolucion')
				//'idincidenciaaprovacion'		=> $this->input->post('idincidenciaaprovacion'),
				//'tipoincidencia'	=> $this->input->post('tipoincidencia'),
				//'usuariocreador'	=> $this->input->post('usuariocreador')
			);

			if ($data) {
				$this->load->model('incidencia');
				$modelos = $this->incidencia->setActualizarIncidencia($data);

				$data= array(
					"res" => $modelos->f_actualiza_incidencias
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

	public function Mostrarincidentes()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idincidencia = $this->input->post('idincidencia');
			$this->load->model('incidencia');
			$equipos = $this->incidencia->getmostrarincidencias($idincidencia);
			echo json_encode($equipos);
		}else{
			show_404();
		}
	}

	public function Mostrarincidentesnotificaciones()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$incidencias = $this->incidencia->getmostrarincidenciasnotificacion();
			echo json_encode($incidencias);
		}else{
			show_404();
		}
	}

	public function MostrarTrabajosActivosTecnico()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idpersonal = $this->input->post('idpersonal');
			$this->load->model('incidencia');
			$trabajosactivos = $this->incidencia->getHistorialTecnico($idpersonal);
			echo json_encode($trabajosactivos);
		}else{
			show_404();
		}
	}

	public function MostrarCalificacionTrabajosTecnico()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idpersonal = $this->input->post('idpersonal');
			$this->load->model('incidencia');
			$calificaciontrabajos = $this->incidencia->getPromediosCalificacionTecnico($idpersonal);
			echo json_encode($calificaciontrabajos);
		}else{
			show_404();
		}
	}

	public function EstadisticasIncidenciasEstados()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$estadistica_estados = $this->incidencia->getEstadisticasIncidenciasEstados($this->session->userdata('idusuario'));
			echo json_encode($estadistica_estados);
		}else{
			show_404();
		}
	}

	public function EstadisticasIncidenciasUrgencia()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$estadistica_estados = $this->incidencia->getEstadisticasIncidenciasUrgencia($this->session->userdata('idusuario'));
			echo json_encode($estadistica_estados);
		}else{
			show_404();
		}
	}

	public function IngresarCalificacionesIncidencias()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idincidencia = $this->input->post('idincidencia');
			$calificacion = $this->input->post('calificacion');
			$detallecalificacion = $this->input->post('detallecalificacion');
			$tipo = $this->input->post('tipo');
			$this->load->model('incidencia');
			$res_calificacion = $this->incidencia->setAsignarCalificacionesIncidencias($idincidencia,$calificacion,$detallecalificacion,$tipo);
			$data= array(
				"res" => $res_calificacion->f_ingreso_incidencias_calificaciones
			);
			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function ReDibujarTablaIncidenciasCalificacion()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$incidentes = $this->incidencia->getListartablaUsuarioNormal($this->session->userdata('idusuario'));
			echo '<TABLE id="tablaincidencias1" class="table table-striped table-bordered table-hover">';
			echo '<THEAD>';
			echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Fecha Apertura</TH><TH>Fecha Resolución</TH><TH>Asignado al técnico</TH></TR>';
			echo '</THEAD>';
			echo '<TBODY>';
			$num=0;
			if($incidentes){
				foreach ($incidentes as $fila) {
					if( $fila->estado == 'RESUELTO' ) {
						$num++;
						echo '<TR id="'.$fila->idincidencias.'" onclick="Llama_modal_calificacion(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->fechavencimiento.'</TD>
						<TD>'.$fila->tecnicoasignado.'</TD></TR>';
					}
				}
			}
			echo '</TBODY>';
			echo '</TABLE>';
		}else{
			show_404();
		}
	}

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

	public function ReDibujaTablaIncidenciasNormal() {
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$incidentes_todos = $this->incidencia->GetListarTablaNormal($this->session->userdata('idusuario'));
			echo '<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">';
			echo '<THEAD>';
			echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH><TH>Acción</TH></TR>';
			echo '</THEAD>';
			echo '<TBODY>';
			$num=0;
			if($incidentes_todos){
				foreach ($incidentes_todos as $fila) {
					if( $fila->estado == 'NUEVO' ) {
						$num++;
						echo '<TR id="'.$fila->idincidencias.'"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
						<TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD>
						<TD>
							<div class="row">
							<div class="col-xs-1 col-sm-1" onclick="EditarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span></a></div>
							<div class="col-xs-1 col-sm-1" onclick="EliminarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div>
							</div>
						</TD></TR>'; 
					}	
				}
			}
			echo '</TBODY>';
			echo '</TABLE>';
		}else{
			show_404();
		}
	}

	public function ReDibujaTablaIncidencias() {
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$incidentes_todos = $this->incidencia->getlistartabla();
			echo '<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">';
			echo '<THEAD>';
			echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH><TH>Acción</TH></TR>';
			echo '</THEAD>';
			echo '<TBODY>';
			$num=0;
			if($incidentes_todos){
				foreach ($incidentes_todos as $fila) {
					$num++;
					$fechamodificacion = date_create($fila->ultimamodificacion);
					$fechamodificacion2 = date_format($fechamodificacion, 'Y-m-d H:i');
					echo '<TR id="'.$fila->idincidencias.'"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
					<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fechamodificacion2.'</TD><TD>'.$fila->fechavencimiento.'</TD>
					<TD>
						<div class="row">
						<div class="col-xs-1 col-sm-1" onclick="EditarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span></a></div>
						<div class="col-xs-1 col-sm-1" onclick="EliminarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div>
						</div>
					</TD>
					</TR>'; 
				}
			}
			echo '</TBODY>';
			echo '</TABLE>';
		}else{
			show_404();
		}
	}

	public function mostartecnicos()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$tecnicoasignado= $this->incidencia->getlistarpersonal();
			echo json_encode($tecnicoasignado);
		}else{
			show_404();
		}
	}

	public function planificaciones()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$guardarplani= $this->incidencia->setguardarplanificacion();
			echo json_encode($guardarplani);
		}else{
			show_404();
		}
	}

	public function EliminarIncidenciasNormal()
	{
		if ($this->session->userdata('login')==TRUE) {
			$idIncidencia = $this->input->post('idIncidencia');
			$this->load->model('incidencia');
			$eliminaincidencia= $this->incidencia->setEliminarIncidenciasNormal($idIncidencia);
			echo json_encode($eliminaincidencia);
		}else{
			show_404();
		}
	}
}
