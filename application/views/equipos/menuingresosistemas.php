<div class="row container col-lg-11 col-center">
	<div class="col-md-12">
		<div class="panel panel-default panel-fade">
			<div class="panel-heading">
				<span class="panel-title">
					<div class="pull-left">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Ingreso de Sistemas</a></li>
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
					      		<span>*Tipo de Sistema</span>
					        	<select id="selecttipoequipo" class="form-control" autofocus>
							      	<option value="0">Seleccione el Tipo de Sistema...</option>
							      	<?php
							      		foreach ($tiposbienes as $i) {
							      			echo '<option value="'.$i->idtipobien.'">'.$i->nombretipobien.'</option>';
							      		}							      		
							      	?>
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>*Codigo del Sistema</span>
					        	<input id="codigosistema" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
					      	</div>
					    </div>
					    <div class="row">
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Familia del Sistema</span>
					        	<select id="selectequipo" class="form-control" disabled="true">
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					            <div class="form-group">
					            	<span>*Fecha de Creación del Sistema</span>
					                <div class='input-group date'>
					                    <input type="text" class="form-control requerido2" id="fechaingreso" readonly="readonly">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>					      
					    </div>			    
					    <div class="row" >
					    	<div class="col-xs-6 col-md-12">
					      		<span>*Localización</span>
					        	<select id="cmb_localizacion" name="busqueda" class="selectpicker busqueda" data-live-search="true" data-width="100%">
						          <option selected disabled="disabled">Seleccione Localizacion</option>
						        </select>
					      	</div>
					    </div>
				    </div>
	          	</div>
	          	<div style="margin:5px"></div>
	          	<div class="panel panel-default panel-fade col-md-10 col-center">	          
			        <div style="margin: 10px">
					    <div class="row">
					      	<div class="col-xs-4 col-md-12">
					      		<span>*Descripción</span>
					        	<textarea class="form-control requerido2" id="txtareadescripcion" rows="5" style="resize: none;"></textarea>
					      	</div>
					    </div>						   
				    </div>
	          	</div>
	          	<div style="margin:5px"></div>
	          	<div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-3" id="btn-guardar-sistema">
                        <p>
                            <a class="btn btn-primary btn-block">Guardar Datos</a>
                        </p>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script>
$(document).ready(function() {
	$('#selecttipoequipo').change(function(){
		$('#selecttipoequipo option:selected').each(function(){
			idtipobien= $('#selecttipoequipo').val();
			$.post("<?php echo base_url('bienes/listarfamiliasbienessistemas');?>", {
				idTipoBien: idtipobien
			}, function(data){
				$("#selectequipo").html(data);
				if(document.getElementById("selectequipo").length>1){					
					document.getElementById("selectequipo").disabled=false;
				}else{
					$("#selectequipo").html('<option value="0"></option>');
					document.getElementById("selectequipo").disabled=true;
				}
			});
		});
	});
	/*$('#selectequipo').change(function(){
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
	});*/

	function validacion_formulario(){
			
		var retorno = true;
		var numtipobien = document.getElementById("selecttipoequipo").length;
		var numfamiliabien = document.getElementById("selectequipo").length;
		//var numsubfamiliabien = document.getElementById("selectsubequipo").length;		

		dataform = {
			idtipobien: $('#selecttipoequipo').val(),
			idfamiliabien: $('#selectequipo').val(),
			//idsubfamiliabien: $('#selectsubequipo').val(),
			fechaingreso: $('#fechaingreso').val(),
			idlocalizacion: $('#cmb_localizacion').val(),
			descripcion: document.getElementById("txtareadescripcion").value,
			codigosistema: $('#codigosistema').val()
		}

		retorno = Validar_Formularios2();			

		if (numfamiliabien > 1) {
			$('#selectequipo').css({'box-shadow':'none'});
			$('#selectequipo').css({'border-color':'#d2d6de'});
			if ( dataform["idfamiliabien"] != 0 ) {				
					$('#selectequipo').css({'box-shadow':'none'});
					$('#selectequipo').css({'border-color':'#d2d6de'});			
			}else{
				retorno = false;					
				$("#selectequipo").css({'border':'1px solid red'});
				msj_alerta();					
			}
		}		
		return retorno;
	}

	//GUARDAR EQUIPOS
		$('#btn-guardar-sistema').click(function() {
			if(validacion_formulario()){
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('equipo/GuardarSistemas');?>",
		            data: dataform,
		            success: function (data) {
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
		                	toastr.success("Datos Guardados correctamente","",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
							location.reload(true);
		                }else{
		                	toastr.error("Error al guardar Datos","",{
								"timeOut": "5000",
								"extendedTImeout": "5000",
								"closeButton": true,
								"positionClass": "toast-bottom-left"
							});
		                }
		            },
		            error: function (xhr, exception) {
		            }
		        });
			}
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
});
</script>