<div class="row container col-lg-12 col-center">
    <!-- Formulario de creacion de Equipos -->
	<div class="col-md-12">
		<div class="panel panel-default panel-fade">
			<div class="panel-heading">
				<span class="panel-title">
					<div class="pull-left">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Ingreso de Equipos</a></li>
					</ul>
					</div>
					<div class="clearfix"></div>
				</span>
			</div>
			<div class="panel-body">
				<div class="panel panel-default panel-fade col-md-11 col-center">
			        <div style="margin: 10px">
				        <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Tipo de Equipo</span>
					        	<select id="selecttipoequipo" class="form-control requerido2">
					        		<option value="0">Seleccione el Tipo de Equipo</option>
							      	<?php
							      		foreach ($tiposbienes as $i) {
							      			echo '<option value="'.$i->idtipobien.'">'.$i->nombretipobien.'</option>';
							      		}
							      	?>
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>*Codigo Equipo</span>
					        	<input id="codequipo" type="text" class="form-control input-md requerido2" title="Codigo del equipo por defecto">
					      	</div>
					    </div>
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Familia del Equipo</span>
					        	<select id="selectequipo" class="form-control" disabled="true">
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					        	<span>*Serial de Inventario</span>
					        	<input id="codequipoinventario" type="text" class="form-control input-md requerido2" title="Codigo del equipo asignado en Bodega">
					      	</div>
					    </div>
						
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
					      		<span>*Subfamilia del Equipo</span>
					        	<select id="selectsubequipo" class="form-control" disabled="true">
							    </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
					            <div class="form-group">
					            	<span>*Fecha de Compra del Equipo</span>
					                <div class="input-group date">
					                    <input type="text" class="form-control requerido2" id="fechacompra" readonly="readonly">
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="row">
					    	<div class="col-xs-4 col-md-12">
					    		<span>*Nombre del Equipo</span>
						    	<input id="nombreequipo" type="text" class="form-control input-md requerido2" title="Nombre del equipo">
							</div>
					    </div>
						<div class="row" >
							<div class="col-xs-2 col-md-2">
								<span>Precio Compra</span>
							    <div class="input-group">
							    	<input id="preciocompra" type="text" class="form-control input-md"  style="text-align:right;" title="Codigo del equipo por defecto">
							    	<span class="input-group-addon">.00</span>
							    </div>
							</div>						
							<div class="col-xs-2 col-md-2">
								<span>Vida util</span>
							    <input id="vidautil" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
								<select id="vidautiltiempo" class="form-control">
							    	<option value="AÑOS">AÑOS</option>
							    	<option value="MESES">MESES</option>
							    </select>
							</div>
							<div class="col-xs-2 col-md-2">
								<span>Garantia</span>
							    <input id="garantia" type="text" class="form-control input-md" title="Codigo del equipo por defecto">
							    <select id="garantiatiempo" class="form-control">
							    	<option value="AÑOS">AÑOS</option>
							    	<option value="MESES">MESES</option>
							    </select>
							</div>
							<div class="form-group filtros col-md-6">
						        <span>Custodio</span>
						        <select id="cmb_custodio" name="custodio" class="selectpicker custodio" data-live-search="true" data-width="100%">
						          <option value="0">Seleccione Persona</option>
						        </select>
					      	</div>			    		
						</div>
					    <div class="row" >
					    	<div class="col-xs-4 col-md-12">
					      		<span>*Localizacion</span>					        	
							    <select id="cmb_localizacion" name="busqueda" class="selectpicker busqueda requerido2" data-live-search="true" data-width="100%">
						          <option selected disabled="disabled">Seleccione Localizacion</option>
						        </select>
					      	</div>
					    </div>
					    <div class="row">
					      	<div class="col-xs-4 col-md-12">
					      		<span>Descripción</span>
					        	<textarea class="form-control" id="descripcion" rows="3" style="resize: none;"></textarea>
					      	</div>
					    </div>
				    </div>
	          	</div>
	          	<div style="margin:5px"></div>	          	
	          	<div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-3" id="btn-guardar-equipo">
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
		var dataform

		function msj_alerta() {
			toastr.info("Debe llenar todos los campos obligatorios del formulario","Atención",{
				"timeOut": "5000",
				"extendedTImeout": "5000",
				"closeButton": true,
				"positionClass": "toast-bottom-left"
			});
		}

		//// Funcion valodar formulario
		function validacion_formulario(){
			
			var retorno = true;
			var numtipobien = document.getElementById("selecttipoequipo").length;
			var numfamiliabien = document.getElementById("selectequipo").length;
			var numsubfamiliabien = document.getElementById("selectsubequipo").length;
			if ($('#preciocompra').val() == ''){
				valorcompra = 0;
			}else{
				valorcompra = $('#preciocompra').val();
			}

			if ($('#vidautil').val() == ''){
				vidautil = 0;
				vidautiltiempo = '';
			}else{
				vidautil = $('#vidautil').val();
				vidautiltiempo = ('#vidautiltiempo').val();
			}

			if ($('#garantia').val() == ''){
				garantia = 0;
				garantiatiempo = '';
			}else{
				garantia = $('#garantia').val();
				garantiatiempo = ('#garantiatiempo').val();
			}

			dataform = {
				idtipobien: $('#selecttipoequipo').val(),
				idfamiliabien: $('#selectequipo').val(),
				idsubfamiliabien: $('#selectsubequipo').val(),				
				codequipo: $('#codequipo').val(),
				codinventario: $('#codequipoinventario').val(),
				fechacompra: $('#fechacompra').val(),
				descripcion: $('#nombreequipo').val(),
				valorcompra: valorcompra,
				vidautil: vidautil,
				garantia: $('#garantia').val(),
				idpersonacustodio: $('#cmb_custodio').val(),
				idlocalizacion: $('#cmb_localizacion').val(),
				observacion: $('#descripcion').val(),
				vidautiltiempo: $('#vidautiltiempo').val(),
				garantiatiempo: $('#garantiatiempo').val()
			}

			retorno = Validar_Formularios2();			

			if (numfamiliabien > 1) {
				$('#selectequipo').css({'box-shadow':'none'});
				$('#selectequipo').css({'border-color':'#d2d6de'});
				$('#selectsubequipo').css({'box-shadow':'none'});
				$('#selectsubequipo').css({'border-color':'#d2d6de'});
				if ( dataform["idfamiliabien"] != 0 ) {
					if (numsubfamiliabien > 1) {
						if ( dataform["idsubfamiliabien"] != 0 ) {
							$('#selectsubequipo').css({'box-shadow':'none'});
							$('#selectsubequipo').css({'border-color':'#d2d6de'});
						}else{
							retorno = false;
							$("#selectsubequipo").css({'border':'1px solid red'});
							msj_alerta();
						}
					}else{
						$('#selectequipo').css({'box-shadow':'none'});
						$('#selectequipo').css({'border-color':'#d2d6de'});
					}
				}else{
					retorno = false;					
					$("#selectequipo").css({'border':'1px solid red'});
					msj_alerta();					
				}
			}			
			
			return retorno;
		}

		///// COMBO TIPO BIEN	
		$('#selecttipoequipo').change(function(){		
			$('#selecttipoequipo option:selected').each(function(){
				idtipobien= $('#selecttipoequipo').val();
				$.post("<?php echo base_url('bienes/listarfamiliasbienesequipos');?>", {
					idTipoBien: idtipobien
				}, function(data){
					$("#selectequipo").html(data);
					if(document.getElementById("selectequipo").length>1){					
						$("#selectsubequipo").html('<option value="0"></option>');
						document.getElementById("selectequipo").disabled=false;
						document.getElementById("selectsubequipo").disabled=true;
					}else{
						$("#selectequipo").html('<option value="0"></option>');
						$("#selectsubequipo").html('<option value="0"></option>');
						document.getElementById("selectequipo").disabled=true;
						document.getElementById("selectsubequipo").disabled=true;
					}
				});
			});
		});
		///// COMBO FAMILIA TIPO BIEN
		$('#selectequipo').change(function(){
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
		});	

		//GUARDAR EQUIPOS
		$('#btn-guardar-equipo').click(function() {
			if(validacion_formulario()){										
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('equipo/GuardarEquiposComputador');?>",
		            data: dataform,
		            success: function (data) {
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
		                	swal({
							  title: "",
							  text: "Datos Guardados\n Desea ingresar un nuevo equipo con las mismas características",
							  type: "success",
							  showCancelButton: true,
							  confirmButtonText: "Si",
							  cancelButtonText: "No",
							  closeOnConfirm: true,
							  closeOnCancel: true
							},
							function(isConfirm){
							  if (!isConfirm) {
							  	//location.reload(true);
							  }
							});

		                }else{
		                	swal("","Ocurrio un error al guardar!","error");
		                }
		            },
		            error: function (xhr, exception) {
		            }
		        });
			}
		});
	});

	/////////////////// busqueda de custodios
  	var custodio = {
  		ajax          : {
  			url     : BASE_URL+"reportes/consultas_equipos/get_custorio_equipo",
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
  						text : data[i].nombrescompletos,
  						value: data[i].idpersonal,
  						data : {
  							subtext: data[i].cedula
  						}
  					}));
  				}
  			} 		return array;
  		}
  	};
  	$('.selectpicker').selectpicker().filter('.custodio').ajaxSelectPicker(custodio);
  	$('select').trigger('change');

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