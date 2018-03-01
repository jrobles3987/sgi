<div class="row container col-lg-11 col-center">
	<!-- Formulario de creacion de Marcas -->	
	<div class="pnatallabloqueado" id="formcrearmarcas">
		<div class="ventana_adicional">	
			<div style="margin:20px"></div>
			<div class="panel panel-default panel-fade col-md-10 col-center" style="font-weight: bold">
				<div class="row" >
					<div class="col-md-7">
						<p>Crear Marcas de Equipos</p>
					</div>
				</div>
			</div>
			<div class="panel panel-default panel-fade col-md-10 col-center">
				<div style="margin:10px"></div>
		        <div class="row" >
			      	<div class="col-xs-6 col-md-8 col-center">
			        	<span>Nombre de la Marca</span>
			        	<input id="inp-CMnombredemarca" type="text" class="form-control input-md">
					</div>
			    </div>
			    <div style="margin:20px"></div>
			    <div class="row" >
				      	<div class="col-md-6" id="btn-CMguardar">
	                        <p>
	                            <a class="btn btn-primary btn-block">Guardar Datos</a>
	                        </p>
	                    </div>
	                    <div class="col-md-6" id="btn-CMcancelar">
	                        <p>
	                            <a class="btn btn-danger btn-block">Cancelar</a>
	                        </p>
	                    </div>
			    </div>
			</div>
		</div>
	</div>
	<!-- Formulario de creacion de Modelos -->
	<div class="pnatallabloqueado" id="formcrearmodelos">
		<div class="ventana_adicional">	
			<div style="margin:20px"></div>
			<div class="panel panel-default panel-fade col-md-10 col-center" style="font-weight: bold">
				<div class="row" >
					<div class="col-md-7">
						<p>Crear Modelos de Equipos</p>
					</div>
				</div>
			</div>
			<div class="panel panel-default panel-fade col-md-10 col-center">
				<div style="margin:10px"></div>
		        <div class="row" >
			      	<div class="col-xs-6 col-md-8 col-center">
			        	<span>Nombre del Modelo</span>
			        	<input id="inp-CMonombredemodelo" type="text" class="form-control input-md">
			      	</div>
			    </div>
			    <div style="margin:20px"></div>
			    <div class="row" >
				      	<div class="col-md-6" id="btn-CMoguardar">
	                        <p>
	                            <a class="btn btn-primary btn-block">Guardar Datos</a>
	                        </p>
	                    </div>
	                    <div class="col-md-6" id="btn-CMocancelar">
	                        <p>
	                            <a class="btn btn-danger btn-block">Cancelar</a>
	                        </p>
	                    </div>
			    </div>						   						   
			</div>
		</div>
	</div>
	<!-- Formulario de guardando -->
	<div class="loading_iniciosesion" id="div_loading" style="display: none">
        <div class="loading_background">
            <img class="img_loading" src="<?=base_url('plantilla/dist/img/loading.gif') ?>"/>
            <p class="txt_loading">Guardando Datos espere...</p>
        </div>            
    </div>
    <!-- Formulario de creacion de Equipos -->
	<div class="col-md-12">
		<div class="panel panel-default panel-fade">
			<div class="panel-heading">
				<span class="panel-title">
					<div class="pull-left">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Ingreso de Equipos</a></li>
					</ul>
					</div>
					<div class="clearfix"></div>
				</span>
			</div>

			<div class="panel-body">
				<div class="panel panel-default panel-fade col-md-8 col-center">
			        <div style="margin: 10px">
				        <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Tipo de Equipo</span>
					        	<select id="selecttipoequipo" class="form-control" autofocus>
							      	<option value="0">Seleccione el Tipo de Equipo...</option>
							      	<?php
							      		foreach ($tiposbienes as $i) {
							      			echo '<option value="'.$i->idtipobien.'">'.$i->nombretipobien.'</option>';
							      		}
							      	?>
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>*Codigo Equipo</span>
					        	<input id="codequipo" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
					      	</div>
					    </div>
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Familia del Equipo</span>
					        	<select id="selectequipo" class="form-control" disabled="true">
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>*Serial de Inventario</span>
					        	<input id="codequipoinventario" type="text" class="form-control input-md" title="Codigo del equipo asignado en Bodega">
					      	</div>
					    </div>
						
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Subfamilia del Equipo</span>
					        	<select id="selectsubequipo" class="form-control" disabled="true">
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					            <div class="form-group">
					            	<span>*Fecha de Ingreso del Equipo</span>
					                <div class="input-group date">
					                    <input type="text" class="form-control" id="fechaingreso" readonly="readonly">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>
					    </div>

						<div class="row" >
							<div class="col-xs-4 col-md-6">
						<span>*Precio Compra</span>
					    <input id="codequipo" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
							</div>
						
							<div class="col-xs-4 col-md-6">
						<span>*Vida util</span>
					    <input id="codequipo" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
							</div>
						</div>
					
						<div class="row" >
						<div class="col-xs-4 col-md-6">
						<span>*Garantia</span>
					    <input id="codequipo" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
							</div>
						</div>

					    <div class="row" >
					    	<div class="col-xs-6 col-md-12">
					      		<span>*Localización</span>
					        	<select id="selectlocalizacion" class="form-control">
					        		<option value="0">Seleccione la localización del Equipo...</option>
					        		<option value="1">Bodega</option>
					        		<option value="2">Departamento de Rectorado</option>
					        		<option value="3">Facultad de Ciencias Informáticas</option>
					        		<option value="4">Facultad de Ciencias Administrativas y económicas</option>
							    </select>
					      	</div>
					    </div>
				    </div>
	          	</div>
	          	<div style="margin:5px"></div>
	          	<div class="panel panel-default panel-fade col-md-10 col-center" style="display:none;">	          
			        <div style="margin: 10px">
				        <div class="row">
					      	<div class="col-xs-4 col-md-6">
					      		<span>Marca de Equipos</span>
					        	<div>
					        		<div class="col-md-10">
							        	<select id="selectmarca" class="form-control">
									      	<option value="0">Seleccione la Marca del Equipo...</option>
									      	<?php
									      		foreach ($marcas as $m) {
									      			echo '<option value="'.$m->idmarca.'">'.$m->nombremarca.'</option>';
									      		}							      		
									      	?>
									    </select>
									</div>
								    <div class="col-md-2" id="btn-creamarcas" title="Agregar nuevas marcas de equipos">
				                        <p>
				                            <a class="btn btn-info">+</a>
				                        </p>
				                    </div>
				                </div>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>Modelos de Equipos</span>
					        	<div>
					        		<div class="col-md-10">
							        	<select id="selectmodelo" class="form-control" disabled="true">
									    </select>
									</div>
								    <div class="col-md-2" id="btn-creamodelos" title="Agregar nuevos modelos de equipos" style="display: none">
				                        <p>
				                            <a class="btn btn-info">+</a>
				                        </p>
				                    </div>
				                </div>
					      	</div>
					    </div>
					    <div class="row">
					      	<div class="col-xs-4 col-md-12">
					      		<span>Descripción</span>
					        	<textarea class="form-control" id="txtareadescripcion" rows="3" style="resize: none;"></textarea>
					      	</div>
					    </div>						   
				    </div>
	          	</div>
	          	<div style="margin:5px"></div>
	          	<div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-3" id="btn-guardar-equipo">
                        <p>
                            <a class="btn btn-primary btn-block">Guardar Datos</a>
                        </p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('plantilla/dist/js/menuingresoactivos.js');?>"></script>
