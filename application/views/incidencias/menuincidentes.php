<?php include("Vmodalincidencia_editar.php");?>
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
					<div id="tablaincidencia">
						<TABLE id="tablaincidencias" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Estado</TH><TH>Fecha Apertura</TH><TH>Prioridad</TH><TH>Solicitante</TH><TH>Asignado A:</TH><TH>Ultima Modificacion</TH><TH>Fecha Vencimiento</TH><TH>Acción</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($incidentes_todos){
									foreach ($incidentes_todos as $fila) {
										$num++;
										echo '<TR id="'.$fila->idincidencias.'"><TD>'.$num.'</TD><TD>'.$fila->tituloincidencia.'</TD><TD>'.$fila->estado.'</TD><TD>'.$fila->fechaapertura.'</TD><TD>'.$fila->prioridad.'</TD><TD>'.$fila->usuariocreador.'</TD>
										<TD>'.$fila->tecnicoasignado.'</TD><TD>'.$fila->ultimamodificacion.'</TD><TD>'.$fila->fechavencimiento.'</TD>
										<TD>
											<div class="row col-center">
											<div class="col-xs-1 col-sm-1" onclick="EditarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span></a></div>
											<div class="col-xs-1 col-sm-1"></div>
											<div class="col-xs-1 col-sm-1" onclick="EliminarIncidencia('.$fila->idincidencias.')"><a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div>
											</div>
										</TD>
										</TR>'; 
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

	function EditarIncidencia(x){
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/mostrarincidentes');?>",
            data: {idincidencia: x},
            success: function (data) {
				var json1 = JSON.parse(data);
				$('#txtidincidencia_editar').val(x);
				$('#txttituloincidencia_editar').val(json1.tituloincidencia);
				$('#fechaapertura_editar').val(json1.fechaapertura);
				$('#fechavencimiento_editar').val(json1.fechavencimiento);
				$('#selectestado_editar').val(json1.idincidenciaestado);
				$('#selecturgencia_editar').val(json1.urgencia);
				$('#selectimpacto_editar').val(json1.impacto);
				$('#selectprioridad_editar').val(json1.prioridad);
				$('#selectecnico_editar').val(json1.tecnicoasignado);
				$('#selecfuenteincidencia_editar').val(json1.idincidenciafuente);
				$('#selectlocalizacion_editar').val(json1.idlugarincidente);
				$('#txtdescripcion_editar').val(json1.descripcion);
				$('#selectcategoria_editar').val(json1.idcategoria);
            },
            error: function (xhr, exception) {
				alert("error");
            }
	    });
		$('#vmodalincidencia_editar').modal({show:true});		
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

	function ReDibujaTablaIncidenciasNuevas () {
        $('#div_loading_cargando').css('display','inline');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/ReDibujaTablaIncidencias');?>",
            success: function (data) {
                document.getElementById("tablaincidencia").innerHTML = "";
                document.getElementById("tablaincidencia").innerHTML = data;
                $('#tablaincidencias').dataTable({
                    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
                });
            },
            complete : function(xhr, status) {
                $('#div_loading_cargando').css('display','none');
            },
            error: function (xhr, exception) {
                alert("error");
                $('#div_loading_cargando').css('display','none');
            }
        });
	}
	
	function EliminarIncidencia(x){
		swal({
            title: "",
            text: "Eliminar Incidencia \n Desea realmente eliminar la incidencia...",
            type: "info",
            showCancelButton: true,
            confirmButtonText: "Si",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                //alert(idEquipo);
                $('#div_loading_cargando').css('display','inline');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('incidencias/EliminarIncidenciasNormal');?>",
                    data: {idIncidencia: x},
                    success: function (data) {
                        var json1 = JSON.parse(data);
                        if (json1 == true){
                            toastr.success("Incidencia Eliminada","Hecho",{
                                "timeOut": "5000",
                                "extendedTImeout": "5000",
                                "closeButton": true,
                                "positionClass": "toast-bottom-left"
                            });
                            ReDibujaTablaIncidenciasNuevas();
                        }else{
                            toastr.error("Ocurrio un error al eliminar la incidencia","Error",{
                                "timeOut": "5000",
                                "extendedTImeout": "5000",
                                "closeButton": true,
                                "positionClass": "toast-bottom-left"
                            });
                        }
                    },
                    complete : function(xhr, status) {
		                $('#div_loading_cargando').css('display','none');
		            },
                    error: function (xhr, exception) {
                        alert("error");
                        $('#div_loading_cargando').css('display','none');
                    }
                });
            }
        });    	
	}

</script>