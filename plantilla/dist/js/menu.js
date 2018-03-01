$(document).ready(function() {
    $( "#btn-cs" ).click( function(e) {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                var json = JSON.parse(data);
                location.replace(json.redireccion);
            },
            error: function (xhr, exception) {
                   
            }
        });
        e.preventDefault();
    });
});