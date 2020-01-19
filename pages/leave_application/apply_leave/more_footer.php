<script src="<?php echo root_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Page script -->
<script type="text/javascript">
    $(document).ready(function(){

    	// $('#reservation').daterangepicker({
        	
    	// }); 

        

        // $('input[type="radio"]').click(function() {
        //    alert("test");   
        // });

        // $("#optionsRadios1").on('change', function(e){ 
        //     alert("test");
        // });

        // $(document).on('change', 'input:radio[id^="q_op_"]', function (event) {
        //     alert("click fired");
        // });

        // if ( $(".halfradio").is(':checked')); alert("hola");

         // if ( $(".halfradio").is(':click')) { 
         //   alert("Hey");
         // } 

        // $(".halfradio").click(function(){
        //     // alert("Hey");
        //     var cal = $("#reservation").val()
        //     $.post("cal_duration.php", {
        //             dates: cal
        //         }, function(data, status){
        //             $("#ajaxdur").val("0.5 day");
        //             if (data.length == 5) {
        //                 // Hide the element
        //                 $('#radiobtn').show();
        //               } else {
        //                 // Otherwise show it
        //                 $('#radiobtn').hide();
        //               }
        //         });
        // });

        $('.halfradio').on('ifChecked', function(event){
          var cal = $("#reservation").val()
            $.post("cal_duration.php", {
                    dates: cal
                }, function(data, status){
                    $("#ajaxdur").val("0.5 day");
                    if (data.length == 5) {
                        // Hide the element
                        $('#radiobtn').show();
                      } else {
                        // Otherwise show it
                        $('#radiobtn').hide();
                      }
                });
        });

        // $(".iCheck-helper").click(function(){
        //     // alert("Hey");
        //     var cal = $("#reservation").val()
        //     $.post("cal_duration.php", {
        //             dates: cal
        //         }, function(data, status){
        //             $("#ajaxdur").val("0.5 day");
        //             if (data.length == 5) {
        //                 // Hide the element
        //                 $('#radiobtn').show();
        //               } else {
        //                 // Otherwise show it
        //                 $('#radiobtn').hide();
        //               }
        //         });
        // });

        $('.fullradio').on('ifChecked', function(event){
          var cal = $("#reservation").val()
            $.post("cal_duration.php", {
                    dates: cal
                }, function(data, status){
                    $("#ajaxdur").val(data);
                    if (data.length == 5) {
                        // Hide the element
                        $('#radiobtn').show();
                      } else {
                        // Otherwise show it
                        $('#radiobtn').hide();
                      }
                });
        });

        // $(".fullradio").click(function(){
        //     // alert("Hey");
        //     var cal = $("#reservation").val()
        //     $.post("cal_duration.php", {
        //             dates: cal
        //         }, function(data, status){
        //             $("#ajaxdur").val(data);
        //             if (data.length == 5) {
        //                 // Hide the element
        //                 $('#radiobtn').show();
        //               } else {
        //                 // Otherwise show it
        //                 $('#radiobtn').hide();
        //               }
        //         });
        // });

        // $('.btn-default').on('click', function(){
            // $.post(
            //     'con/itemsList.php',
            //     { selType : $(this).find('input').attr('id') },
            //     function(data) {
            //         $('#selectPicker').html(data);
            //     }
            // );
        // }); 


    // 	$("#reason").focus(function(){
    // 		var cal = $("#reservation").val()
    // 		$.post("cal_duration.php", {
				// 	dates: cal
				// }, function(data, status){
				// 	$("#ajaxdur").val(data);
    //                 if (data.length == 5) {
    //                     // Hide the element
    //                     $('#radiobtn').show();
    //                   } else {
    //                     // Otherwise show it
    //                     $('#radiobtn').hide();
    //                   }
				// });
    // 	});

    	$("#admin_select").change(function(){
    		var emp_id = $(this).val();

    		$.ajax({
    			url: "ajax_load.php",
    			method:"POST",
    			data:{emp_sel:emp_id},
    			success:function(data){
    				 $("#ajax").html(data);
    			}
    		});
    	});

        $('#radiobtn').hide();

        $(function() {
          $('input[id="reservation"]').daterangepicker({
            opens: 'left',
            startDate: moment(),
            endDate: moment().subtract('days', 1)
          }, function(start, end, label) {
           var cal = $("#reservation").val()
            $.post("cal_duration.php", {
                    dates: start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD')
                }, function(data, status){
                    $("#ajaxdur").val(data);
                    if (data.length == 5) {
                        // Hide the element
                        $('#radiobtn').show();
                      } else {
                        // Otherwise show it
                        $('#radiobtn').hide();
                      }
                });
          });

        });


         // if (data.length == 6) {
         //                // Hide the element
         //                $('#radiobtn').hide();
         //              } else {
         //                // Otherwise show it
         //                $('#radiobtn').show();
         //              }

  //   	$('#daterange').on('apply.daterangepicker', function(ev, picker) {
		//     alert ('hello');
		// });

  //   	$("input").keyup(function(){
		// 		var name = $("input").val();
		// 		$.post("suggestions.php", {
		// 			suggestion: name
		// 		}, function(data, status){
		// 			$("#test").html(data);
		// 		});
		// 	});

		// $("button").click(function(){
		// 	commentCount = commentCount + 2;
		// 	$("#comments").load("loadComments.php", {commentNewCount: commentCount,
		// 		secondData: "dataValue"
		// 	}); 
		// });

    });
        
</script>