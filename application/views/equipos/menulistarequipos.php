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
								echo '<TR><TH>N°</TH><TH>Descripción</TH><TH>Codigo Equipo</TH><TH>Codigo Inventario</TH><TH>Garantia</TH><TH>Valor compra</TH><TH>Fecha Compra</TH><TH>Fecha Ingreso</TH><TH>Custodio</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($lista_equipos){
									foreach ($lista_equipos as $fila) {
										$num++;
										echo '<TR id="'.$fila->idequipo.'" onclick="myFunctio(this)"><TD>'.$num.'</TD><TD>'.$fila->descripcion.'</TD><TD>'.$fila->codigoequipo.'</TD><TD>'.$fila->codinventario.'</TD><TD>'.$fila->garantia.'</TD><TD>'.$fila->valorcompra.'</TD>
										<TD>'.$fila->fechacompra.'</TD><TD>'.$fila->fechaingreso.'</TD><TD>'.$fila->custodio.'</TD></TR>';
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
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});
</script>