<script>
	$(document).ready(function() {
		
		//variables del formulario
		var dataform

		//// Funcion valodar formulario
		function validar_formulario(){
			
			var retorno;
			var numtipobien = document.getElementById("selecttipoequipo").length;
			var numfamiliabien = document.getElementById("selectequipo").length;
			var numsubfamiliabien = document.getElementById("selectsubequipo").length;
			
			dataform = {
				nombreequipo: $('#selecttipoequipo option:selected').html(),
				idmarca: $('#selectmarca').val(),
				idmodelo: $('#selectmodelo').val(),
				idtipobien: $('#selecttipoequipo').val(),
				idfamiliabien: $('#selectequipo').val(),
				idsubfamiliabien: $('#selectsubequipo').val(),
				fechaingreso: $('#fechaingreso').val(),
				descripcion: $('#txtareadescripcion').val(),
				codigoequipo: $('#codequipo').val(),
				codigoinventario: $('#codequipoinventario').val(),
				idlugarequipo: $('#selectlocalizacion').val()
			}

			if ( dataform["idmarca"]==0 || !dataform["idmarca"]) {
				dataform["idmarca"] = "null";
			}

			if ( dataform["idmodelo"]==0 || !dataform["idmodelo"]) {
				dataform["idmodelo"] = "null";
			}

			if ( dataform["descripcion"]=="" || !dataform["descripcion"]) {
				dataform["descripcion"] = "null";
			}

			if ( numtipobien > 1 && dataform["idtipobien"] != 0 ) {
				if (numfamiliabien > 1) {
					if ( dataform["idfamiliabien"] != 0 ) {
						if (numsubfamiliabien > 1) {
							if ( dataform["idsubfamiliabien"] != 0 ) {
								dataform["nombreequipo"] = $('#selectsubequipo option:selected').html();
								retorno = true;
							}else{
								retorno = false;
							}
						}else{
							dataform["idsubfamiliabien"] = "null";
							dataform["nombreequipo"] = $('#selectequipo option:selected').html();
							retorno = true;
						}
					}else{
						retorno = false;					
					}
				}else{
					dataform["idfamiliabien"] = "null";
					dataform["idsubfamiliabien"] = "null";
					dataform["nombreequipo"] = $('#selecttipoequipo option:selected').html();
					retorno = true;
				}
			}else{
				retorno = false;
			}
			
			if (retorno) {
				if ( dataform["codigoequipo"] != "" ) {
					if ( dataform["codigoinventario"] != "" ) {
						if ( dataform["fechaingreso"] != "" ) {
							if ( dataform["idlugarequipo"] != 0 ) {
								retorno = true;
							}else{
								retorno = false;
							}
						}else{
							retorno = false;
						}
					}else{
						retorno = false;
					}
				}else{
					retorno = false;
				}
			}

			return retorno;
		}

		///// COMBO TIPO BIEN	
		$('#selecttipoequipo').change(function(){		
			$('#selecttipoequipo option:selected').each(function(){
				idtipobien= $('#selecttipoequipo').val();
				$.post("<?php echo base_url('bienes/listarfamiliasbienesequipos');?>", {
					idTipoBien: idtipobien
				}, function(data){
					$("#selectequipo").html(data);
					if(document.getElementById("selectequipo").length>1){					
						$("#selectsubequipo").html('<option value="0"></option>');
						document.getElementById("selectequipo").disabled=false;
						document.getElementById("selectsubequipo").disabled=true;
					}else{
						$("#selectequipo").html('<option value="0"></option>');
						$("#selectsubequipo").html('<option value="0"></option>');
						document.getElementById("selectequipo").disabled=true;
						document.getElementById("selectsubequipo").disabled=true;
					}
				});
			});
		});
		///// COMBO FAMILIA TIPO BIEN
		$('#selectequipo').change(function(){
			$('#selectequipo option:selected').each(function(){
				idfamiliabien= $('#selectequipo').val();
				$.post("<?php echo base_url('bienes/listarsubfamiliasbienes');?>", {
					idFamiliaBien: idfamiliabien
				}, function(data){
					$("#selectsubequipo").html(data);
					if(document.getElementById("selectsubequipo").length>1){
						document.getElementById("selectsubequipo").disabled=false;
					}else{
						$("#selectsubequipo").html('<option value="0"></option>');
						document.getElementById("selectsubequipo").disabled=true;
					}
				});
			});
		});

		///// COMBO MARCA
		$('#selectmarca').change(function(){
			$('#selectmarca option:selected').each(function(){
				idmarca= $('#selectmarca').val();
				$.post("<?php echo base_url('marcasequipos/ListarEquiposModelos');?>", {
					idMarcaseleccionada: idmarca
				}, function(data){
					$("#selectmodelo").html(data);
					if(document.getElementById("selectmodelo").length>1){
						document.getElementById("selectmodelo").disabled=false;
						$("#btn-creamodelos").css('display','inline');
					}else{
						if (idmarca!=0) {
							$("#selectmodelo").html('<option value="0"></option>');
							document.getElementById("selectmodelo").disabled=true;
							$("#btn-creamodelos").css('display','inline');
						}else{
							$("#selectmodelo").html('<option value="0"></option>');
							document.getElementById("selectmodelo").disabled=true;
							$("#btn-creamodelos").css('display','none');
						}
					}				
				});
				//$("#txtareadescripcion").val($("#txtareadescripcion").val()+' fb.idfamiliabien <> '+idfamiliabien+' and \n');
			});
		});

		//ABRIR FORMULARIO DE MARCAS
		$('#btn-creamarcas').click(function() {
			$('#formcrearmarcas').toggle('slow');
		});
		$('#btn-CMcancelar').click(function() {
			$('#formcrearmarcas').css('display','none');
		});	

		//ABRIR FORMULARIO DE MODELOS
		$('#btn-creamodelos').click(function() {
			$('#formcrearmodelos').toggle('slow');
			$('#inp-CMnombredemodelo').val('');
		});
		$('#btn-CMocancelar').click(function() {
			$('#formcrearmodelos').css('display','none');
		});
		
		//GUARDAR MARCAS NUEVAS
		$('#btn-CMguardar').click(function() {
			var nombremarca = $('#inp-CMnombredemarca').val();
			$('#div_loading').css('display','inline');
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url('marcasequipos/GuardarEquiposMarcas');?>",
	            data: {NombreMarca: nombremarca},
	            success: function (data) {
	                var json = JSON.parse(data);
	                $('#div_loading').css('display','none');
	                if (json.res == "t") {
	                	$('#inp-CMnombredemarca').val("");
	                    $('#formcrearmarcas').css('display','none');
	                    sweetAlert("", "Datos guardados!", "success");
	                }else{
	                    if (json.res == "error"){
	                		swal("","El nombre de la Marca esta vacio","info");
	                	}else{
	                		swal("","Ocurrio un error al guardar!","error");
	                	}
	                }
	            	$.post("<?php echo base_url('marcasequipos/ListarEquiposMarcas');?>"
					, function(data){
						$("#selectmarca").html(data);
					});
	            },
	            error: function (xhr, exception) {
	            }
		    });		
		});
		
		//GUARDAR MODELOS NUEVOS
		$('#btn-CMoguardar').click(function() {
			var idmarca = $('#selectmarca').val();
			var nombremodelo = $('#inp-CMonombredemodelo').val();
			$('#div_loading').css('display','inline');
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url('marcasequipos/GuardarEquiposModelos');?>",
	            data: {IdMarca: idmarca, NombreModelo: nombremodelo},
	            success: function (data) {
	                var json = JSON.parse(data);
	                $('#div_loading').css('display','none');
	                if (json.res == "t") {
	                	$('#inp-CMonombredemodelo').val("");
	                    $('#formcrearmodelos').css('display','none');
	                    sweetAlert("", "Datos guardados!", "success");
	                }else{
	                	if (json.res == "error"){
	                		swal("","El nombre del Modelo esta vacio","info");
	                	}else{
	                		swal("","Ocurrio un error al guardar!","error");
	                	}                    
	                }            	
	            	$.post("<?php echo base_url('marcasequipos/ListarEquiposModelos');?>", {
						idMarcaseleccionada: idmarca
					}, function(data){
						document.getElementById("selectmodelo").disabled=false;
						$("#selectmodelo").html(data);
					});
	            },
	            error: function (xhr, exception) {
	            }
		    });
		});			

		//GUARDAR EQUIPOS
		$('#btn-guardar-equipo').click(function() {
			if(validar_formulario()){										
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('equipo/GuardarEquipos');?>",
		            data: dataform,
		            success: function (data) {	            	
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
		                	swal({
							  title: "",
							  text: "Datos Guardados\n Desea ingresar un nuevo equipo con las mismas características",
							  type: "success",
							  showCancelButton: true,
							  confirmButtonText: "Si",
							  cancelButtonText: "No",
							  closeOnConfirm: true,
							  closeOnCancel: true
							},
							function(isConfirm){
							  if (!isConfirm) {
							  	location.reload(true);
							    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
							  }
							});

		                }else{
		                	swal("","Ocurrio un error al guardar!","error");
		                }
		            },
		            error: function (xhr, exception) {
		            }
		        });
			}else{
				swal("","Debe llenar los campos que son obligatorios","info");
			}
		});
	});
</script>