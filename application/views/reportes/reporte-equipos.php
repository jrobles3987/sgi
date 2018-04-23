<!-- nuevo - actualizar datetimepicker y poner en principal-->
<br>

<div id="container" class="container-fixed">
  <!-- titulo -->
  <div class="row">
    <div class="col-md-12 divider"></div>
    <div class="col-md-8" style="color: #428BCA">
      <h3 class="">Reportes Generales<small class="reporte-seleccionado"></small></h3>
    </div>
    <div align="right" class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <h6 class=""><div class="btn-group" align="right">
            <button type="button" class="btn btn-md btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tipos de reportes disponibles <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="btn-equipos_ingresados" href="#equipos_ingre">REPORTE EQUIPOS EXISTENTES</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipos" href="#equiposr">REPORTE EQUIPOS FEC-ING</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equiposcompra" href="#equiposcompra">REPORTE EQUIPO FEC-COMP</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipolocal" href="#equipolocal">REPORTE LOCALIZACIÓN EQUIPO</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipos" href="#equiposr">REPORTE VIDA UTIL EQUIPOS</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-custodio_equipo" href="#custodio_equipo">REPORTE CUSTODIO EQUIPOS</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-estado_equipo" href="#estado_equipo">REPORTE ESTADO EQUIPOS</a></li>
              <!-- <li role="separator" class="divider"></li> -->
            </ul>
          </div></h6>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="divider-header"></div>
    </div>
  </div>
  <!--  -->
  <div class="col-md-3">
    <h4 class="" style="color: #428BCA">Filtro disponible:</h4>
    <div class="alert alert-info col-md-10" role="alert">Seleccionar tipo reporte</div>
    <!-- filtros de enfermera -->
    <div class="row">
      <div hidden class="form-group col-md-11 filtros f-equiposr f-equiposcompra">
        <label class="control-label">Fecha Inicio:</label>
        <div class='input-group date'>
          <input type="text" class="form-control" id="datetimepicker_start" readonly="readonly"/>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div>
      </div>
      <div hidden class="form-group col-md-11 filtros f-equiposr f-equiposcompra">
        <label class="control-label">Fecha final:</label>
        <div class='input-group date'>
          <input type="text" class="form-control" id="datetimepicker_end" readonly="readonly"/>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div>
      </div>
      <!-- fitro de localizacion de equipos -->
      <div hidden class="form-group filtros col-md-12 f-equipolocal">
        <label class="control-label">Busqueda de Localización:</label>
        <select id="cmb_localizacion" name="busqueda" class="selectpicker busqueda" data-live-search="true" data-width="100%">
          <option selected disabled="disabled">Seleccione Departamento</option>
        </select>
      </div>
      <!-- fitro de persona a cargo de los equipos -->
      <div hidden class="form-group filtros col-md-12 f-custodio_equipo">
        <label class="control-label">Busqueda de Custodio:</label>
        <select id="cmb_custodio" name="custodio" class="selectpicker custodio" data-live-search="true" data-width="100%">
          <option selected disabled="disabled">Seleccione Persona</option>
        </select>
      </div>
      <!-- ///////combo de tipos de estados del equipo -->
<div hidden class="form-group filtros col-md-12 f-estado_equipo">
  <label class="control-label">Seleccione Estado:</label>
  <select id="cmb_tipo_estado" class="selectpicker form-control" data-width="100%">
    <option selected value="">Tipos estados</option>
  </select>
</div>
<!-- /////// -->

      <div hidden class="col-md-11 f-equiposr filtros f-equipos_ingre f-equiposcompra f-equipolocal f-custodio_equipo f-estado_equipo">
        <div class="divider"></div>
        <a class="btn btn-md btn-block btn-success generar-reporte"><i class="fa fa-file-pdf-o"></i> <strong> Generar reporte </strong> </a>
      </div>
    </div>
    <!--  -->
  </div>
  <!-- PDF -->
  <div class="col-md-9">
    <h4 class="" style="color: #428BCA">Reporte generado:</h4>
    <div align="center" id="pdf_load">
    </div>
    <div align="" id="pdf">
      <div align="left" class="alert alert-warning" role="alert">No ha sido generado el reporte aún... aplique los filtros correspondientes y haga click en "generar reporte"</div>
    </div>
  </div>
  <!--  -->
</div>

<!-- nuevo - actualizar datetimepicker y poner en principal-->
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script type="text/javascript">

