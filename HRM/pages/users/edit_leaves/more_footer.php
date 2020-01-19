<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
    $('[id="tdata"]').editable({
    	        success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $("#myBtn").click(function() {

	 $.ajax({
	  type: "POST",
	  url: "new_year.php"
	}).done(function(msg) {
	  // alert("Days successfully carried forward! :D");
	});    

	alert("Days successfully carried forward! :D");
	    });

    
});
</script>

