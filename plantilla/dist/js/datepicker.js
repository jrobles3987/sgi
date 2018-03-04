$(document).ready(function() {
    
    $('.date').datepicker({
    	"autoclose": true,
    	"orientation": "bottom"
    });

    $('.daterange').daterangepicker({
        "format": 'yyyy-mm-dd',
        "autoApply": true,
        "opens": "center"
    });

    $('.daterangeico span').click(function() {
          $(this).parent().find('input').click();
    });     

});