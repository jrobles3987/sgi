<?php 
	$this->load->model('incidencia');			
	$fuentetipo = $this->incidencia->getlistarfuenteincidencia();
	$inciestados = $this->incidencia->getlistarestado();
	//$estados = $this->incidencia->getlistarfuenteincidencia();
	$necesidades = $this->incidencia->getlistarnecesidades();
?>
<input type="text" id="txtidincidencia" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>MODIFICACION DE INCIDENCIA</B></h5>
      </div> 
      
      <div class="modal-body">
      <div class="panel panel-default panel-fade col-md-10 col-center"> 
                <div class="row">
					      	<div class="col-xs-4 col-md-6">
							  <B>Titulo de la incidencia</B>
							<textarea class="form-control" id="txttituloincidencia" rows="1" style="resize: none;"></textarea>
					      	</div>
  					      </div>	<!-- cierre tirulo incidencia -->
							
							<div style="margin:10px"></div>
        <div class="row" >
					  <div class="col-xs-4 col-md-3">
					  <B>Fecha apertura</B>
					    <div class='input-group date'>
					    <input type="text" class="form-control"  id="fechaapertura" readonly="readonly" disabled>
						  <span class="input-group-addon">
					    <span class="glyphicon glyphicon-calendar"></span>
					    </span>
					    </div> 	
			  	  </div>
				         
          <div class="col-xs-4 col-md-3">
		  <B>Fecha vencimiento</B>
						<div class='input-group date'>
					        <input type="text" class="form-control" id="fechavencimiento" readonly="readonly"/>
					         <span class="input-group-addon">
					         <span class="glyphicon glyphicon-calendar"></span>
					         </span>
					  </div> 	
			    </div>
 				
				 
				 <div class="col-xs-4 col-md-3">
				 <B>Tiempo resolucion</B>
 				<div class="input-group-addon">
				<input type="time"   style="WIDTH: 108px; HEIGHT: 20px" id='tiemporesolucion' name="hora" value="00:30:00" max="24:00:00" min="00:00:00" step="1">
			    </div>
				</div>



       </div>
    
	   <div style="margin:10px"></div>
       <div class="row" >
					    	<div class="col-xs-4 col-md-5">
							<B>Estado</B>
					        	<select id="selectestado" class="form-control" autofocus>
								<option value="0">Seleccione el estado de la incidencia...</option>
									<?php
							      		foreach ($inciestados as $k) {
							      			echo '<option value="'.$k->idincidenciaestado.'">'.$k->estado.'</option>';
							      		}
							      	?>
							    </select>
					         </div>
					      	<div class="col-xs-4 col-md-6">
							  <B>Urgencia</B>
                              <select id="selecturgencia" class="form-control">
                                  <option value="0">Seleccione la urgencia de incidencia...</option>
                                  <option value="1">Muy alta</option>
                                  <option value="2">Alta</option>
                                  <option value="3">media</option>
                                  <option value="4">Baja</option>
                                  <option value="5">Muy baja</option>
                                  </select>	</div>
					    </div>
						<div style="margin:10px"></div>
						<div class="row" >
					      	<div class="col-xs-4 col-md-5">
                              <B>Impacto</B>
                              <select id="selectimpacto" class="form-control">
                                  <option value="0">Seleccione impacto incidencia...</option>
                                  <option value="1">Muy alta</option>
                                  <option value="2">Alta</option>
                                  <option value="3">media</option>
                                  <option value="4">Baja</option>
                                  <option value="5">Muy baja</option>
                                  </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
							  <B>Prioridad</B>
                              <select id="selectprioridad" class="form-control">
                              <option value="0">Seleccione la prioridad de la incidencia...</option>
                              <option value="1">Mayor</option>
                              <option value="2">Muy alta</option>
                              <option value="3">Alta</option>
                              <option value="4">Media</option>
                              <option value="5">Baja</option>
                              <option value="6">Muy baja</option>
                              </select>
                              </div>
					    </div>
						<div style="margin:10px"></div>
						<div class="row" >
					      	<div class="col-xs-4 col-md-5">
                              <B>Tecnico asignado</B>
                              <select id="selectecnico" class="form-control">
                                  <option value="0">Seleccione tecnico...</option>
                                  <option value="1">Nuevos</option>
                                  <option value="2">En curso(asignada)</option>
                                  <option value="3">En curso(planificada)</option>
                                  <option value="4">En espera</option>
                                  <option value="5">Resuelto</option>
                                  <option value="6">Cerrado</option>
                              </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
                              <B>Fuente</B>
                              <select id="selectfuenteincidencia" class="form-control"autofocus>
                                  <option value="0">Seleccione la fuente de la incidencia...</option>
                                  <?php
                                        foreach ($fuentetipo as $j) {
                                            echo '<option value="'.$j->idincidenciafuente.'">'.$j->nombre.'</option>';
                                        }
                                    ?>
                              </select>
					        </div>
					    </div>
						<div style="margin:10px"></div>
						<div class="row" >
					    	<div class="col-xs-6 col-md-8">
							<B>Localizacion</B>
					        	<select id="selectlocalizacion" class="form-control">
					        		<option value="0">Seleccione la localización incidencia...</option>
					        		<option value="1">Bodega</option>
					        		<option value="2">Departamento de Rectorado</option>
					        		<option value="3">Facultad de Ciencias Informáticas</option>
					        		<option value="4">Facultad de Ciencias Administrativas y económicas</option>
							    </select>
					      	</div>
					    </div>

						<div style="margin:10px"></div>
                        <div class="row">
					      	<div class="col-xs-4 col-md-12">
							  <B>Descripcion</B>
					        	<textarea class="form-control" id="txtareadescripcion" rows="2" style="resize: none;"></textarea>
					      	</div>
					    </div>	
						<div style="margin:10px"></div>



 
       </div>	<!-- cierre panel incidencia -->
