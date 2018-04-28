<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vplani" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B> Creacion de Planificaciones</B></h5>
      </div>
      <div class="modal-body">
	<div class="panel panel-default panel-fade col-md-12 col-center">
		<div class="panel-body">
			<div style="margin:10px"></div>
           		 <div class="row">
			      	<div class="col-xs-4 col-md-8 col-center">
			      		<span>* Titulo de la planificacion</span>
			        	<textarea class="form-control requerido3" id="txttituloplanificacion" rows="1" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>
        <div style="margin:10px"></div>
             		 <div class="row">
  			      	<div class="col-xs-4 col-md-8 col-center">
                  		<span>*Localizacion</span>
						<select id="cmblocalizacion" name="busqueda" class="form-control selectpicker busqueda" data-live-search="true" data-width="100%">
							<option selected disabled="disabled">Seleccione Localizacion</option>
						</select>
  			      	</div>
  				</div>
		<div style="margin:10px"></div>

					<div  class="row">
					<div  class="col-xs-4 col-md-8 col-center">
					<span>* Tecnicos Asignados</span>
					</div>
					<div class="col-xs-4 col-md-8 col-center" multiple="multiple" id="tec">

						<select id="idtecnicos"  class="form-control selectpicker" data-live-search="true" multiple>
							<?php
								foreach ($incidencia_tecnicos as $t) { /// donde llamas a la ventana esta ??? .l.
									echo '<option value="'.$t->idpersonal.'">'.$t->nombres.'</option>';
								}
							?>
						</select>
				    </div>
				</div>
		<div style="margin:10px"></div>
					<div class="row">
					<div class="col-xs-4 col-md-8 col-center" id="fechainicio-fechafin">
						<span>* Fecha de Apertura y Vencimiento</span>
						<div class="input-group daterangeico">
		                  	<input type="text" class="form-control pull-right daterange requerido3" align="center" id="fechainicio-fechafin2" readonly="readonly">
		                  	<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>
		                </div>
		            </div>
				</div>
		<div style="margin:10px"></div>
				 <div class="row">
			      	<div class="col-xs-4 col-md-12 col-center">
			      		<span>* Descripcion</span>
			        	<textarea class="form-control requerido3" id="txtareadescripcion2" rows="2" style="resize: none;"></textarea>
			        	<div style="margin:10px"></div>
			      	</div>
			    </div>

	    </div>
		<div style="margin:10px"></div>
	</div>
</div>
</div>
<div class="modal-footer">
		<button type="button" class="btn btn-error" data-dismiss="modal"> Cerrar</button>
		<button type="submit" id="btn-guardar-planificacion" class="btn btn-info"> Guardar Planificaciones</button>
	</div>
</div>
</div>
<script>
  $('.cmblocalizacion').addClass('col-lg-8').selectpicker('setStyle');

	$('#idtecnicos').change(function(){
		var values = $('#idtecnicos').val();
		//for(var i = 0; i < values.length; i ++) {
			console.log($('#idtecnicos').val());
		//}
	});

	$(document).ready(function() {

		//variables del formulario
		var dataform

		//// Funcion valodar formulario
		function validar_formulario3(){

			var retorno = true;
			var fechainicioyfin = $('#fechainicio-fechafin2').val();
			arreglo_fechas = fechainicioyfin.split('-');
			var fecha1 = arreglo_fechas[0];
			var fecha2 = arreglo_fechas[1];
			dataform = {
				tituloincidencia: $('#txttituloplanificacion').val(),
				fechainicio: fecha1,
				fechavencimiento: fecha2,
				tecnicosasignados: $('#idtecnicos').val(),
				descripcion: $('#txtareadescripcion2').val(),
				localizacion: $('#cmblocalizacion').val()
			}

			retorno = Validar_Formularios3();
			return retorno;
		}

		$('#btn-guardar-planificacion').click(function() {
			if(validar_formulario3()){
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('Cplanificacion/GuardarPlanificaciones');?>",
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

	/////////////////// busqueda de localizacion
	var busqueda = {
		ajax          : {
			url     : BASE_URL+"reportes/consultas_equipos/get_equipo_local",
			type    : 'POST',
			dataType: 'json',
			data    : {
				q: '{{{q}}}'
			}
		},
		locale        : {
			emptyTitle: 'Escriba el procedimiento a aplicar'
		},
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for (i = 0; i < l; i++) {
					array.push($.extend(true, data[i], {
						text : data[i].nombrelocalizacion,
						value: data[i].idlocalizacion
					}));
				}
			} 		return array;
		}
	};
	$('.selectpicker').selectpicker().filter('.busqueda').ajaxSelectPicker(busqueda);
	$('select').trigger('change');
</script>
