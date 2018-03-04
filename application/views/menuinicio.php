<div class="row container col-lg-11 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#inicio" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Inicio</a></li>					
				</ul>
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
                <div class="tab-pane fade in active" id="inicio">							 
					 <FORM ACTION="" METHOD="post">
						<INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
						<TABLE class="table">
						<TBODY>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="asignadas"> Incidencias sin asignar<span class="caret"></span></a></h3></TD>
								<div id="incidentes_sin_asignar">
									<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">
										<?php
											echo '<THEAD>';
											echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
											echo '</THEAD>';
											echo '<TBODY>';
											$num=0;
											if($incidentes){
												foreach ($incidentes as $fila) {
													if( $fila->estado == 'NUEVO' ) {
														$num++;
														echo '<TR id="'.$fila->idincidencias.'" onclick="myFunction(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
														<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD></TR>'; 
													}													
												}
											}
											echo '</TBODY>';
										?>
									</TABLE>
								</div>
							</TR>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Incidencias en curso<span class="caret"></span></a></h3></TD>
								<div id="incidentes_en_curso">
									<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">
										<?php
											echo '<THEAD>';
											echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
											echo '</THEAD>';
											echo '<TBODY>';
											$num=0;
											if($incidentes){
												foreach ($incidentes as $fila) {
													if( $fila->estado == 'EN CURSO (ASIGNADO)' or $fila->estado == 'EN CURSO (PLANIFICACIÓN)' ) {
														$num++;
														echo '<TR id="'.$fila->idincidencias.'" onclick="myFunction(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
														<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD></TR>'; 
													}	
												}
											}
											echo '</TBODY>';
										?>
									</TABLE>
								</div>
							</TR>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Incidencias en observación<span class="caret"></span></a></h3></TD>
								<div id="incidentes_en_observacion">
									<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">
										<?php
											echo '<THEAD>';
											echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
											echo '</THEAD>';
											echo '<TBODY>';
											$num=0;
											if($incidentes){
												if( $fila->estado == 'EN ESPERA (OBSERVACIÓN)' ) {
														$num++;
														echo '<TR id="'.$fila->idincidencias.'" onclick="myFunction(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
														<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD></TR>'; 
													}
											}
											echo '</TBODY>';
										?>
									</TABLE>
								</div>
							</TR>
						</TBODY>
						</TABLE>
					</FORM>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('plantilla/dist/js/menuinicio.js')?>"></script>
<script>
	$(document).ready(function() {
		var estadotabla1 = false;
		var estadotabla2 = false;
		var estadotabla3 = false;
	});
</script>