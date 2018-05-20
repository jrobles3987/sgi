<div class="row container col-lg-12 col-center">
	<div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div style="margin:30px"></div>
                <div class="panel panel-default col-md-9 col-center" style="padding: 1px,1px,1px,1px">
                    <center><B>Estadísticas de Incidencias por Urgencia</B><center/>
                </div>
                <div style="margin:20px"></div>
                <div class="box-group" id="accordion">
                <div id="chart"></div>               
                </div>
                <div style="margin:30px"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var json1
    $.post("<?php echo base_url('incidencias/EstadisticasIncidenciasUrgencia');?>"
    , function(datos){
        if(datos){
            var json1 = JSON.parse(datos);					
            var data = {};
            var conteos = [];
            json1.forEach(function(e) {
                conteos.push(e.nombre);
                data[e.nombre] = e.conteo;
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
</script>