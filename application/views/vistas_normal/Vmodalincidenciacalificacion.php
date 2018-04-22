<style type="text/css">
	#form {
	  width: 250px;
	  margin: 0 auto;
	  height: 50px;
	}

	#form p {
	  text-align: center;
	}

	#form label {
	  font-size: 30px;
	}

	input[type="radio"] {
	  display: none;
	}

	label {
	  color: grey;
	}

	.clasificacion {
	  direction: rtl;
	  unicode-bidi: bidi-override;
	  font-size: 25px;
	}

	label:hover,
	label:hover ~ label {
	  color: orange;
	}

	input[type="radio"]:checked ~ label {
	  color: orange;
	}
</style>
<input type="text" id="calificacion_txtidincidencia" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidencia_calificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B> Creacion de nuevas Incidencias</B></h5>
      </div>
      <div class="modal-body">
      <div class="panel panel-default panel-fade col-md-11 col-center"> 
            <div style="margin:10px"></div>
           		 <div class="row">
			      	<div class="col-xs-4 col-md-8 col-center">
			      		<span>Titulo de la incidencia</span>
			        	<textarea class="form-control" id="calificacion_txttituloincidencia" rows="1" style="resize: none;" readonly="readonly"></textarea>
			      	</div>
				</div>
				<div  class="row">
					<div class="col-xs-4 col-md-8  col-center">
						<span>Categoria de la incidencia</span>
						<select id="selectcategoria" class="form-control" disabled>
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
					<span>Fecha de Apertura y Vencimiento</span>
					<div class="input-group daterangeico">
	                  	<input type="text" class="form-control pull-right daterange2" align="center" id="calificacion_fechainicio-fechafin" readonly="readonly">
	                  	<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>	
	                </div>
	            </div>
	            <div class="col-xs-4 col-md-5">
		      		<span>Estado incidencia</span>
		        	<select id="calificacion_selectestado" class="form-control" disabled>
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
						<input type="time" style="WIDTH: 118px; HEIGHT: 20px" id='tiemporesolucion' name="hora" value="00:30:00" max="24:00:00" min="00:00:00" step="1" readonly="readonly">
			    	</div>
				</div>
	       	</div>
       		<div class="row" >
		      	<div class="col-xs-4 col-md-6">
                  <span>Urgencia</span>
                  <select id="calificacion_selecturgencia" class="form-control" disabled>
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
                  	<span>Prioridad</span>
                  	<select id="calificacion_selectprioridad" class="form-control" disabled>
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
                  <span>Impacto</span>
                  	<select id="calificacion_selectimpacto" class="form-control" disabled>
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
                  	<span>Fuente incidencia</span>
                  	<select id="calificacion_selectfuenteincidencia" class="form-control" disabled>
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
                  <span>Tecnico asignado</span>
                  <select id="calificacion_selectecnico" class="form-control" disabled>
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
                  <select id="calificacion_selectlocalizacion" class="form-control" disabled>
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
		      		<span>Descripcion</span>
		        	<textarea class="form-control" id="calificacion_txtareadescripcion" rows="2" style="resize: none;" readonly="readonly"></textarea>
		        	<div style="margin:10px"></div>
		      	</div>
		    </div>
			<div style="margin:10px"></div>
			<div class="row">				
				<div class="col-xs-4 col-md-5">
					<span>Calificación</span>
					<form>
						<p class="clasificacion">
						    <input id="radio1" type="radio" name="estrellas" value="10">
						    <label for="radio1" onclick="calificaestrella(10);">★</label>
						    <input id="radio2" type="radio" name="estrellas" value="9">
						    <label for="radio2" onclick="calificaestrella(9);">★</label>
						    <input id="radio3" type="radio" name="estrellas" value="8">
						    <label for="radio3" onclick="calificaestrella(8);">★</label>
						    <input id="radio4" type="radio" name="estrellas" value="7">
						    <label for="radio4" onclick="calificaestrella(7);">★</label>
						    <input id="radio5" type="radio" name="estrellas" value="6">
						    <label for="radio5" onclick="calificaestrella(6);">★</label>
						    <input id="radio6" type="radio" name="estrellas" value="5">
						    <label for="radio6" onclick="calificaestrella(5);">★</label>
						    <input id="radio7" type="radio" name="estrellas" value="4">
						    <label for="radio7" onclick="calificaestrella(4);">★</label>
						    <input id="radio8" type="radio" name="estrellas" value="3">
						    <label for="radio8" onclick="calificaestrella(3);">★</label>
						    <input id="radio9" type="radio" name="estrellas" value="2">
						    <label for="radio9" onclick="calificaestrella(2);">★</label>
						    <input id="radio10" type="radio" name="estrellas" value="1">
						    <label for="radio10" onclick="calificaestrella(1);">★</label>
						</p>
						<input class="requerido" style="display:none" id="txtcalificacion" value="">
					</form>
				</div>
				<div class="col-xs-4 col-md-7">
		      		<span>Comentario de Calificación</span>
		        	<textarea class="form-control" id="calificacion_txtcomentario" rows="2" style="resize: none;"></textarea>
		        	<div style="margin:10px"></div>
		      	</div>
			</div>
			<div style="margin:10px"></div>
       </div>	<!-- cierre panel incidencia -->
	</div>
	</div>
	<div class="modal-footer"> 
		<button type="button" class="btn btn-error" data-dismiss="modal">Cerrar</button> 
		<button type="submit" id="calificacion_guardar-modal-incidencia" class="btn btn-info">Guardar Calificación</button>  
	</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script>
	function calificaestrella (numestrellas) {
		$('#txtcalificacion').val(numestrellas);
	}	

	$(document).ready(function() {
		
		
		//variables del formulario
		var dataform

		//// Funcion valodar formulario
		function validar_formulario(){
			
			var retorno = false;		
			dataform_calificacion = {
				//llenar con los campos que estan en la bd 
				idincidencia: $('#calificacion_txtidincidencia').val(),
				calificacion: $('#txtcalificacion').val(),
				detallecalificacion: $('#calificacion_txtcomentario').val(),
				tipo: '1'
			}

			retorno = Validar_Formularios();
			return retorno;			
		}
	
		$('#calificacion_guardar-modal-incidencia').click(function() {
			if(validar_formulario()){									
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('incidencias/IngresarCalificacionesIncidencias');?>",
		            data: dataform_calificacion,
		            success: function (data) {            	
		                var json = JSON.parse(data);		                
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
							toastr.success("Datos actualizados correctamente","Guardado",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});							
							ReDibujaTablaCalificacion();
							setTimeout("$('#vmodalincidencia_calificacion').modal('hide');",1000)
							
							//setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000); 							
		                }else{
		                	toastr.error("Error actualizando los datos","Error",{
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
		            	toastr.error("Error actualizando los datos","Error",{
							"timeOut": "5000",
							"extendedTImeout": "5000",
							"closeButton": true,
							"positionClass": "toast-bottom-left"
						});
		            }
		        });
			}		
		});
	});
	 
</script>