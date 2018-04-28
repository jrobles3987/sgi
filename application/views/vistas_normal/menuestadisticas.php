<div class="row container col-lg-12 col-center">
	<div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
            	<div style="margin:30px"></div>
            	<div class="panel panel-default col-md-9 col-center" style="padding: 1px,1px,1px,1px">
			    	<center><B>Estadísticas de Incidencias Reportadas</B><center/>
				</div>
				<div style="margin:20px"></div>
				<div  class="row">
					<div class="col-xs-4 col-md-5  col-center">
						<span>Tipo de Reporte Estadístico</span>
						<select id="selectreporte" class="form-control">
							<option value="0">Seleccione el tipo de reporte...</option>
							<option value="1">Reporte de incidencias por estados</option>
							<option value="2">Reporte 2</option>
							<option value="3">Reporte 3</option>
						</select>
				    </div> 
				</div>
				<div style="margin:20px"></div>
              	<div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->                
                	<div id="chart"></div>               
             	</div>
             	<div style="margin:30px"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
<script type="text/javascript">	

	$('#selectreporte').change(function(){
		$('#selectreporte option:selected').each(function(){
			tipo_reporte= $('#selectreporte').val();
			Tipo_Estadistica(tipo_reporte);
		});
	});

	function Tipo_Estadistica (tipo) {
		if (tipo == 1) {
			var json1
			$.post("<?php echo base_url('incidencias/EstadisticasIncidenciasEstados');?>"
			, function(datos){
				if(datos){
					var json1 = JSON.parse(datos);					
					var data = {};
					var conteos = [];
					json1.forEach(function(e) {
					    conteos.push(e.estado);
					    data[e.estado] = e.conteo;
					})

					var chart = c3.generate({
				    data: {
				        // iris data from R
				        json: [data],
		                keys: {
		                	value: conteos,
		                },
				        type : 'pie'
				    }
				});	

				setTimeout(function () {
				    chart.load({
				        columns: [
				            ["Data1", 100000000],
				        ]
				    });
				}, 10);	

				setTimeout(function () {
				    chart.unload({
				        ids: 'Data1'
				    });
				}, 400);

				}
			});						
		};
	}
</script>