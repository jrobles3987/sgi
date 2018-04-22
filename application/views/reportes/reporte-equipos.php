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
              <li><a class="btn-equipos" href="#equiposr">REPORTE EQUIPO FEC-COMP</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipos" href="#equiposr">REPORTE LOCALIZACIÓN EQUIPO</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipos" href="#equiposr">REPORTE VIDA UTIL EQUIPOS</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="btn-equipos" href="#equiposr">REPORTE CUSTODIO EQUIPOS</a></li>
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
      <div hidden class="form-group col-md-11 filtros f-equiposr">
        <label class="control-label">Fecha Inicio:</label>
        <div class='input-group date'>
          <input type="text" class="form-control" id="datetimepicker_start" readonly="readonly"/>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div>
      </div>
      <div hidden class="form-group col-md-11 filtros f-equiposr">
        <label class="control-label">Fecha final:</label>
        <div class='input-group date'>
          <input type="text" class="form-control" id="datetimepicker_end" readonly="readonly"/>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div>
      </div>

      <div hidden class="form-group col-md-11 filtros ">
        <label class="control-label">Mes y año del reporte a generar:</label>
        <input id="dtp-month" placeholder="Seleccione" class="form-control dtp date" type="text">
      </div>
      <div hidden class="col-md-11 f-equiposr filtros f-equipos_ingre">
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
//

// se genera el pdf en base a la variable string tipo_reporte
$('.generar-reporte').click(function(){
  var fecha_inicio = $('#datetimepicker_start').val();
  var fecha_fin = $('#datetimepicker_end').val();
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
        swal("","Debes llenar la fecha de inicio y de fin Tupid@","info");
      }
        break;
        case 'equipos_ingre':
        load_pdf(BASE_URL+'reportes/consultas_equipos/get_equipo_general/');
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

</script>
