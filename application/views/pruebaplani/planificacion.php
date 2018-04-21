<!DOCTYPE html>
<!-- Formulario de creacion de Incidencia -->
<div class="row container col-lg-12 col-center">
		<div class="panel panel-default panel-fade">
			<div class="panel-heading">
				<span class="panel-title">
					<div class="pull-left">
						<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Ingreso de Incidentes</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</span>
			</div>

			<div class="panel-body">
				<div class="panel panel-default panel-fade col-md-10 col-center">

               		 <div class="row">
					      	<div class="col-xs-4 col-md-8 col-center">
					      		<span>* Titulo de la incidencia</span>
					        	<textarea class="form-control" id="txttituloincidencia" rows="1" style="resize: none;" autofocus></textarea>
					      	</div>							
					</div>
					<div  class="row">
						<div class="col-xs-4 col-md-8  col-center">
							<span>* Categoria de la incidencia</span>
							<select id="selectcategoria" class="form-control">
							<option value="0">Seleccione la categoria de la incidencia...</option>
								<?php
									foreach ($categorias as $c) {
										echo '<option value="'.$c->idcategoria.'">'.$c->nombre.'</option>';
									}
								?>
							</select>
					    </div> 
					</div>

				<div class="row">
					<div class="col-xs-4 col-md-4">
					<span>* Fecha de apertura</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechaapertura" readonly="readonly" value= "<?php echo date("d/m/Y");?>">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>

					<div class="col-xs-4 col-md-4">
					<span>* Fecha vencimiento</span>
						<div class='input-group date'>
							<input type="text" class="form-control" id="fechavencimiento" readonly="readonly"/>
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div> 	
					</div>
				</div>
                
                         <div class="row" >
					    	<div class="col-xs-4 col-md-6">
					      		<span>* Estado incidencia</span>
					        	<select id="selectestado" class="form-control">
								<option value="0">Seleccione el estado de la incidencia...</option>
									<?php
							      		foreach ($inciestados as $k) {
							      			echo '<option value="'.$k->idincidenciaestado.'">'.$k->estado.'</option>';
							      		}
							      	?>
							    </select>
					         </div>
					      	<div class="col-xs-4 col-md-6">
                              <span>* Urgencia</span>
                              <select id="selecturgencia" class="form-control">
                                  <option value="0">Seleccione la urgencia de incidencia...</option>
                                  	<?php
										foreach ($necesidades as $l) {
											echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
										}
									?>
                                  </select>	</div>
					    </div>
					    <div class="row" >
					      	<div class="col-xs-4 col-md-6">
                              <span>* Impacto</span>
                              	<select id="selectimpacto" class="form-control">
                                  <option value="0">Seleccione impacto incidencia...</option>
                                  	<?php
										foreach ($necesidades as $l) {
											echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
										}
									?>
                                </select>
					      	</div>
					      	<div class="col-xs-4 col-md-6">
                              <span>* Prioridad</span>
                              <select id="selectprioridad" class="form-control">
                              <option value="0">Seleccione la prioridad de la incidencia...</option>
                              	<?php
									foreach ($necesidades as $l) {
										echo '<option value="'.$l->idnecesidad.'">'.$l->nombre.'</option>';
									}
								?>
                              </select>
                              </div>
					    </div>
					    <div class="row" >					      	
					      	<div class="col-xs-4 col-md-6">
                              <span>* Fuente incidencia</span>
                              <select id="selectfuenteincidencia" class="form-control"autofocus>
                                  <option value="0">Seleccione la fuente de la incidencia...</option>
                                  <?php
                                        foreach ($fuentetipo as $j) {
											$seleccionado_fuente = '';
											if ($j->idincidenciafuente == 1){
												$seleccionado_fuente = 'selected';
											}
                                            echo '<option value="'.$j->idincidenciafuente.'" '.$seleccionado_fuente.'>'.$j->nombre.'</option>';
                                        }
                                    ?>
                              </select>
					        </div>
					    </div>
						<div class="row">
							<div class="col-xs-4 col-md-6">
                              <span>* Técnico Asignado</span>
							  <select id="selectecnico" class="form-control">
                              <option value="0">Seleccione el Técnico...</option>
                              	<?php
									foreach ($tecnicos as $t) {
										echo '<option value="'.$t->idpersonal.'">'.$t->nombres.'</option>';
									}
								?>
                              </select>
					      	</div>
						</div>
					    <div class="row" >
					    	<div class="col-xs-6 col-md-12">
					      		<span>* Localizacion</span>
					        	<select id="selectlocalizacion" class="form-control">
					        		<option value="0">Seleccione la localizacion incidencia...</option>
					        		<option value="1">Bodega</option>
					        		<option value="2">Departamento de Rectorado</option>
					        		<option value="3">Facultad de Ciencias Informticas</option>
					        		<option value="4">Facultad de Ciencias Administrativas y econmicas</option>
							    </select>
					      	</div>
					    </div>
						<div style="margin:10px"></div>
                        <div class="row">
					      	<div class="col-xs-4 col-md-12">
					      		<span>* Descripcion</span>
					        	<textarea class="form-control" id="txtareadescripcion" rows="2" style="resize: none;"></textarea>
					      	</div>
					    </div>	
				    </div>
	          	</div>
          	<div style="margin:10px"></div>
	          	<div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-3" id="btn-guardar-incidencia">
                        <p>
                            <a class="btn btn-primary btn-block">Guardar Datos</a>
                        </p>
                    </div>
                </div>
			</div>
		</div>
</div>
