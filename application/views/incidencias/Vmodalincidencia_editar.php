<input type="text" id="txtidincidencia_editar" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidencia_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Modificación de Incidencia</B></h5>
      </div>
      <div class="modal-body">
      <div class="panel panel-default panel-fade col-md-11 col-center"> 
            <div style="margin:10px"></div>
           		 <div class="row">
			      	<div class="col-xs-4 col-md-8 col-center">
			      		<span>* Titulo de la incidencia</span>
			        	<textarea class="form-control incidencia_editar" id="txttituloincidencia_editar" rows="1" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>
				<div  class="row">
					<div class="col-xs-4 col-md-8  col-center">
						<span>* Categoria de la incidencia</span>
						<select id="selectcategoria_editar" class="form-control incidencia_editar">
						<option value="0">Seleccione la categoria de la incidencia...</option>
							<?php
								foreach ($incidencias_categorias as $c) {
									echo '<option value="'.$c->idcategoria.'">'.$c->nombre.'</option>';
								}
							?>
						</select>
				    </div> 
				</div>
	        <div class="row" >
	        	<div class="col-xs-2 col-md-3">
					<span>* Fecha de Apertura</span>
					<div class="input-group date">
						<input type="text" class="form-control incidencia_editar" id="fechaapertura_editar" readonly="readonly">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col-xs-2 col-md-3">
					<span>* Fecha de Vencimiento</span>
					<div class="input-group date">
						<input type="text" class="form-control incidencia_editar" id="fechavencimiento_editar" readonly="readonly">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>					
	            </div>
	            <div class="col-xs-4 col-md-3">
		      		<span>* Estado incidencia</span>
		        	<select id="selectestado_editar" class="form-control incidencia_editar">
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
				<div class="col-xs-4 col-md-3">
					<B>Tiempo resolucion</B>
						<div class="input-group-addon">
						<input type="time"   style="WIDTH: 118px; HEIGHT: 20px" id="tiemporesolucion_editar" name="hora" value="00:30:00" max="24:00:00" min="00:00:00" step="1">
			    	</div>
				</div>
	       	</div>    
       		<div class="row" >
		      	<div class="col-xs-4 col-md-6">
                  <span>* Urgencia</span>
                  <select id="selecturgencia_editar" class="form-control incidencia_editar">
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
                  	<select id="selectprioridad_editar" class="form-control incidencia_editar">
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
                  	<select id="selectimpacto_editar" class="form-control incidencia_editar">
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
                  	<select id="selectfuenteincidencia_editar" class="form-control incidencia_editar"autofocus>
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
		      	<div class="col-xs-4 col-lg-12">
                  <span>* Tecnico asignado</span>
                  <select id="selectecnico_editar" class="form-control incidencia_editar">
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
					<span>* Localización</span>
					<select id="selectlocalizacion_editar" class="form-control incidencia_editar">                      
						<option value="0">Seleccione una localización...</option>
						<?php
							foreach ($incidencia_localizacion as $j) {
								echo '<option value="'.$j->idlocalizacion.'">'.$j->nombrelocalizacion.'</option>';
							}
						?>
					</select>
		        </div>
			</div>
            <div class="row">
		      	<div class="col-xs-4 col-md-12">
		      		<span>* Descripcion</span>
		        	<textarea class="form-control incidencia_editar" id="txtdescripcion_editar" rows="2" style="resize: none;"></textarea>
		        	<div style="margin:10px"></div>
		      	</div>
		    </div>
			<div style="margin:10px"></div>
       </div>	<!-- cierre panel incidencia -->
	</div>
	</div>
	<div class="modal-footer"> 
		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button> 
		<button type="submit" id="guardar-modal-incidencia-editar" class="btn btn-info">Guardar datos</button>  
	</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script>
	//variables del formulario
	var dataform

	//// Funcion valodar formulario
	function validar_formulario(){
		
		var retorno = true;
		var fechainicioyfin = $('#fechainicio-fechafin').val();
		arreglo_fechas = fechainicioyfin.split('-');
		var fecha1 = arreglo_fechas[0];
		var fecha2 = arreglo_fechas[1];			
		dataform = {
			//llenar con los campos que estan en la bd 
			idincidencia: $('#txtidincidencia_editar').val(),
			tituloincidencia: $('#txttituloincidencia_editar').val(),
			fechaapertura: $('#fechaapertura_editar').val(),
			fechavencimiento: $('#fechavencimiento_editar').val(),
			incidenciaestado: $('#selectestado_editar').val(),
			urgencia: $('#selecturgencia_editar').val(),
			impacto: $('#selectimpacto_editar').val(),
			prioridad: $('#selectprioridad_editar').val(),
			tecnicoasignado: $('#selectecnico_editar').val(),
			idincidenciafuente: $('#selectfuenteincidencia_editar').val(),
			idlocalizacion:$('#selectlocalizacion_editar').val(),
			descripcion: $('#txtdescripcion_editar').val(),
			tiemporesolucion: $('#tiemporesolucion_editar').val()
		}

		retorno = Validar_Formularios_General('.incidencia_editar');
		console.log(dataform);
		return retorno;
		
	}

	$('#guardar-modal-incidencia-editar').click(function() {
		if(validar_formulario()){										
			$('#div_loading_cargando').css('display','inline');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('incidencias/ActualizarIncidencias');?>",
				data: dataform,
				success: function (data) {	            	
					var json = JSON.parse(data);
					$('#div_loading_cargando').css('display','none');
					if (json.res=="t") {
						toastr.success("Datos Actualizados correctamente","Hecho",{
							"timeOut": "5000",
							"extendedTImeout": "5000",
							"closeButton": true,
							"positionClass": "toast-bottom-left"
						});
						//setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000);
					}else{
						toastr.error("Error al guardar los datos","Error",{
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
				}
			});
		}		
	});
	 
</script>