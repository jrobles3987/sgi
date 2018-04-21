//// COMBO MARCA
		$('#selectmarca').change(function(){
			$('#selectmarca option:selected').each(function(){
				idmarca= $('#selectmarca').val();
				$.post("<?php echo base_url('marcasequipos/ListarEquiposModelos');?>", {
					idMarcaseleccionada: idmarca
				}, function(data){
					$("#selectmodelo").html(data);
					if(document.getElementById("selectmodelo").length>1){
						document.getElementById("selectmodelo").disabled=false;
						$("#btn-creamodelos").css('display','inline');
					}else{
						if (idmarca!=0) {
							$("#selectmodelo").html('<option value="0"></option>');
							document.getElementById("selectmodelo").disabled=true;
							$("#btn-creamodelos").css('display','inline');
						}else{
							$("#selectmodelo").html('<option value="0"></option>');
							document.getElementById("selectmodelo").disabled=true;
							$("#btn-creamodelos").css('display','none');
						}
					}				
				});
				//$("#txtareadescripcion").val($("#txtareadescripcion").val()+' fb.idfamiliabien <> '+idfamiliabien+' and \n');
			});
		});

				
		//GUARDAR MARCAS NUEVAS
		$('#btn-CMguardar').click(function() {
			var nombremarca = $('#inp-CMnombredemarca').val();
			$('#div_loading').css('display','inline');
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url('marcasequipos/GuardarEquiposMarcas');?>",
	            data: {NombreMarca: nombremarca},
	            success: function (data) {
	                var json = JSON.parse(data);
	                $('#div_loading').css('display','none');
	                if (json.res == "t") {
	                	$('#inp-CMnombredemarca').val("");
	                    $('#formcrearmarcas').css('display','none');
	                    sweetAlert("", "Datos guardados!", "success");
	                }else{
	                    if (json.res == "error"){
	                		swal("","El nombre de la Marca esta vacio","info");
	                	}else{
	                		swal("","Ocurrio un error al guardar!","error");
	                	}
	                }
	            	$.post("<?php echo base_url('marcasequipos/ListarEquiposMarcas');?>"
					, function(data){
						$("#selectmarca").html(data);
					});
	            },
	            error: function (xhr, exception) {
	            }
		    });		
		});
		
		//GUARDAR MODELOS NUEVOS
		$('#btn-CMoguardar').click(function() {
			var idmarca = $('#selectmarca').val();
			var nombremodelo = $('#inp-CMonombredemodelo').val();
			$('#div_loading').css('display','inline');
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url('marcasequipos/GuardarEquiposModelos');?>",
	            data: {IdMarca: idmarca, NombreModelo: nombremodelo},
	            success: function (data) {
	                var json = JSON.parse(data);
	                $('#div_loading').css('display','none');
	                if (json.res == "t") {
	                	$('#inp-CMonombredemodelo').val("");
	                    $('#formcrearmodelos').css('display','none');
	                    sweetAlert("", "Datos guardados!", "success");
	                }else{
	                	if (json.res == "error"){
	                		swal("","El nombre del Modelo esta vacio","info");
	                	}else{
	                		swal("","Ocurrio un error al guardar!","error");
	                	}                    
	                }            	
	            	$.post("<?php echo base_url('marcasequipos/ListarEquiposModelos');?>", {
						idMarcaseleccionada: idmarca
					}, function(data){
						document.getElementById("selectmodelo").disabled=false;
						$("#selectmodelo").html(data);
					});
	            },
	            error: function (xhr, exception) {
	            }
		    });
		});