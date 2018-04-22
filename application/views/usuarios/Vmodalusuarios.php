<?php 
	$this->load->model('usuarios');			
	$roles = $this->usuarios->getUsuariosRol();
?>
<!-- Formulario de creacion de Usuarios de Sistema -->
<div class="modal fade" id="vmodalusuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Modificación de Usuarios</B></h5>
	        </div> 
	        <input type="text" id="txt_idpersonal" style="display:none;">
	        <div class="modal-body">
	        <div class="panel panel-default panel-fade col-md-10 col-center"> 
	        	<div style="margin:20px"></div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>*Cédula</span>
			        	<input id="txt_cedula" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
	        	</div>
	        	<div style="margin:10px"></div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>Apellido Paterno</span>
			        	<input id="txt_apellidopaterno" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
			      	<div class="col-xs-4 col-md-6">
			        	<span>Apellido Materno</span>
			        	<input id="txt_apellidomaterno" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
				</div>
				<div class="row">
	        		<div class="col-xs-4 col-md-10">
			        	<span>Nombres</span>
			        	<input id="txt_nombres" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-6 col-md-12">
			        	<span>Dirección</span>
			        	<textarea id="txt_direccion" type="text" class="form-control input-md" readonly="readonly"></textarea>
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-4">
			        	<span>Fecha Nacimiento</span>
			        	<input id="txt_fechanacimiento" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-xs-4 col-md-6">
			        	<span>Email Utm</span>
			        	<input id="txt_email" type="text" class="form-control input-md" readonly="readonly">
			      	</div>
			      	<div class="col-xs-4 col-md-6">
			        	<span>*Rol</span>
			        	<select id="select_rol" class="form-control" autofocus>
					      	<option value="0">Seleccione el Rol del Usuario...</option>
					      	<?php
					      		foreach ($roles as $i) {
					      			echo '<option value="'.$i->idrol.'">'.$i->nombre.'</option>';
					      		}
					      	?>
					    </select>
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
<script >
</script>