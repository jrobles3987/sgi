<style type="text/css">
	#form {
	  width: 250px;
	  margin: 0 auto;
	  height: 50px;
	}

	#form label {
	  font-size: 20px;
	}

	input[type="radio"] {
	  display: none;
	}

	#form label {
	  color: grey;
	}

	.clasificacion {
	  direction: rtl;
	  unicode-bidi: bidi-override;
	}

	label:hover,
	label:hover ~ label {
	  color: orange;
	}

	input[type="radio"]:checked ~ label {
	  color: orange;
	}
</style>
<div class="row container col-lg-12 col-center">
	<div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
            	<div style="margin:10px"></div>
            	<div class="panel panel-default col-md-9 col-center" style="padding: 1px,1px,1px,1px">
			    	<center><B>Calificación de Incidencias Resueltas</B><center/>
				</div>
				<div style="margin:20px"></div>
				<div>
					<p><B>Nota:</B> Las incidencias resueltas solo se pueden calificar una sola vez, una vez guardada su calificación no podra ser modificada. </p>
				</div>
				<div style="margin:20px"></div>
                	<div id="incidentes_resuletas">
						<TABLE id="tablaincidencias1" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Fecha Apertura</TH><TH>Fecha Resolución</TH><TH>Asignado A:</TH><TH>Calificación</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($incidentes){
									foreach ($incidentes as $fila) {
										if( $fila->estado == 'RESUELTO' ) {
											$num++;
											echo '<TR id="'.$fila->idincidencias.'" onclick="myFunction(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->fechavencimiento.'</TD>
											<TD>'.$fila->tecnicoasignado.'</TD><TD>
											<form>
											  <p class="clasificacion">
											    <input id="radio1" type="radio" name="estrellas" value="5"><!--
											    --><label for="radio1">★</label><!--
											    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
											    --><label for="radio2">★</label><!--
											    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
											    --><label for="radio3">★</label><!--
											    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
											    --><label for="radio4">★</label><!--
											    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
											    --><label for="radio5">★</label>
											  </p>
											</form>
											</TD></TR>'; 
										}	
									}
								}
								echo '</TBODY>';
							?>
						</TABLE>
					</div>                   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
<script type="text/javascript">
	$('#tablaincidencias1').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});

</script>