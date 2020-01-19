<!-- <script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/bootstrap-table/src/bootstrap-table.js"></script>
<script src="../assets/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js"></script>
<script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="../ga.js"></script>
 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $("#myBtn2").click(function(){
        $("#myModal2").modal();
    });

    $.fn.editable.defaults.mode = 'inline';

    $('[id="ltname"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    });

    $('[id="ltdef"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    }); 

    $('[id="ltacf"]').editable({
    	// defaultValue: "Please choose."
                success: function(response, newValue) {
            $(this).css('display', 'inline');
        }
    }); 
});
</script>