</div>

</div>
<div class="modal-footer"> 
<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button> 
<button type="submit" id="guardar" class="btn btn-info">Guardar datos</button>  
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
			var muntitulo= $('#txttituloincidencia').val();
			var munfechavencimiento =$('#fechavencimiento').val();
			var munincidenciaestado = document.getElementById("selectestado").length;
			var munurgencia = document.getElementById("selecturgencia").length;
			var munimpacto = document.getElementById("selectimpacto").length;
			var munprioridad = document.getElementById("selectprioridad").length; 
			var muntecnicoasignado = document.getElementById("selectecnico").length;
			var munidincidenciafuente = document.getElementById("selectfuenteincidencia").length; 
			var munidlocalizacion= document.getElementById("selectlocalizacion").length;
			var mundes = $('#txtareadescripcion').val();
			
			dataform = {
				//llenar con los campos que estan en la bd 
				idincidencia: $('#txtidincidencia').val(),
				tituloincidencia: $('#txttituloincidencia').val(),
				fechavencimiento: $('#fechavencimiento').val(),
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

			if ( dataform["muntituloincidencia"]=="" || !dataform["tituloincidencia"]) {
				dataform["muntituloincidencia"] ="null";
			}

			/* ( dataform["fechaapertura"]=="" || !dataform["fechaapertura"]) {
				dataform["fechaapertura"] = "null";
			}*/

			if ( dataform["munfechavencimiento"]=="" || !dataform["fechavencimiento"]) {
				dataform["munfechavencimiento"] ="null" ;
			}

			/*if ( dataform["fechaaceptacion"]=="" || !dataform["fechaaceptacion"]) {
				dataform["fechaaceptacion"] = "null";
			}

			if ( dataform["fechaaprovacion"]=="" || !dataform["fechaaprovacion"]) {
				dataform["fechaaprovacion"] = "null";
			}*/

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
			/*alert(dataform["tituloincidencia"]);
			alert(dataform["incidenciaestado"]);
			alert(dataform["urgencia"]);
			alert(dataform["impacto"]);
			alert(dataform["prioridad"]);
			alert(dataform["tecnicoasignado"]);
			alert(dataform["idincidenciafuente"]);
			alert(dataform["idlocalizacion"]);
			alert(dataform["descripcion"]);	*/			
							
			if ( dataform["tituloincidencia"] != "''" ) {
				}
				if ( dataform["fechavencimiento"] != "''" ) {
					if ( dataform["incidenciaestado"] != 0 ) {
						
						if ( dataform["urgencia"] != 0 ) {
							if ( dataform["impacto"] != 0 ) {
								if ( dataform["prioridad"] != 0 ) {
     								if ( dataform["tecnicoasignado"] != 0 ) {
										if ( dataform["idincidenciafuente"] != 0 ) {
											
											if ( dataform["idlocalizacion"] != 0 ) {
												
												if ( dataform["descripcion"] !="''" ) {
								             	retorno = true;											 
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
	
		$('#guardar').click(function() {
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
							sweetAlert("", "Datos Actualizados!", "success");
							setTimeout ("location.replace('<?php echo base_url('menu/Incidentes')?>');", 3000); 
							
		                }else{
		                	swal("","Ocurrio un error al actualizar!","error");
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