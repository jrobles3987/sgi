<?php 
	include("vmodalusuarios.php");
	include("vmodalusuariosingreso.php");
?>
<div class="row container col-lg-11 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-left">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Usuarios del Sistema</a></li>
				</ul>
				</div>
				<div class="pull-right" id="btn-NuevosUsuarios">
					<p>
						<a class="btn btn-primary btn-block" id="btn-NuevosUsuarios">Agregar Nuevos Usuarios</a>
					</p>                           
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_incidencias">					
					<div>
						<TABLE id="tablausuarios" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Cédula</TH><TH>Nombres</TH><TH>Email Utm</TH><TH>Rol</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($usuarios){
									foreach ($usuarios as $fila) {				
										$num++;
                                        echo '<TR id="'.$fila->cedula.'" onclick="myFunctionUsuarios(this)"><TD>'.$num.'</TD><TD>'.$fila->cedula.'</TD><TD>'.$fila->nombres.'</TD><TD>'.$fila->emailutm.'</TD><TD>'.$fila->rol.'</TD></TR>'; 
                                        //echo $fila->idpersonal;
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
	
	$('#btn-NuevosUsuarios').click(function() {
		$('#vmodalusuariosingreso').modal({show:true});
	});

	function myFunctionUsuarios(x)
	{		$('#div_loading_cargando').css('display','inline');
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url('usuario/VerificaPersonal');?>",
	            data: {cedula: x.id},
	            success: function (data) {
	            	//alert(data);
					var json1 = JSON.parse(data);
					$('#txt_cedula').val(json1[0].cedula);
					$('#txt_apellidopaterno').val(json1[0].apellido1);
                	$('#txt_apellidomaterno').val(json1[0].apellido2);
                	$('#txt_nombres').val(json1[0].nombre2);
                	$('#txt_direccion').val(json1[0].direccion);
                	$('#txt_fechanacimiento').val(json1[0].fecha_nacimiento);
                	$('#txt_email').val(json1[0].emailutm);
                	$('#select_rol').val(json1[0].idrol);
                	$('#txt_idpersonal').val(json1[0].idpersonal);
                	$('#vmodalusuarios').modal({show:true});
                	$('#div_loading_cargando').css('display','none');                	
	            },
	            error: function (xhr, exception) {
					alert("error");
	            }
		    });
	}
	$('#tablausuarios').dataTable({
		"lengthMenu": [[5, 10, 20], [5, 10, 20]]
		//responsive: true
	});
</script>