<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://vitalets.github.io/x-editable/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
        $('[id="dates"]').editable(); 

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

    // $('input[type=file]').change(function () {
    //     fileCount = this.files.length;
    //     $(this).prev().text(fileCount + ' selected');
    // });


});
</script>

