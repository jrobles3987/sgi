$(document).ready(function() {
    $('.date').datepicker({
    	autoclose: true,
    	orientation: "bottom"
    });

    $('#datetimepicker_start').datepicker({
    	autoclose: true,
    	orientation: "bottom",
    	format: 'yyyy-mm-dd'
    });

    $('#datetimepicker_end').datepicker({
    	autoclose: true,
    	orientation: "bottom",
    	format: 'yyyy-mm-dd'
    });
});