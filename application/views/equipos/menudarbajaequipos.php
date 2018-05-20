<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_incidencias">
					<div class="panel panel-default col-md-6 col-center" style="padding: 1px,1px,1px,1px">
					    <center><B>Dar de Baja a equipos</B><center/>
					</div>
					<div id="tablaequiposregistrados">
						<TABLE id="tablaequipos" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Descripción</TH><TH>Codigo Equipo</TH><TH>Codigo Inventario</TH><TH>Garantia</TH><TH>Valor compra</TH><TH>Fecha Compra</TH><TH>Fecha Ingreso</TH><TH>Estado</TH><TH>Acción</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($lista_equipos){
									foreach ($lista_equipos as $fila) {
										$num++;
										echo '<TR id="'.$fila->idequipo.'"><TD>'.$num.'</TD><TD>'.$fila->descripcion.'</TD><TD>'.$fila->codigoequipo.'</TD><TD>'.$fila->codinventario.'</TD><TD>'.$fila->garantia.'</TD><TD>'.$fila->valorcompra.'</TD>
										<TD>'.$fila->fechacompra.'</TD><TD>'.$fila->fechaingreso.'</TD><TD>'.$fila->estado_equipo.'</TD><TD><div onclick="Dardebajaequipo('.$fila->idequipo.')"><a class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-cloud-download"></span> Dar de Baja</a></div></TD></TR>';
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

    function Dardebajaequipo(idEquipo)
	{	
        swal({
            title: "",
            text: "Dar de Baja a equipo \n Desea Desea realmente dar de baja al equipo...",
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
                    url: "<?php echo base_url('equipo/DardeBajaEquipos');?>",
                    data: {idEquipo: idEquipo},
                    success: function (data) {
                        var json1 = JSON.parse(data);
                        if (json1 == true){
                            toastr.success("Equipo dado de Baja","Hecho",{
                                "timeOut": "5000",
                                "extendedTImeout": "5000",
                                "closeButton": true,
                                "positionClass": "toast-bottom-left"
                            });
                            ReDibujaTablaEquiposDeBaja();
                        }else{
                            toastr.error("Ocurrio un error al dar de Baja al equipo","Error",{
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

    function ReDibujaTablaEquiposDeBaja () {
        $('#div_loading_cargando').css('display','inline');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('equipo/ReDibujaTablaEquiposDeBaja');?>",
            success: function (data) {
                document.getElementById("tablaequiposregistrados").innerHTML = "";
                document.getElementById("tablaequiposregistrados").innerHTML = data;
                $('#tablaequipos').dataTable({
                    "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]]
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
</script>
