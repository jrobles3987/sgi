$(document).ready(function() {
    $("form").on("submit", function(e) {
        $('#div_loading').css('display','inline');
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                var json = JSON.parse(data);
                $(".errorsession").html("").css({"display":"none"});
                $(".loginname").css({"background-color": "#fff", "font-style": "normal"});
                $(".password").css({"background-color": "#fff", "font-style": "normal"});
                if (json.res == "error") {
                    if (json.loginname) {
                        $(".errorsession").append(json.loginname).css({"display":"block"});
                        $(".loginname").css({"background-color": "#DAF7A6", "font-style": "oblique"});
                    }
                    if (json.password) {
                        $(".errorsession").append(json.password).css({"display":"block"});
                        $(".password").css({"background-color": "#DAF7A6", "font-style": "oblique"});
                    }
                    $('#div_loading').css('display','none');
                }else{
                    if(json.res == "success" && json.sess == false) {
                        $(".errorsession").append(json.mensaje).css({"display":"block"});
                        $(".loginname").css({"background-color": "#DAF7A6", "font-style": "oblique"});
                        $(".password").css({"background-color": "#DAF7A6", "font-style": "oblique"});
                    }else{                                                      
                        location.replace(json.redireccion);
                    }                    
                }            
            },
            complete : function(xhr, status) {
                $('#div_loading').css('display','none');
            },
            error: function (xhr, exception) {
                   
            }
        });
        e.preventDefault();

    });
});