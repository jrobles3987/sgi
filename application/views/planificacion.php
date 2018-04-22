
<div class="row container col-lg-11 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-left">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Usuarios del Sistema</a></li>
				</ul>
				</div>
				<div class="pull-right" id="btn-NuevosUsuarios">
					<p>
						<a class="btn btn-primary btn-block" id="btn-NuevosUsuarios">Agregar Nuevos Usuarios</a>
					</p>                           
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_incidencias">					
					<div>
						<TABLE id="tablausuarios" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Cédula</TH><TH>Nombres</TH><TH>Email Utm</TH><TH>Rol</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($usuarios){
									foreach ($usuarios as $fila) {				
										$num++;
                                        echo '<TR id="'.$fila->cedula.'" onclick="myFunctionUsuarios(this)"><TD>'.$num.'</TD><TD>'.$fila->cedula.'</TD><TD>'.$fila->nombres.'</TD><TD>'.$fila->emailutm.'</TD><TD>'.$fila->rol.'</TD></TR>'; 
                                        //echo $fila->idpersonal;
									}
								}
								echo '</TBODY>';
							?>
						</TABLE>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="modal-body">					
	</div>

