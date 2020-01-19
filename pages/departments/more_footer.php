<!-- <script src="../assets/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../assets/bootstrap-table/src/bootstrap-table.js"></script>
<script src="../assets/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js"></script>
<script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="../ga.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script>
$(document).ready(function(){
	$.fn.editable.defaults.mode = 'inline';

    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $("#myBtn2").click(function(){
        $("#myModal2").modal();
    });

    $('[id="dname"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $('[id="dcode"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    }); 

    $('[id="dhead"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    }); 
});
</script>