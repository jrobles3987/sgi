<?php 
	$this->load->model('usuarios');			
	$roles = $this->usuarios->getUsuariosRol();
?>
<!-- Formulario de creacion de Usuarios de Sistema -->
<div class="modal fade" id="vmodalusuariosingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Ingreso de Usuarios</B></h5>
	        </div>
	        <input type="text" id="txt_idpersonal_ing" style="display:none;">
	        <div class="modal-body">
	        <div class="panel panel-default panel-fade col-md-10 col-center"> 
	        	<div style="margin:20px"></div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>*Cédula</span>
			        	<input id="txt_cedula_ing" type="text" class="form-control input-md">
			      	</div>
	        	</div>
	        	<div style="margin:10px"></div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>Apellido Paterno</span>
			        	<input id="txt_apellidopaterno_ing" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
			      	<div class="col-xs-4 col-md-6">
			        	<span>Apellido Materno</span>
			        	<input id="txt_apellidomaterno_ing" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
				</div>
				<div class="row">
	        		<div class="col-xs-4 col-md-10">
			        	<span>Nombres</span>
			        	<input id="txt_nombres_ing" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-6 col-md-12">
			        	<span>Dirección</span>
			        	<textarea id="txt_direccion_ing" type="text" class="form-control input-md" readonly="readonly"></textarea>
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-4">
			        	<span>Fecha Nacimiento</span>
			        	<input id="txt_fechanacimiento_ing" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>Email Utm</span>
			        	<input id="txt_email_ing" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
			      	<div class="col-xs-4 col-md-6">
			        	<span>*Rol</span>
			        	<select id="select_rol_ing" class="form-control" autofocus>
					      	<option value="0">Seleccione el Rol del Usuario...</option>
					      	<?php
					      		foreach ($roles as $i) {
					      			echo '<option value="'.$i->idrol.'">'.$i->nombre.'</option>';
					      		}
					      	?>
					    </select>
			      	</div>
	        	</div>
				<div style="margin:20px"></div>
	       	</div>	<!-- cierre panel incidencia -->
			</div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
			<button type="submit" id="registar_usuario" class="btn btn-info">Registar Usuario</button>
		</div>
	</div>
</div>

<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script >
	
	$(document).ready(function() {

		function LimpiarModal () {
			$('#txt_apellidopaterno_ing').val('');
        	$('#txt_apellidomaterno_ing').val('');
        	$('#txt_nombres_ing').val('');
        	$('#txt_direccion_ing').val('');
        	$('#txt_fechanacimiento_ing').val('');
        	$('#txt_email_ing').val('');
		}
		
		$('#txt_cedula_ing').keypress(function(e) {
		    var keycode = (document.all) ? e.keyCode : e.which;
		    if (keycode == 13) {
		        var cedula = $('#txt_cedula_ing').val();
		        if (cedula != ''){
		        	LimpiarModal();
		        	$('#div_loading_cargando').css('display','inline');
					$.ajax({
			            type: "POST",
			            url: "<?php echo base_url('usuario/VerificaPersonal');?>",
			            data: {cedula: cedula},
			            success: function (data) {           	
			                if (data!='null'){
			                	var datos = JSON.parse(data);
			                }else{
			                	var datos = false;
			                }
			                
			            	if(datos){
			            		sweetAlert("","La persona que intenta buscar ya esta registrada...","info")
			            	}else{
			            		$.ajax({
						            type: "POST",
						            url: "<?php echo base_url('usuario/BuscarPersonal');?>",
						            data: {cedula: cedula},
						            success: function (data2) {						            	
						            	if (data2!='null'){
						                	var json = JSON.parse(data2);	
						                }else{
						                	var json = null;
						                }						                
						                if (json) {
						                	$('#txt_apellidopaterno_ing').val(json[0].apellido1);
						                	$('#txt_apellidomaterno_ing').val(json[0].apellido2);
						                	$('#txt_nombres_ing').val(json[0].nombres);
						                	$('#txt_direccion_ing').val(json[0].direccion);
						                	$('#txt_fechanacimiento_ing').val(json[0].fecha_nacimiento);
						                	$('#txt_email_ing').val(json[0].email_utm);
						                	$('#txt_idpersonal_ing').val(json[0].idpersonal);
						                }else{
						                	swal("","No se pudo encontrar al personal con el número de cédula introducido","error");
						                }
						            },
						            error: function (xhr, exception) {
						            }
						        });
			            	}
			            	$('#div_loading_cargando').css('display','none');
			            },
			            error: function (xhr, exception) {
			            }
			        });					
		        }else{
		        	sweetAlert("","Debe introducir una cedula correcta para comenzar la busqueda...","info")
		        }
		    }
		});

		//variables del formulario
		var dataform

		//// Funcion valodar formulario
		function validar_formulario(){
			
			var retorno = true;
			var cedula= $('#txt_cedula_ing').val();
			var numroles = document.getElementById("select_rol_ing").length;
			
			dataform = {
				//llenar con los campos que estan en la bd 
				idpersonal: $('#txt_idpersonal_ing').val(),
				idrol: $('#select_rol_ing').val()
			}

			if (numroles<=0){
				retorno = false;
			}

			if (retorno) {
				//alert(dataform["timeporesolucion"]);
				if(dataform['idpersonal']!=''){
					if(dataform['idrol']=='0'){
						retorno = false;
					}
				}else{
					retorno = false;
				}
			}else{
				retorno = false;
		 	}
			return retorno;			
		}
	
		$('#registar_usuario').click(function() {
			if(validar_formulario()){										
				$('#div_loading').css('display','inline');
				$.ajax({
		            type: "POST",
		            url: "<?php echo base_url('usuario/RegistrarUsuarios');?>",
		            data: dataform,
		            success: function (data) {	            	
		                var json = JSON.parse(data);
		                $('#div_loading').css('display','none');
		                if (json.res=="t") {
							sweetAlert("", "Datos Guardados!", "success");
							setTimeout ("location.replace('<?php echo base_url('menu/UsuariosSistema')?>');", 3000); 
							
		                }else{
		                	swal("","Ocurrio un error al guardar datos!","error");
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