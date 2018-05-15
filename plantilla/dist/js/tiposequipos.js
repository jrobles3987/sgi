function VerificaTiposEquipos(baseurl,tipobien,familiabien,subfamiliabien){
    dataform = {
        tipobien: tipobien,
        familiabien: familiabien,
        subfamiliabien: subfamiliabien
    }

    $.ajax({
        type: "POST",
        url: baseurl+"bienes/VerificaTiposDeEquipos",
        data: dataform,
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json);
        },
        error: function (xhr, exception) {
        }
    });
}
    