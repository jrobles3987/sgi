<input type="text" id="txtidincidencia" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidenciamodificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Modificación de Incidencia</B></h5>
        </div>
        <div class="modal-body">
            <div class="row container col-md-12 col-center">
            <div class="panel panel-default panel-fade">
                <div class="panel-body">
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
                                        foreach ($incidencia_localizacion as $l) {
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
            </div>
        </div>
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
			dataform = {
				//llenar con los campos que estan en la bd 
				idincidencia: $('#txtidincidencia').val(),
				tituloincidencia: $('#txttituloincidencia2').val(),
				urgencia: $('#selecturgencia2').val(),
				idlocalizacion:$('#selectlocalizacion2').val(),
				descripcion: $('#txtareadescripcion2').val(),
                categoria: $('#selectcategoria2').val()
			}

			retorno = Validar_Formularios();
			return retorno;
			
		}
	
		$('#guardar-modal-incidencia').click(function() {
			if(validar_formulario()){										
				$('#div_loading_cargando').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('incidencias/ActualizarIncidenciasNormal');?>",
		            data: dataform,
		            success: function (data) {	            	
		                var json = JSON.parse(data);
		                $('#div_loading_cargando').css('display','none');
		                if (json==true) {
							toastr.success("Datos Actualizados correctamente","Hecho",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
                            setTimeout("$('#vmodalincidenciamodificacion').modal('hide');",500)
                            ReDibujaTablaIncidenciasNormal();
		                }else{
		                	toastr.error("Ocurrio un error al actualizar los datos","Error",{
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
                        alert('error');
                        $('#div_loading_cargando').css('display','none');
		            }
		        });
			}		
		});
	});
	 
</script>