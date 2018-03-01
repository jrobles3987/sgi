<!-- Formulario de creacion de Incidencia -->
<div class="row container col-lg-12 col-center">
		<div class="panel panel-default panel-fade">
			<div class="panel-heading">
				<span class="panel-title">
					<div class="pull-left">
						<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Ingreso de Incidentes</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</span>
			</div>

			<div class="panel-body">
				<div class="panel panel-default panel-fade col-md-10 col-center">

               		 <div class="row">
					      	<div class="col-xs-4 col-md-8 col-center">
					      		<span>* Titulo de la incidencia</span>
					        	<textarea class="form-control" id="txttituloincidencia2" rows="1" style="resize: none;" autofocus></textarea>
					      	</div>
					</div>
					<div  class="row">
						<div class="col-xs-4 col-md-8  col-center">
							<span>* Categoria de la incidencia</span>
							<select id="selectcategoria2" class="form-control">
							<option value="0">Seleccione la categoria de la incidencia...</option>
								<?php
									foreach ($incidencias_categorias as $c) {
										echo '<option value="'.$c->idcategoria.'">'.$c->nombre.'</option>';
									}
								?>
							</select>
					    </div> 
					</div>

				<div class="row">
					<div class="col-xs-4 col-md-4">
					<span>* Fecha de apertura</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechaapertura2" readonly="readonly" value= "<?php echo date("d/m/Y");?>">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>

					<div class="col-xs-4 col-md-4">
					<span>* Fecha vencimiento</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechavencimiento2" readonly="readonly"/>
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>
				</div>
                
                         <div class="row" >
					    	<div class="col-xs-4 col-md-6">
					      		<span>* Estado incidencia</span>
					        	<select id="selectestado2" class="form-control">
								<option value="0">Seleccione el estado de la incidencia...</option>
									<?php
							      		foreach ($incidencia_estados as $k) {
							      			echo '<option value="'.$k->idincidenciaestado.'">'.$k->estado.'</option>';
							      		}
							      	?>
							    </select>
					         </div>
					      	<div class="col-xs-4 col-md-6">
                              <span>* Urgencia</span>
                              <select id="selecturgencia2" class="form-control">
                                  <option value="0">Seleccione la urgencia de incidencia...</option>
                                  	<?php
										foreach ($incidencia_necesidades as $l) {
											echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
										}
									?>
                                  </select>	</div>
					    </div>
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
                              <span>* Impacto</span>
                              	<select id="selectimpacto2" class="form-control">
                                  <option value="0">Seleccione impacto incidencia...</option>
                                  	<?php
										foreach ($incidencia_necesidades as $l) {
											echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
										}
									?>
                                </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
                              <span>* Prioridad</span>
                              <select id="selectprioridad2" class="form-control">
                              <option value="0">Seleccione la prioridad de la incidencia...</option>
                              	<?php
									foreach ($incidencia_necesidades as $l) {
										echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
									}
								?>
                              </select>
                              </div>
					    </div>
					    <div class="row" >					      	
					      	<div class="col-xs-4 col-md-6">
                              <span>* Fuente incidencia</span>
                              <select id="selectfuenteincidencia2" class="form-control"autofocus>
                                  <option value="0">Seleccione la fuente de la incidencia...</option>
                                  <?php
                                        foreach ($incidencia_fuente as $j) {
											$seleccionado_fuente = '';
											if ($j->idincidenciafuente == 1){
												$seleccionado_fuente = 'selected';
											}
                                            echo '<option value="'.$j->idincidenciafuente.'" '.$seleccionado_fuente.'>'.$j->nombre.'</option>';
                                        }
                                    ?>
                              </select>
					        </div>
					    </div>
						<div class="row">
							<div class="col-xs-4 col-md-6">
                              <span>* Técnico Asignado</span>
							  <select id="selectecnico2" class="form-control">
                              <option value="0">Seleccione el Técnico...</option>
                              	<?php
									foreach ($incidencia_tecnicos as $t) {
										echo '<option value="'.$t->idpersonal.'">'.$t->nombres.'</option>';
									}
								?>
                              </select>
					      	</div>
						</div>
					    <div class="row" >
					    	<div class="col-xs-6 col-md-12">
					      		<span>* Localizacion</span>
					        	<select id="selectlocalizacion2" class="form-control">
					        		<option value="0">Seleccione la localizacion incidencia...</option>
					        		<option value="1">Bodega</option>
					        		<option value="2">Departamento de Rectorado</option>
					        		<option value="3">Facultad de Ciencias Informticas</option>
					        		<option value="4">Facultad de Ciencias Administrativas y econmicas</option>
							    </select>
					      	</div>
					    </div>
						<div style="margin:10px"></div>
                        <div class="row">
					      	<div class="col-xs-4 col-md-12">
					      		<span>* Descripcion</span>
					        	<textarea class="form-control" id="txtareadescripcion2" rows="2" style="resize: none;"></textarea>
					        	<div style="margin:10px"></div>
					      	</div>
					    </div>	
				    </div>
	          	</div>
          	<div style="margin:10px"></div>
	          	<div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-3" id="btn-guardar-incidencia">
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
<script >
	$(document).ready(function() {		
		//variables del formulario
		var dataform
		//// Funcion valodar formulario
		function validar_formulario(){
			
			var retorno = true;
			var muntitulo= $('#txttituloincidencia2').val();
			var munfechavencimiento =$('#fechavencimiento2').val();
			var munincidenciaestado = document.getElementById("selectestado2").length;
			var munurgencia = document.getElementById("selecturgencia2").length;
			var munimpacto = document.getElementById("selectimpacto2").length;
			var munprioridad = document.getElementById("selectprioridad2").length; 
			var muntecnicoasignado = document.getElementById("selectecnico2").length;
			var munidincidenciafuente = document.getElementById("selectfuenteincidencia2").length; 
			var munidlocalizacion= document.getElementById("selectlocalizacion2").length;
			var munidcategorias= document.getElementById("selectcategoria2").length;
			var mundes = $('#txtareadescripcion2').val();
			dataform = {
				//llenar con los campos que estan en la bd 
				tituloincidencia: $('#txttituloincidencia2').val(),
				fechaapertura: $('#fechaapertura2').val(),
				fechavencimiento: $('#fechavencimiento2').val(),
				//fechaaceptacion: $('#fechaaceptacion').val(),
				//fechaaprovacion: $('#fechaaprovacion').val(),
				incidenciaestado: $('#selectestado2').val(),
				urgencia: $('#selecturgencia2').val(),
				impacto: $('#selectimpacto2').val(),
				prioridad: $('#selectprioridad2').val(),
				tecnicoasignado: $('#selectecnico2').val(),
				idincidenciafuente: $('#selectfuenteincidencia2').val(),
				idlocalizacion: $('#selectlocalizacion2').val(),
				idcategorias: $('#selectcategoria2').val(),
				descripcion: $('#txtareadescripcion2').val()
			}

			if ( dataform["muntituloincidencia"]=="" || !dataform["tituloincidencia"]) {
				dataform["muntituloincidencia"] ="null";
			}

			if ( dataform["munfechavencimiento"]=="" || !dataform["fechavencimiento"]) {
				dataform["munfechavencimiento"] ="null" ;
			}

			if ( munincidenciaestado > 1 && dataform["incidenciaestado"] == 0 ) {
				dataform["munincidenciaestado"] ="null";
			}						

			if ( munurgencia > 1 && dataform["urgencia"] == 0 ) {
				dataform["munurgencia"] ="null";
			}
			
			if ( munimpacto > 1 && dataform["impacto"] == 0 ) {
				dataform["munimpacto"]="null" ;
			}

			if ( munprioridad > 1 && dataform["priodidad"] == 0 ) {
				dataform["prioridad"] ="null";
			}

			if ( muntecnicoasignado > 1 && dataform["tecnicoasignado"] == 0 ) {
				dataform["muntecnicoasignado"] ="null";
			}

			if (munidincidenciafuente > 1 && dataform["idincidenciafuente"] == 0 ) {
					dataform["munidincidenciafuente"] ="null";
			}

			if (munidlocalizacion > 1 && dataform["idlocalizacion"] == 0 ) {
				dataform["munidlocalizacion"] ="null";
			}

			if ( dataform["mundescripcion"]=="" || !dataform["descripcion"]) {
				dataform["mundescripcion"] ="null";
			}

			if (retorno) {
				if ( dataform["fechavencimiento"] != "''" ) {
					if ( dataform["incidenciaestado"] != 0 ) {
						if ( dataform["urgencia"] != 0 ) {
							if ( dataform["impacto"] != 0 ) {
								if ( dataform["prioridad"] != 0 ) {
     								if ( dataform["tecnicoasignado"] != 0 ) {
										if ( dataform["idincidenciafuente"] != 0 ) {
											if ( dataform["idlocalizacion"] != 0 ) {
												if ( dataform["descripcion"] !="''" ) {
													if ( dataform["idcategorias"] != 0 ) {
														retorno = true;
													}else{
														retorno =false;
													}
												}else{
													retorno =false;
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
				}else{
					retorno = false;
	 			}
			}
			else{
				retorno = false;
		 	}
			return retorno;			
		}
	
		$('#btn-guardar-incidencia').click(function() {
			if(validar_formulario()){										
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('incidencias/guardarincidencias');?>",
		            data: dataform,
		            success: function (data) {
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
							sweetAlert("", "Datos guardados!", "success");
							//setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000);
							
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
