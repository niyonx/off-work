        <?php /*

        $json = array();

 // Query that retrieves events


 // connection to the database
  $db = getDbo();
  $sql = "select concat(e.firstname,' ', e.surname, ' is on ', lt.name) title, date_from start, date_to end from LMS.tbl_leave_application la, LMS.tbl_employee e, LMS.tbl_leave_types lt where la.emp_id = e.id and lt.id = la.lt_id and la.status = 'Approved';";
  $rows = $db->loadResult($sql);

 // sending the encoded result to success page
 pprint (json_encode($rows)); */

 // require_once('../../includes/utils.php');

  

  // $json = array();
  // $db = getDbo();
  // $sql = "select concat(e.firstname,' ', e.surname, ' is on ', lt.name) title, date_from start, date_to end from LMS.tbl_leave_application la, LMS.tbl_employee e, LMS.tbl_leave_types lt where la.emp_id = e.id and lt.id = la.lt_id and la.status = 'Approved';";
  // $rows = $db->loadResult($sql);

 // sending the encoded result to success page
    // echo (json_encode($rows));

 ?>

        <script src="<?php echo root_url(); ?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="<?php echo root_url(); ?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- Page specific script -->
        <script type="text/javascript">


            

            $(document).ready(function() {
              var date = new Date();
              var d = date.getDate();
              var m = date.getMonth();
              var y = date.getFullYear();

              var calendar = $('#calendar').fullCalendar({
               // editable: true,
               header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
               },
                

                events: url = "events.php",

               
               // Convert the allDay from string to boolean
               eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                 event.allDay = true;
                } else {
                 event.allDay = true;
                }
               },

    //            eventAfterRender: function (event, element, view) {
    //     // var dataHoje = new Date();
    //     $num = Math.floor(Math.random() * 6) + 1  

    //     if ($num==1) {
    //         //event.color = "#FFB347"; //Em andamento
    //         this.css('background-color', '#FFB347');
    //     } else if ($num==2) {
    //         //event.color = "#77DD77"; //Concluído OK
    //         this.css('background-color', '#77DD77');
    //     } else if ($num==3) {
    //         //event.color = "#AEC6CF"; //Não iniciado
    //         this.css('background-color', '#AEC6CF');
    //     } else if ($num==4) {
    //         //event.color = "#AEC6CF"; //Não iniciado
    //         this.css('background-color', '#AE00CF');
    //     } else if ($num==5) {
    //         //event.color = "#AEC6CF"; //Não iniciado
    //         this.css('background-color', '#AEFFCF');
    //     }
    // },
              

          //         eventAfterRender: function (event, element, view) {
          //     var dataHoje = new Date();
          //     var r = Math.floor(Math.random() * 4);
          //     switch(r) {
          //         case 0:
          //             element.css('background-color', '#77DD77');
          //             break;

          //         case 1:
          //             element.css('background-color', '#AEC6CF');
          //             break;

          //         case 2:
          //             element.css('background-color', '#AE662F');
          //             break;

          //         case 3:
          //             element.css('background-color', '#A3FF11');
          //             break;
          //     }
          // }
          });
             });
                  /*$(".events").click(function(){
                        $(this).remove();
                    });*/
        </script>