// $('.selectpicker').selectpicker();
// carga el pdf - no modificar
function load_pdf(url){
  $('#pdf').empty();
  $('#pdf_load').empty();
  var e = document.createElement('embed');
  e.setAttribute('width', 800);
  e.setAttribute('height', 450);
  e.src = url;
  $('#pdf').append(e);
  $("#pdf_load").append('<i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i><span class="sr-only">Cargando PDF...</span>');
  e.addEventListener('load', function() {
    $("#pdf_load").empty();
  });
}
/////////////////// busqueda de localizacion
	var busqueda = {
		ajax          : {
			url     : BASE_URL+"reportes/consultas_equipos/get_equipo_local",
			type    : 'POST',
			dataType: 'json',
			data    : {
				q: '{{{q}}}'
			}
		},
		locale        : {
			emptyTitle: 'Escriba el procedimiento a aplicar'
		},
		preprocessData: function (data) {
			var i, l = data.length, array = [];
			if (l) {
				for (i = 0; i < l; i++) {
					array.push($.extend(true, data[i], {
						text : data[i].nombrelocalizacion,
						value: data[i].idlocalizacion,
						data : {
							subtext: data[i].idlocalizacion
						}
					}));
				}
			} 		return array;
		}
	};
	$('.selectpicker').selectpicker().filter('.busqueda').ajaxSelectPicker(busqueda);
	$('select').trigger('change');
  /////////////////// busqueda de localizacion
  	var custodio = {
  		ajax          : {
  			url     : BASE_URL+"reportes/consultas_equipos/get_custorio_equipo",
  			type    : 'POST',
  			dataType: 'json',
  			data    : {
  				q: '{{{q}}}'
  			}
  		},
  		locale        : {
  			emptyTitle: 'Escriba el procedimiento a aplicar'
  		},
  		preprocessData: function (data) {
  			var i, l = data.length, array = [];
  			if (l) {
  				for (i = 0; i < l; i++) {
  					array.push($.extend(true, data[i], {
  						text : data[i].nombrescompletos,
  						value: data[i].cedula,
  						data : {
  							subtext: data[i].cedula
  						}
  					}));
  				}
  			} 		return array;
  		}
  	};
  	$('.selectpicker').selectpicker().filter('.custodio').ajaxSelectPicker(custodio);
  	$('select').trigger('change');
    /////////combo de las estados de equipos
        $.getJSON(BASE_URL+'reportes/consultas_equipos/get_estados_equipos',function(data){
        	$.each(data,function(key,value){
        		$('#cmb_tipo_estado').append('<option value=' + value.idequiposestado + '>'+value.nombre + '</option>');
        		$('#cmb_tipo_estado').selectpicker('refresh');
        	});
        });
// se genera el pdf en base a la variable string tipo_reporte
$('.generar-reporte').click(function(){
  var fecha_inicio = $('#datetimepicker_start').val();
  var fecha_fin = $('#datetimepicker_end').val();
  var equilo = $("#cmb_localizacion option:selected").val();
  var custodioequipo = $("#cmb_custodio option:selected").val();
  var est_equi = $("#cmb_tipo_estado option:selected").val();

  if (fecha_inicio == '') {
     fecha_inicio = 0;
     fecha_fin = 0;
  }else {
    if (fecha_inicio == '') fecha_inicio = 'NO'
    if (fecha_fin == '') fecha_fin = 'NO'
  }
    var tamaño_hoja = $('#tamaño_hoja :selected').val();
    switch (tipo_reporte) {
      case 'equiposr':
      if (fecha_inicio!='NO' && fecha_fin!='NO' && fecha_inicio!=0 && fecha_fin!=0){
        load_pdf(BASE_URL+'reportes/consultas_equipos/get_equipo/'+fecha_inicio+'/'+fecha_fin);
      }else{
        swal("","Debes llenar la fecha de inicio y de fin..","info");
      }
        break;
        case 'equipos_ingre':
          load_pdf(BASE_URL+'reportes/consultas_equipos/get_equipo_general/');
        break;
        case 'equiposcompra':
        if (fecha_inicio!='NO' && fecha_fin!='NO' && fecha_inicio!=0 && fecha_fin!=0){
          load_pdf(BASE_URL+'reportes/consultas_equipos/get_equipo_compra/'+fecha_inicio+'/'+fecha_fin);
        }else{
          swal("","Debes llenar la fecha de inicio y de fin..","info");
        }
        break;
        case 'equipolocal':
        if (equilo!='') {
          load_pdf(BASE_URL+'reportes/consultas_equipos/get_equipo_lo/'+equilo);
        } else {
          swal("","Debes seleccionar un localizacón","info");
        }
        break;
        case 'custodio_equipo':
        if (custodioequipo!='') {
          load_pdf(BASE_URL+'reportes/consultas_equipos/get_custodios/'+custodioequipo);
        } else {
          swal("","Debes seleccionar un custodio","info");
        }
        break;
        case 'estado_equipo':
        if (est_equi!='') {
          load_pdf(BASE_URL+'reportes/consultas_equipos/get_esta/'+est_equi);
        } else {
          swal("","Debes seleccionar un Estado","info");
        }
        break;
      default:
    }
});

// se añaden botones segun tipos de reporte
$('.btn-equipos').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte Equipos Registrados');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-equiposr').show();
  tipo_reporte = 'equiposr';
});
//
$('.btn-equipos_ingresados').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte de Equipos Existentes');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-equipos_ingre').show();
  tipo_reporte = 'equipos_ingre';
});
//
$('.btn-equiposcompra').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte de Equipos por fecha de compra');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-equiposcompra').show();
  tipo_reporte = 'equiposcompra';
});
//
$('.btn-equipolocal').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte Localización de Equipos');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-equipolocal').show();
  tipo_reporte = 'equipolocal';
});
//
$('.btn-custodio_equipo').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte del custodio Equipo');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-custodio_equipo').show();
  tipo_reporte = 'custodio_equipo';
});
//
$('.btn-estado_equipo').click(function(e){
  e.preventDefault();
  $('.dtp').val('');
  $('.reporte-seleccionado').html('/ Reporte del estado equipos');
  $('.filtros').hide();
  $('.alert-info').hide();
  $('.f-estado_equipo').show();
  tipo_reporte = 'estado_equipo';
});
</script>
