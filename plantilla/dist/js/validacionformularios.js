function Validar_Formularios () {
	var error = 0;
	$('.requerido').each(function(i, elem){
		if($(elem).val() == '' || $(elem).val()==0){
			$(elem).css({'border':'1px solid red'});
			//$(elem).css({'background-color': '#F3F781'});
			error++;
			alert($(elem).id);
		}else{
			$(elem).css({'box-shadow':'none'});
			$(elem).css({'border-color':'#d2d6de'});					
			//$(elem).css({'background-color': '#FFFFFF'});
		}
	});

	if(error > 0){
		//event.preventDefault();
		toastr.info("Debe llenar todos los campos obligatorios del formulario","Atención",{
			"timeOut": "5000",
			"extendedTImeout": "5000",
			"closeButton": true,
			"positionClass": "toast-bottom-left"
		});
		return false;
	}else{
		return true;
	}
}

function Validar_Formularios2 () {
	var error = 0;
	$('.requerido2').each(function(i, elem){
		if($(elem).val() == '' || $(elem).val()==0){
			$(elem).css({'border':'1px solid red'});
			//$(elem).css({'background-color': '#F3F781'});
			error++;
			//alert($(elem).id);
		}else{
			$(elem).css({'box-shadow':'none'});
			$(elem).css({'border-color':'#d2d6de'});
			//$(elem).css({'background-color': '#FFFFFF'});
		}
	});

	if(error > 0){
		//event.preventDefault();
		toastr.info("Debe llenar todos los campos obligatorios del formulario","Atención",{
			"timeOut": "5000",
			"extendedTImeout": "5000",
			"closeButton": true,
			"positionClass": "toast-bottom-left"
		});
		return false;
	}else{
		return true;
	}
}

function Validar_Formularios3 () {
	var error = 0;
	$('.requerido3').each(function(i, elem){
		if($(elem).val() == '' || $(elem).val()==0){
			$(elem).css({'border':'1px solid red'});
			//$(elem).css({'background-color': '#F3F781'});
			error++;
			//alert($(elem).id);
		}else{
			$(elem).css({'box-shadow':'none'});
			$(elem).css({'border-color':'#d2d6de'});
			//$(elem).css({'background-color': '#FFFFFF'});
		}
	});

	if(error > 0){
		//event.preventDefault();
		toastr.info("Debe llenar todos los campos obligatorios del formulario","Atención",{
			"timeOut": "5000",
			"extendedTImeout": "5000",
			"closeButton": true,
			"positionClass": "toast-bottom-left"
		});
		return false;
	}else{
		return true;
	}
}