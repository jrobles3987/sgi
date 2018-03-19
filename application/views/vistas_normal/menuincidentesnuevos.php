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
			        	<textarea class="form-control requerido" id="txttituloincidencia2" rows="2" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>
				<div style="margin:10px"></div>
				<div class="row" style="display:none">
					<div class="col-xs-4 col-md-6">
						<span>* Fecha de Apertura y Vencimiento</span>
						<div class="input-group daterangeico">
		                  	<input type="text" class="form-control pull-right daterange" align="center" id="fechainicio-fechafin2" readonly="readonly">
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
				</div>
                
                <div class="row" >
                	<div class="col-xs-4 col-md-6">
						<span>* Categoria de la incidencia</span>
						<select id="selectcategoria2" class="form-control requerido">
						<option value="0">Seleccione la categoria de la incidencia...</option>
							<?php
								foreach ($incidencias_categorias as $c) {
									echo '<option value="'.$c->idcategoria.'">'.$c->nombre.'</option>';
								}
							?>
						</select>
				    </div> 
			      	<div class="col-xs-4 col-md-6">
                      <span>* Urgencia</span>
                      <select id="selecturgencia2" class="form-control requerido">
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
				</div>
				
				<div class="row">
					<div class="col-xs-4 col-md-12">
                      <span>* Localización</span>
                      <select id="selectlocalizacion2" class="form-control requerido">
                          <option value="0">Seleccione la localización de la incidencia...</option>
                          <?php
                                foreach ($localizacion as $l) {
                                    echo '<option value="'.$l->idlocalizacion.'">'.$l->nombrelocalizacion.'</option>';
                                }
                            ?>
                      </select>
			        </div>
				</div>
                <div class="row">
			      	<div class="col-xs-4 col-md-12">
			      		<span>* Descripción</span>
			        	<textarea class="form-control requerido" id="txtareadescripcion2" rows="5" style="resize: none;"></textarea>
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
	//$(document).ready(function() {
		$('.daterange').daterangepicker({
	        format: 'yyyy-mm-dd',
	        autoApply: true,
	        opens: 'center'
	    });
		//variables del formulario		
		var dataform
		//// Funcion valodar formulario
		function validar_formulario(){
			
			var retorno = true;
			
			// separa las fechas que vienen desde el daterange
			var fechainicioyfin = $('#fechainicio-fechafin2').val();
			arreglo_fechas = fechainicioyfin.split('-');
			var fecha1 = arreglo_fechas[0];
			var fecha2 = arreglo_fechas[1];
			dataform = {
				//llenar con los campos que estan en la bd 
				tituloincidencia: $('#txttituloincidencia2').val(),
				//fechaapertura: $('#fechaapertura2').val(),
				fechaapertura: fecha1,
				//fechavencimiento: $('#fechavencimiento2').val(),
				fechavencimiento: fecha2,
				//fechaaceptacion: $('#fechaaceptacion').val(),
				//fechaaprovacion: $('#fechaaprovacion').val(),
				incidenciaestado: 1,
				urgencia: $('#selecturgencia2').val(),
				impacto: 3,
				prioridad: 3,
				tecnicoasignado: 'null',
				idincidenciafuente: 1,
				idlocalizacion: $('#selectlocalizacion2').val(),
				idcategorias: $('#selectcategoria2').val(),
				descripcion: $('#txtareadescripcion2').val()
			}
			//console.log(dataform);
			retorno = Validar_Formularios();
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
							//sweetAlert("", "Datos guardados!", "success");*/
							toastr.success("Datos Guardados correctamente","",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
							//setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000);							
		                }else{
		                	//swal("","Ocurrio un error al guardar!","error");
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
		            	toastr.error("Error al querer grabar los datos","Atención",{
							"timeOut": "5000",
							"extendedTImeout": "5000",
							"closeButton": true,
							"positionClass": "toast-bottom-left"
						});
		            }
		        });
			}		
		});
	//});
</script>
