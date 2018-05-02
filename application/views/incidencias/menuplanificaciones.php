
<?php include("vplani.php");?>

<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-right">
					<p>
          <a  href="#" class="btn btn-primary btn-block" id="btn_nuevasplanificaciones">Nuevas Planificaciones</a>
          </p>
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div style="margin:20px"></div>
				<div id="tabla_planificacion" style="padding: 10px;">
				<?php
					echo '<TABLE id="tablaplanificaciones" class="table table-striped table-bordered table-hover">';
					echo '<THEAD>';
					echo '<TR><TH>N°</TH><TH>Titulo</TH><TH>Fecha Apertura</TH><TH>Fecha Finalización</TH><TH>Localización</TH></TR>';
					echo '</THEAD>';
					echo '<TBODY>';
					echo '</TBODY>';
					echo '</TABLE>';
				?>
				</div>
			</div>
	        <div class="col-md-6">
				<div class="panel-body">
					<div id="calendario_planificaciones"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
 function LimpiarModalIngresoIncidencias () {
    $('#txttituloincidencia2').val('');
    $('#txtareadescripcion2').val('');
    $("#selectpicker").val('');
  }
  $('#btn_nuevasplanificaciones').click(function() {
    LimpiarModalIngresoIncidencias();
    $("#selectpicker").selectpicker("render");
    $('#vplani').modal({show:true});
  });
</script>


<script>

  ReDibujaTablaPlanificacion();
  RedibujaCalendario();

	function ReDibujaTablaPlanificacion () {
		$('#div_loading').css('display','inline');
		$.ajax({
            type: "POST",
            url: "<?php echo base_url('incidencias/ReDibujarTablaPlanificaciones');?>",
            data: {idincidencia: 1},
            success: function (data) {
				//var tabla = JSON.parse(data);
				document.getElementById("tabla_planificacion").innerHTML = "";
				document.getElementById("tabla_planificacion").innerHTML = data;
				$('#tablaplanificaciones').dataTable({
					//quitar para paginacion por defecto
					"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
				});
            },
            complete : function(xhr, status) {
                $('#div_loading').css('display','none');
            },
            error: function (xhr, exception) {
				alert("error");
            }
	    });
	}

	$('#tablaplanificaciones').dataTable({
		//quitar para paginacion por defecto
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
	});

  function RedibujaCalendario() {    
    $('#calendario_planificaciones').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hoy',
        month: 'Meses',
        week: 'Semanas',
        day: 'Dias'
      },
      events: '<?php echo base_url('Cplanificacion/ListarPlanificaciones');?>',    
      editable: false,
        droppable: true
    });
  }
  
</script>
