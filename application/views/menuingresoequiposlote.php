
<div class="row container col-lg-11 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-left">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Ingreso de equipos en Lote</a></li>
				</ul>
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div id="formsubida">
				<form id="form_subidas" action="<?php echo base_url('equipo/SubirEquiposArchivos');?>" method="POST" class="form-horizontal">
					<div class="row col-sm-12 col-center">
						<div class="row col-sm-12 col-center"><span>Debe de subir un archivo en  CSV</span></div>
						<div style="margin:10px"></div>
						<div class="row col-sm-12 col-center">
							<input id="csv" name="csv" type="file" accept=".csv">
						</div>
						<div style="margin:20px"></div>
						<div class="col-md-12" id="btn-subirdatos">
		                    <p><a class="btn btn-primary btn-block">Cargar Archivo</a></p>
		                </div>
		                <!--div>
		                	<input type="submit" value="Subir">
		                </div-->
		                <div style="margin:40px"></div>
		                <div class="row row col-lg-12 col-center" id="respuesta"></div>
					</div>			
				</form>
			</div>
			<div class="row col-sm-12 col-center" id="formimportacion" style="display:none">
				<div class="col-md-3" id="btn-importardatos">
                    <p><a class="btn btn-primary btn-block">Subir Datos</a></p>
                </div>
				<div class="row" id="tablarespuesta"></div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$("#btn-subirdatos").click(function(e){

		});
		$("#btn-subirdatos").click(function(e){
			e.preventDefault();
			var archivo = $('#csv').val();
			var comprobar = $('#csv').val().length;
			var extensiones = archivo.substring(archivo.lastIndexOf("."));
			var url = "<?php echo base_url('equipo/SubirEquiposArchivos');?>";
			var formdata = new FormData($("#form_subidas")[0]);
			if(comprobar>0){
				if(extensiones == ".csv"){
					$.ajax({
						url: url,
						type: 'POST',
						data:formdata,
						contentType:false,
						processData:false,
						cache:false,
						beforeSend : function (){						
							$('#respuesta').html('<center><img src="../plantilla/dist/img/cargando.gif" width="50" heigh="50"></center>');						
						},
						success: function(data){						
							if(data == 'OK'){
								$.ajax({
									url:  "<?php echo base_url('equipo/TablaEquiposSubidosTemp');?>",
									type: "POST",
									data: "",
									contentType:false,
									processData:false,
									cache:false,
									success: function(data){
										$('#formsubida').css({"display":"none"});
										$('#formimportacion').css({"display":"block"});
										$('#tablarespuesta').html(data);
										return false;
									}	
								});
							}else{
								$('#respuesta').html('<label style="padding-top:10px; color:red;">Error en la importacion del CSV</label>');
								return false;
							}
						}
					});
				}else{
					swal("","El archivo seleccionado no es de tipo CSV...","error");				
					return false;
				}
			}else{				
				swal("","Debe elegir un archivo CSV para continuar...","info");				
				return false;
			}
		});
	});
</script>