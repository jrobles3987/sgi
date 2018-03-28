<?php include("Vmodalincidenciacalificacion.php");?>
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
            	<div id="tabla_incidentes_resuletas_calificacion">
					<TABLE id="tablaincidencias1" class="table table-striped table-bordered table-hover">
						<?php
							echo '<THEAD>';
							echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Fecha Apertura</TH><TH>Fecha Resolución</TH><TH>Asignado al técnico</TH></TR>';
							echo '</THEAD>';
							echo '<TBODY>';							
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
	ReDibujaTablaCalificacion();

	$('#tablaincidencias1').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});

	function ReDibujaTablaCalificacion () {
		$('#div_loading_cargando').css('display','inline');
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/ReDibujarTablaIncidenciasCalificacion');?>",
            data: {idincidencia: 1},
            success: function (data) {
				//var tabla = JSON.parse(data);
				document.getElementById("tabla_incidentes_resuletas_calificacion").innerHTML = "";
				document.getElementById("tabla_incidentes_resuletas_calificacion").innerHTML = data;
				$('#tablaincidencias1').dataTable({
					//quitar para paginacion por defecto
					"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
				});
            },
            complete : function(xhr, status) {
                $('#div_loading_cargando').css('display','none');
            },
            error: function (xhr, exception) {
				alert("error");
            }
	    });
	}
	
	function Llama_modal_calificacion(x)
	{
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/mostrarincidentes');?>",
            data: {idincidencia: x.id},
            success: function (data) {
				var json1 = JSON.parse(data);
				$('#calificacion_txtidincidencia').val(x.id);
				$('#calificacion_txttituloincidencia').val(json1.tituloincidencia);
				$('#calificacion_fechainicio-fechafin').val(formato(json1.fechaapertura)+"-"+formato(json1.fechavencimiento));
				$('#calificacion_fechaapertura').val(json1.fechaapertura);
				$('#calificacion_fechavencimiento').val(json1.fechavencimiento);
				$('#calificacion_selectestado').val(json1.idincidenciaestado);
				$('#calificacion_selecturgencia').val(json1.urgencia);
				$('#calificacion_selectimpacto').val(json1.impacto);
				$('#calificacion_selectprioridad').val(json1.prioridad);
				$('#calificacion_selectecnico').val(json1.tecnicoasignado);
				$('#calificacion_selecfuenteincidencia').val(json1.idincidenciafuente);
				$('#calificacion_seleclocalizacion').val(json1.idlugarincidente);
				$('#calificacion_txtareadescripcion').val(json1.descripcion);
				$('#calificacion_selectcategoria').val(json1.idcategoria);
            },
            error: function (xhr, exception) {
				alert("error");
            }
	    });
		$('#vmodalincidencia_calificacion').modal({show:true});			
	}

</script>