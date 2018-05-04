<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="Vmodalmodificar_marca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B>Actualizar Marca</B></h5>
      </div>
      <div class="modal-body">
	<div class="panel panel-default panel-fade col-md-12 col-center">
		<div class="panel-body">
			<div style="margin:10px"></div>
        <div class="row">
			      	<div class="col-xs-4 col-md-8 col-center">
                <label class="control-label">Nombre Marca</label>
			      		<!-- <span>* Nombre Marca</span> -->
                <input class="form-control requerido" id="txt_nomarca1" rows="1" style="resize: none;" autofocus>
			        	<input style="display:none;" class="form-control requerido" id="txtidmarca" rows="1" style="resize: none;" autofocus>
			      	</div>
				</div>
				<div style="margin:10px"></div>

	    </div>
		<div style="margin:10px"></div>
	</div>
</div>
</div>
<div class="modal-footer">
		<button type="button" class="btn btn-error" data-dismiss="modal"> Cerrar</button>
		<button type="submit" id="btn-modficar_marca" class="btn btn-info"> Modificar Marca</button>
	</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script >
	$(document).ready(function() {

///////
$('#btn-modficar_marca').click(function() {
  var nombremarca = $('#txt_nomarca').val();
  var idmarca = $('#txtidmarca').val();
  $('#div_loading').css('display','inline');
  $.ajax({
          type: "POST",
          url: "<?php echo base_url('marcasequipos/ModificarEquiposMarcas');?>",
          data: {NombreMarca: nombremarca},
          success: function (data) {
              var json = JSON.parse(data);
              $('#div_loading').css('display','none');
              if (json.res == "t") {
                $('#txt_nomarca').val("");
                  $('#formcrearmarcas').css('display','none');
                  // sweetAlert("", "Datos guardados!", "success");
                  ReDibujaTablaCalificacion();
                  setTimeout("$('#Vmodalmodificar_marca').modal('hide');",1000)
                  toastr.success("Los datos se a Guardado Correctamente","Atención",{
            				"timeOut": "5000",
            				"extendedTImeout": "5000",
            				"closeButton": true,
            				"positionClass": "toast-bottom-left"	});
              }else{
                  if (json.res == "error"){
                  swal("","El nombre de la Marca esta vacio","info");
                }else{
                  swal("","Ocurrio un error al guardar!","error");
                }
              }
          },
          error: function (xhr, exception) {
          }
    });
});

///////

////
	});

</script>
