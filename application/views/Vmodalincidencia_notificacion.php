<input type="text" id="txtidincidencia" style="display:none;">
<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="vmodalincidencia_notificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Visualización de Incidencia</B></h5>
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
</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>