<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">				
				<div class="pull-right">
					<p><a  href="#" class="btn btn-primary btn-block" id="btn_fuente_Nuevas">Nuevos Modelos</a></p>                           
				</div>
				<div class="clearfix"></div>
			</span>			
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_fuente">
					<div class="panel panel-default col-md-6 col-center" style="padding: 1px,1px,1px,1px">
<<<<<<< HEAD
					    <center><B> Marcas Equipos</B><center/>
=======
					    <center><B> Modelos Equipos</B><center/>
>>>>>>> f234ca1ebd26896d7471e3565891f41f5c536d57
					</div>
					<div>
						<TABLE id="tablaincidenciasfuentes" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Nombre</TH><TH>Estado</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($listar_modelos){
									foreach ($listar_modelos as $fila) {
										$num++;
<<<<<<< HEAD
										echo '<TR id="'.$fila->idmarca.'" onclick="myFunctionEstados(this)"><TD>'.$num.'</TD><TD>'.$fila->nombremarca.'</TD><TD>'.$fila->estado.'</TD></TR>'; 
=======
										echo '<TR id="'.$fila->idmodelo.'" onclick="myFunctionEstados(this)"><TD>'.$num.'</TD><TD>'.$fila->nombremodelo.'</TD><TD>'.$fila->estado.'</TD></TR>'; 
>>>>>>> f234ca1ebd26896d7471e3565891f41f5c536d57
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
	function myFunctionEstados(x)
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
	$('#tablaincidenciasfuentes').dataTable({
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

	$('#btn_fuente_Nuevas').click(function() {
		LimpiarModalIngresoIncidencias();
		$('#Vmodalincidencia_nueva').modal({show:true});
	});
</script>