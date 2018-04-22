<?php include("Vmodalincidencia.php");?>
<?php include("Vmodalincidencia_nueva.php");?>
<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">				
				<div class="pull-right">
					<p><a  href="#" class="btn btn-primary btn-block" id="btn_incidencias_Nuevas">Nuevas Incidencias</a></p>                           
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_incidencias">
					<div class="panel panel-default col-md-6 col-center" style="padding: 1px,1px,1px,1px">
					    <center><B>Inidencias registradas en el sistema</B><center/>
					</div>
					<div>
						<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($incidentes){
									foreach ($incidentes as $fila) {
										$num++;
										echo '<TR id="'.$fila->idincidencias.'" onclick="myFunction(this)"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
										<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD></TR>'; 
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
	function myFunction(x)
	{
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/mostrarincidentes');?>",
            data: {idincidencia: x.id},
            success: function (data) {
				var json1 = JSON.parse(data);
				$('#txtidincidencia').val(x.id);
				$('#txttituloincidencia').val(json1.tituloincidencia);
				$('#fechaapertura').val(json1.fechaapertura);
				$('#fechavencimiento').val(json1.fechavencimiento);
				$('#selectestado').val(json1.idincidenciaestado);
				$('#selecturgencia').val(json1.urgencia);
				$('#selectimpacto').val(json1.impacto);
				$('#selectprioridad').val(json1.prioridad);
				$('#selectecnico').val(json1.tecnicoasignado);
				$('#selecfuenteincidencia').val(json1.idincidenciafuente);
				$('#seleclocalizacion').val(json1.idlugarincidente);
				$('#txtareadescripcion').val(json1.descripcion);
				$('#selectcategoria').val(json1.idcategoria);
            },
            error: function (xhr, exception) {
				alert("error");
            }
	    });
		$('#vmodalincidencia').modal({show:true});		
	}

	//inicia las tablas usando el plugin datatables
	$('#tablaincidencias').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});

	function LimpiarModalIngresoIncidencias () {
		$('#txttituloincidencia2').val('');
		$('#selectestado2').val(1);
		$('#selecturgencia2').val(1);
		$('#selectimpacto2').val(1);
		$('#selectprioridad2').val(1);
		$('#selectecnico2').val(0);
		$('#selectfuenteincidencia2').val(1);
		$('#selectlocalizacion2').val(0);
		$('#selectcategoria2').val(0);
		$('#txtareadescripcion2').val('');
	}

	$('#btn_incidencias_Nuevas').click(function() {
		LimpiarModalIngresoIncidencias();
		$('#Vmodalincidencia_nueva').modal({show:true});
	});
</script>