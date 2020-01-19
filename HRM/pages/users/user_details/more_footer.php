<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
    $('[id="tdata"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $('[id="tdept"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $('[id="thead"]').editable({
    	// defaultValue: "Please choose."
        success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $('[id="tactive"]').editable({ 
    	defaultValue: "Please choose.",
    	source:[{value:"active", text: "active"},{value:"inactive", text:"inactive"}]
    });

    $('[id="tadmin"]').editable({ 
        defaultValue: "Please choose.",
        source:[{value:"true", text: "yes"},{value:"false", text:"no"}]
    });

    $('[id="talthead"]').editable({ 
        defaultValue: "Please choose.",
        source:[{value:"true", text: "yes"},{value:"false", text:"no"}]
    });
});
</script>

