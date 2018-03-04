<div class="row container col-lg-12 col-center">
	<div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title" style="font-size: 25px;">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Incidencias sin asignar
                        <span class="caret"></span>
                      </a>

                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                      	<div id="incidentes_sin_asignar">
							<TABLE id="tablaincidencias1" class="table table-striped table-bordered table-hover">
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
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title" style="font-size: 25px;">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Incidencias en curso
                        <span class="caret"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                    	<div id="incidentes_en_curso">
							<TABLE id="tablaincidencias2" class="table table-striped table-bordered table-hover">
								<?php
									echo '<THEAD>';
									echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
									echo '</THEAD>';
									echo '<TBODY>';
									$num=0;
									if($incidentes){
										foreach ($incidentes as $fila) {
											if( $fila->estado == 'EN CURSO (PLANIFICACIÓN)' || $fila->estado == 'EN CURSO (ASIGNADO)') {
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
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title" style="font-size: 25px;">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Incidencias en Observación
                        <span class="caret"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                    	<div id="incidentes_en_observacion">
							<TABLE id="tablaincidencias3" class="table table-striped table-bordered table-hover">
								<?php
									echo '<THEAD>';
									echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
									echo '</THEAD>';
									echo '<TBODY>';
									$num=0;
									if($incidentes){
										foreach ($incidentes as $fila) {
											if( $fila->estado == 'EN ESPERA (OBSERVACIÓN)' ) {
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
<script src="<?=base_url('plantilla/dist/js/menuinicio.js')?>"></script>
<script type="text/javascript">
	$('#tablaincidencias1').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});
	$('#tablaincidencias2').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});
	$('#tablaincidencias3').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});
</script>