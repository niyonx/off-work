<!-- <script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/bootstrap-table/src/bootstrap-table.js"></script>
<script src="../assets/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js"></script>
<script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script> -->
<script src="https://vitalets.github.io/x-editable/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="http://usebootstrap.com/preview/adminlte/js/plugins/input-mask/jquery.inputmask.js"></script>
<script src="http://usebootstrap.com/preview/adminlte/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="http://usebootstrap.com/preview/adminlte/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- <script src="../ga.js"></script> -->

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $("#myBtn2").click(function(){
        $("#myModal2").modal();
    });

    $('[id="holiname"]').editable();

    $('[id="holidate"]').editable(); 

    
    $("#date-mask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
});


</script>