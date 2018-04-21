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
			        	<textarea class="form-control requerido" id="txttituloincidencia2" rows="1" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>

					<div  class="row">
					<div class="col-xs-4 col-md-8  col-center">
						<span>* Tecnicos Asignados</span>
						<select2 id="tecnicos" class="form-control requerido">
						<option value="0">Seleccione al tecnico...</option>
							<?php
								foreach ($incidencia_tecnicos as $t) { /// donde llamas a la ventana esta ??? .l.
									echo '<option value="'.$t->idpersonal.'">'.$t->nombres.'</option>';
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
	            </div>




				
                  
	    </div>
		<div style="margin:10px"></div>      	
	</div>
</div>
</div>
<div class="modal-footer"> 
		<button type="button" class="btn btn-error" data-dismiss="modal"> Cerrar</button> 
		<button type="submit" id="btn-guardar-incidencia" class="btn btn-info"> Guardar Incidencia</button>  
	</div>
</div>
</div>

