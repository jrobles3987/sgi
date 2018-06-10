<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_incidencias">
					<div class="panel panel-default col-md-6 col-center" style="padding: 1px,1px,1px,1px">
					    <center><B>Equipos Registrados en el Sistema</B><center/>
					</div>
					<div>
						<TABLE id="tablaequipos" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Tipo Sistema</TH><TH>Nombre</TH><TH>Codigo Sistema</TH><TH>Fecha Ingreso</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($lista_sistemas){
									foreach ($lista_sistemas as $fila) {
										$num++;
										echo '<TR id="'.$fila->idsistema.'" onclick="myFunctio(this)"><TD>'.$num.'</TD><TD>'.$fila->nombretipobien.'</TD><TD>'.$fila->descripcion.'</TD><TD>'.$fila->codigosistema.'</TD><TD>'.$fila->fechaingreso.'</TD></TR>';
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
	<div class="modal-body">
	</div>

<script>
	$('#tablaequipos').dataTable({
		"lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]]
	});
</script>