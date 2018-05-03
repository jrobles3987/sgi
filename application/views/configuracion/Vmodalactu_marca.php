<!-- Formulario de creacion de Incidencia -->
<div class="modal fade" id="Vmodalactu_marca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel" align="left"><B> Registrar Nueva Marca</B></h5>
      </div>
      <div class="modal-body">
	<div class="panel panel-default panel-fade col-md-12 col-center">
		<div class="panel-body">
			<div style="margin:10px"></div>
        <div class="row">
			      	<div class="col-xs-4 col-md-8 col-center">
                <label class="control-label">Nombre Marca</label>
			      		<!-- <span>* Nombre Marca</span> -->
			        	<textarea class="form-control requerido" id="txt_nomarca" rows="1" style="resize: none;" autofocus></textarea>
			      	</div>
				</div>
				<div style="margin:10px"></div>
        <div class="row">
              <div class="col-xs-4 col-md-8 col-center">
                <label class="control-label">Estado de la Marca</label>
                <!-- <span>* Nombre Marca</span> -->
                <textarea class="form-control requerido" id="txt_nomarca" rows="1" style="resize: none;" autofocus></textarea>
              </div>
        </div>
	    </div>
		<div style="margin:10px"></div>
	</div>
</div>
</div>
<div class="modal-footer">
		<button type="button" class="btn btn-error" data-dismiss="modal"> Cerrar</button>
		<button type="submit" id="btn-guardar" class="btn btn-info"> Guardar Incidencia</button>
	</div>
</div>
</div>
<script src="<?=base_url('plantilla/dist/js/datepicker.js');?>"></script>
<script >
	$(document).ready(function() {

///////
$('#btn-guardar').click(function() {
  var nombremarca = $('#txt_nomarca').val();
  $('#div_loading').css('display','inline');
  $.ajax({
          type: "POST",
          url: "<?php echo base_url('marcasequipos/GuardarEquiposMarcas');?>",
          data: {NombreMarca: nombremarca},
          success: function (data) {
              var json = JSON.parse(data);
              $('#div_loading').css('display','none');
              if (json.res == "t") {
                $('#txt_nomarca').val("");
                  $('#formcrearmarcas').css('display','none');
                  // sweetAlert("", "Datos guardados!", "success");
                  ReDibujaTablaCalificacion();
                  setTimeout("$('#Vmodalnueva_marca').modal('hide');",1000)
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
