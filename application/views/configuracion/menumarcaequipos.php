<?php include("Vmodalnueva_marca.php");?>
<?php include("Vmodalmodificar_marca.php");?>

<div class="row container col-lg-12 col-center">
	<div class="panel panel-default panel-fade">
		<div class="panel-heading">
			<span class="panel-title">
				<div class="pull-right">
					<p><a  href="#" class="btn btn-primary btn-block" id="btn_nueva_marca">Nuevas Marcas</a></p>
				</div>
				<div class="clearfix"></div>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="v_fuente">
					<div class="panel panel-default col-md-6 col-center" style="padding: 1px,1px,1px,1px">
					    <center><B> Marcas Equipos</B><center/>
					</div>
<!-- /////inicio de tabla recargable////// -->
<div id="tabla_marcas_ingresadas">
<TABLE id="tablamarca" class="table table-striped table-bordered table-hover">
<?php
echo '<THEAD>';
echo '<TR><TH>N°</TH><TH>Nombre</TH><TH>Estado</TH><TH>Acciones</TH></TR>';
echo '</THEAD>';
echo '<TBODY>';
echo '</TBODY>';
?>
</TABLE>
</div>

<!-- /////fin de dibujo de tabla//////			 -->
					<!-- <div>
						<TABLE id="tablaincidenciasfuentes" class="table table-striped table-bordered table-hover">
							<?php
								echo '<THEAD>';
								echo '<TR><TH>N°</TH><TH>Nombre</TH><TH>Estado</TH><TH>Acciones</TH></TR>';
								echo '</THEAD>';
								echo '<TBODY>';
								$num=0;
								if($listar_marcas){
									foreach ($listar_marcas as $fila) {
										$num++;
										echo '<TR><TD>'.$num.'</TD><TD>'.$fila->nombremarca.'</TD><TD>'.$fila->estado.'</TD></TR>';
									}
								}
								echo '</TBODY>';
							?>
						</TABLE>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="modal-body">
	</div>

<script>
ReDibujaTablaCalificacion();

$('#tablamarca').dataTable({
	//quitar para paginacion por defecto
	"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
});

 var datafrom
 dataform = {
  idmarca: $('#txttituloincidencia2').val()
 	tituloincidencia: $('#txttituloincidencia2').val(),
 	 }


function ReDibujaTablaCalificacion () {
	$('#div_loading_cargando').css('display','inline');
	$.ajax({
					type: "POST",
					url: "<?php echo base_url('marcasequipos/ReDibujarTablaMarca');?>",
					data: {idincidencia: 1},
					success: function (data) {
						//var tabla = JSON.parse(data);
						document.getElementById("tabla_marcas_ingresadas").innerHTML = "";
						document.getElementById("tabla_marcas_ingresadas").innerHTML = data;
						$('.modificar').click(function() {
							// this.id;
							marcamodal(this.id);
							eliminarmarca(this.id);
							$('#Vmodalmodificar_marca').modal({show:true});
						});
						$('#tablamarca').dataTable({
							//quitar para paginacion por defecto
							"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
						});
					},
					complete : function(xhr, status) {
							$('#div_loading_cargando').css('display','none');
					},
					error: function (xhr, exception) {
			alert("error");
					}
		});
}

function eliminarmarca(x){
	$('.eliminar').click(function() {
		swal({
		title: "Esta seguro de eliminar el registro",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete",
		cancelButtonText: "No, cancel",
		timer: 4000,
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
		} else {
			swal.close();
		}
	});

});
}
///////////funcion llenar modal
function marcamodal(x)
{
	$.ajax({
					type: "POST",
					url: "<?php echo base_url('marcasequipos/mostrarmarcas');?>",
					data: {idmarca: x},
					success: function (data) {
			var json1 = JSON.parse(data);
			$('#txtidmarca').val(x);
			$('#txt_nomarca1').val(json1.nombremarca);
					},
					error: function (xhr, exception) {
			alert("error");
					}
		});
	$('#Vmodalmodificar_marca').modal({show:true});
}
////llamar modal nueva marcar
	$('#btn_nueva_marca').click(function() {
		LimpiarModalIngresoIncidencias();
		$('#Vmodalnueva_marca').modal({show:true});
	});
	function LimpiarModalIngresoIncidencias(){
		$('#txt_nomarca').val("");
	}
	</script>
