<div class="row container col-lg-11 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#inicio" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Inicio</a></li>					
				</ul>
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
                <div class="tab-pane fade in active" id="inicio">							 
					 <FORM ACTION="" METHOD="post">
						<INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
						<TABLE class="table">
						<TBODY>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="asignadas"> Incidencias asignadas<span class="caret"></span></a></h3></TD></TR>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Incidencias en curso<span class="caret"></span></a></h3></TD></TR>
							<TR><TD><h3><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Incidencias en observación<span class="caret"></span></a></h3></TD></TR>
						</TBODY>
						</TABLE>
					</FORM>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('plantilla/dist/js/menuinicio.js')?>"></script>