
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

  function ini_events(ele) {
    ele.each(function () {
      var eventObject = {
        title: $.trim($(this).text())
      };        
      $(this).data('eventObject', eventObject);
      $(this).draggable({
        zIndex: 1070,
        revert: true, // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });

    });
  }

  ini_events($('#external-events div.external-event'));
  var date = new Date();
  var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

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
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped
        var originalEventObject = $(this).data('eventObject');
        var copiedEventObject = $.extend({}, originalEventObject);
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        if ($('#drop-remove').is(':checked')) {
          $(this).remove();
        }
      }
  });
  /* ADDING EVENTS */
  var currColor = "#3c8dbc"; //Red by default
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      currColor = $(this).css("color");
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);
      ini_events(event);
      $("#new-event").val("");
    });
</script>
