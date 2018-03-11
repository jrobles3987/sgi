<input type="text" id="txtidincidencia" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
			        	<textarea class="form-control requerido" id="txttituloincidencia" rows="1" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>
				<div  class="row">
					<div class="col-xs-4 col-md-8  col-center">
						<span>* Categoria de la incidencia</span>
						<select id="selectcategoria" class="form-control requerido">
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
	        	<div class="col-xs-4 col-md-4">
					<span>* Fecha de Apertura y Vencimiento</span>
					<div class="input-group daterangeico">
	                  	<input type="text" class="form-control pull-right daterange2 requerido" align="center" id="fechainicio-fechafin" readonly="readonly">
	                  	<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>	
	                </div>
	            </div>
	            <div class="col-xs-4 col-md-5">
		      		<span>* Estado incidencia</span>
		        	<select id="selectestado2" class="form-control requerido">
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
						<input type="time"   style="WIDTH: 118px; HEIGHT: 20px" id='tiemporesolucion' name="hora" value="00:30:00" max="24:00:00" min="00:00:00" step="1">
			    	</div>
				</div>
	       	</div>    
       		<div class="row" >
		      	<div class="col-xs-4 col-md-6">
                  <span>* Urgencia</span>
                  <select id="selecturgencia" class="form-control requerido">
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
                  	<select id="selectprioridad" class="form-control requerido">
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
                  	<select id="selectimpacto" class="form-control requerido">
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
                  	<select id="selectfuenteincidencia" class="form-control requerido"autofocus>
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
                  <select id="selectecnico" class="form-control requerido">
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
                  <select id="selectlocalizacion" class="form-control requerido">
                      <?php
                            foreach ($incidencia_fuente as $j) {
                                echo '<option value="'.$j->idincidenciafuente.'">'.$j->nombre.'</option>';
                            }
                        ?>
                  </select>
		        </div>
			</div>
            <div class="row">
		      	<div class="col-xs-4 col-md-12">
		      		<span>* Descripcion</span>
		        	<textarea class="form-control requerido" id="txtareadescripcion" rows="2" style="resize: none;"></textarea>
		        	<div style="margin:10px"></div>
		      	</div>
		    </div>
			<div style="margin:10px"></div>
       </div>	<!-- cierre panel incidencia -->
	</div>
	</div>
	<div class="modal-footer"> 
		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button> 
		<button type="submit" id="guardar-modal-incidencia" class="btn btn-info">Guardar datos</button>  
	</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script>
	$(document).ready(function() {
		
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
				idincidencia: $('#txtidincidencia').val(),
				tituloincidencia: $('#txttituloincidencia').val(),
				fechavencimiento: fecha2,
				//fechaaceptacion: $('#fechaaceptacion').val(),
				//fechaaprovacion: $('#fechaaprovacion').val(),
				incidenciaestado: $('#selectestado').val(),
				urgencia: $('#selecturgencia').val(),
				impacto: $('#selectimpacto').val(),
				prioridad: $('#selectprioridad').val(),
				tecnicoasignado: $('#selectecnico').val(),
				idincidenciafuente: $('#selectfuenteincidencia').val(),
				idlocalizacion:$('#selectlocalizacion').val(),
				descripcion: $('#txtareadescripcion').val(),
				tiemporesolucion: $('#tiemporesolucion').val()
			}

			retorno = Validar_Formularios();
			return retorno;
			
		}
	
		$('#guardar-modal-incidencia').click(function() {
			if(validar_formulario()){										
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('incidencias/ActualizarIncidencias');?>",
		            data: dataform,
		            success: function (data) {	            	
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
							toastr.success("Datos Actualizados correctamente","",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
							//setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000); 							
		                }else{
		                	toastr.success("Datos Guardados correctamente","",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
		                }
		            },
		            complete : function(xhr, status) {
		                $('#div_loading').css('display','none');
		            },
		            error: function (xhr, exception) {
		            }
		        });
			}		
		});
	});
	 
</script>