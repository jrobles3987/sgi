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
<div style="margin:10px"></div>	
						
					<div  class="row">
					<div  class="col-xs-4 col-md-8 col-center">
					<span>* Tecnicos Asignados</span>
					</div>	
					<div class="col-xs-4 col-md-8 col-center" multiple="multiple" id="tec">
						
						<select id="selectpicker"  class="form-control selectpicker" data-live-search="true" multiple>
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
					<div class="col-xs-4 col-md-8 col-center" id="#ui-datepicker-div">
						<span>* Fecha de Apertura y Vencimiento</span>
						<div class="input-group daterangeico">
		                  	<input type="text" class="form-control pull-right daterange requerido" align="center" id="fechainicio-fechafin2" readonly="readonly">
		                  	<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>	
		                </div>
		            </div>
					<div class="col-xs-4 col-md-8 col-center" id="#ui-datepicker-div" style="display:none;">
						<span>* Fecha de apertura</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechaapertura2" readonly="readonly" value= "<?php echo date("d/m/Y");?>">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>
				</div>
<div style="margin:10px"></div>	
				 <div class="row">
			      	<div class="col-xs-4 col-md-12 col-center">
			      		<span>* Descripcion</span>
			        	<textarea class="form-control requerido" id="txtareadescripcion2" rows="2" style="resize: none;"></textarea>
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
		<button type="submit" id="btn-guardar-incidencia" class="btn btn-info"> Guardar Incidencia</button>  
	</div>
</div>
</div>


<script>
	$('.selectpicker').addClass('col-lg-8').selectpicker('setStyle');
</script>

<script>
$('#selectpicker').change(function(){
$('#dataOutput').html('');
var values = $('#selectpicker').val();
for(var i = 0; i < values.length; i += 1) {
	console.log(values)
}});
</script>

