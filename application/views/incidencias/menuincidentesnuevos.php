<!-- Formulario de creacion de Incidencia -->
<div class="row container col-md-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-body">
			<div class="panel panel-default col-md-9 col-center" style="padding: 1px,1px,1px,1px">
			    <center><B>Ingreso de nuevas inidencias</B><center/>
			</div>
			<div style="margin:10px"></div>
			<div class="panel panel-default panel-fade col-md-10 col-center">				
				<div style="margin:10px"></div>
           		 <div class="row">
				      	<div class="col-xs-4 col-md-8 col-center">
				      		<span>* Titulo de la incidencia</span>
				        	<textarea class="form-control" id="txttituloincidencia2" rows="1" style="resize: none;" autofocus></textarea>
				      	</div>
				</div>
				<div  class="row">
					<div class="col-xs-4 col-md-8  col-center">
						<span>* Categoria de la incidencia</span>
						<select id="selectcategoria2" class="form-control select2js" style="width: 100%;">
						<option value="0">Seleccione la categoria de la incidencia...</option>
							<?php
								foreach ($incidencias_categorias as $c) {
									echo '<option value="'.$c->idcategoria.'">'.$c->nombre.'</option>';
								}
							?>
						</select>
				    </div> 
				</div>
				<div style="margin:10px"></div>
				<div class="row">
					<div class="col-xs-4 col-md-6">
						<span>* Fecha de Apertura y Vencimiento</span>
						<div class="input-group daterangeico">
		                  	<input type="text" class="form-control pull-right daterange" align="center" id="fechainicio-fechafin" readonly="readonly">
		                  	<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>	
		                </div>
		            </div>
		            <div class="col-xs-4 col-md-6">
			      		<span>* Estado incidencia</span>
			        	<select id="selectestado2" class="form-control">
							<option value="0">Seleccione el estado de la incidencia...</option>
							<?php
					      		foreach ($incidencia_estados as $k) {
					      			$seleccionado_estado = '';
									if ($k->idincidenciaestado == 1){
										$seleccionado_estado = 'selected';
									}
					      			echo '<option value="'.$k->idincidenciaestado.'" '.$seleccionado_estado.'>'.$k->estado.'</option>';
					      		}
					      	?>
					    </select>
			        </div>
					<div class="col-xs-4 col-md-4" style="display:none;">
						<span>* Fecha de apertura</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechaapertura2" readonly="readonly" value= "<?php echo date("d/m/Y");?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>
					<div class="col-xs-4 col-md-4" style="display:none;">
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
                      <span>* Urgencia</span>
                      <select id="selecturgencia2" class="form-control">
                          <option value="0">Seleccione la urgencia de incidencia...</option>
                          	<?php
								foreach ($incidencia_necesidades as $l) {
									$seleccionado_urgencia = '';
									if ($l->idnecesidad == 3){
										$seleccionado_urgencia = 'selected';
									}
									echo '<option value="'.$l->idnecesidad.'" '.$seleccionado_urgencia.'>'.$l->nombre.'</option>';
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
									$seleccionado_urgencia = '';
									if ($l->idnecesidad == 3){
										$seleccionado_urgencia = 'selected';
									}
									echo '<option value="'.$l->idnecesidad.'" '.$seleccionado_urgencia.'>'.$l->nombre.'</option>';
								}
							?>
                      	</select>
                    </div>
				</div>
				<div class="row" >
			      	<div class="col-xs-4 col-md-6">
	                  <span>* Impacto</span>
	                  	<select id="selectimpacto2" class="form-control">
	                      <option value="0">Seleccione impacto incidencia...</option>
	                      	<?php
								foreach ($incidencia_necesidades as $l) {
									$seleccionado_urgencia = '';
									if ($l->idnecesidad == 3){
										$seleccionado_urgencia = 'selected';
									}
									echo '<option value="'.$l->idnecesidad.'" '.$seleccionado_urgencia.'>'.$l->nombre.'</option>';
								}
							?>
	                    </select>
			      	</div>
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
			      	<div class="col-xs-4 col-lg-8">
                      <span>* Tecnico asignado</span>
                      <select id="selectecnico2" class="form-control ">
                      		<option value="0">Seleccione un técnico...</option>
                          	<?php
					    		foreach ($incidencia_tecnicos as $k) {
					    			echo '<option value="'.$k->idpersonal.'">'.$k->nombres.'</option>';
					    		}
					    	?>
                      </select>
			      	</div>			      	
				</div>
				<div class="row">
					<div class="col-xs-4 col-md-12">
                      <span>Localización</span>
                      <select id="selectlocaliazcion2" class="form-control ">
                          <?php
                                foreach ($incidencia_fuente as $j) {
                                    echo '<option value="'.$j->idincidenciafuente.'">'.$j->nombre.'</option>';
                                }
                            ?>
                      </select>
			        </div>
				</div>
                <div class="row">
			      	<div class="col-xs-4 col-md-11">
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
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
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

	$('#selectecnico2').change(function(){
		$('#selectecnico2 option:selected').each(function(){
			idpersonal= $('#selectecnico2').val();
			$.post("<?php echo base_url('incidencias/MostrarTrabajosActivosTecnico');?>", {
				idpersonal: idpersonal
			}, function(data){
				if(data){
					$.post("<?php echo base_url('incidencias/MostrarCalificacionTrabajosTecnico');?>", {
						idpersonal: idpersonal
					}, function(data2){
						if(data2){
							var json1 = JSON.parse(data);
							var json2 = JSON.parse(data2);
							if (json1.incidencias_activas != null){
								msj1 = 'El técnico tiene '+json1.incidencias_activas+' trabajos asignados.';
							}
							if (json2.calificacionusuario != null) {
								msj2 = 'Promedio de nivel de satisfacción de usuarios para incidencias resueltas: '+json2.calificacionusuario+'/10';
							}else{
								msj2 = 'El técnico no tiene calificaciones de usuarios para las incidencias resueltas.';
							}
							
							// var canDismiss = false;
							// var notification = alertify.success(msj1+' \n'+msj2);							
							// notification.ondismiss = function(){ return canDismiss; };
							// setTimeout(function(){ canDismiss = true;}, 5000);							
							/*$("#num_trabajosactivos").html( msj1 + msj2 );
							if(idpersonal != '0'){
								$('#num_trabajosactivos').css('display','inline');
							}else{
								$('#num_trabajosactivos').css('display','none');
							}*/
							toastr.info(msj1, "Incidencias Asignadas",{
								"timeOut": "0",
            					"extendedTImeout": "0",
            					"closeButton": true,
            					"positionClass": "toast-bottom-right"
							});
							toastr.info(msj2, "Promedio de Calificaciones",{
								"timeOut": "0",
            					"extendedTImeout": "0",
            					"closeButton": true,
            					"positionClass": "toast-bottom-right"
							});
						}
					});					
				}					
			});
		});
	});
</script>
