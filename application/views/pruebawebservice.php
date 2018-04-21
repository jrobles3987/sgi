<div class="row container col-lg-12 col-center">
	<button type="submit" id="accion" class="btn btn-info">Acción</button>
	<input type="text" id="razonsocial">
</div>
<script type="text/javascript">
	$('#accion').click(function() {
		$.ajax({
	        type: "GET",
	        url: "https://declaraciones.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/ConsolidadoContribuyente/obtenerPorNumerosRuc",
	        data: {ruc: 1313763987001},
	        success: function (data) {
	            //var json = JSON.parse(data);
	            //alert(data[0].razonsocial);
	            $('#razonsocial').val(data[0].razonSocial);
	        },
	        error: function (xhr, exception) {
	        }
	    });
	});
</script>