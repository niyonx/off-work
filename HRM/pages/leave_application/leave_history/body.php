<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                
<style type="text/css">
    
td {
    width: 30%
}

</style>
                    


                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Leave Application</a></li>
                        <li><a href="#">Team Leave Status</a></li>
                        <li class="active">Detailed Leave History</li>
                    </ol>
                </section>

                <?php if($_SESSION["is_admin"]){ ?>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> You will be notified about any change in your leave application by an email.
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Detailed Team Leave History

                                <?php if($_SESSION["is_admin"]){ ?>

                                

                                <?php } ?>

                                <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- Table row -->
                    <!-- <div class="row"> -->

                        <!-- <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Applied By</th>
                                        <th>Leave Type</th>
                                        <th>Reason</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Attachment</th>
                                        <th>Status</th>
                                        <th>Approved by</th>
                                        <th>Date Approved</th>
                                        <th>Created By</th>
                                        <th>Date Created</th>
                                        <th>Cancelled By</th>
                                        <th>Date Cancelled</th>
                                    </tr>                                    
                                </thead> -->
                        
                                    <?php  if($_SESSION["is_admin"]){ 
                                    // $_SESSION["emp_leave_application"] = get_emp_leave_application();
                                    

                                        if (isset($_POST[seemore]) && !empty($_POST[seemore])) {
                                            $_SESSION["emp_leave_application"] = get_emp_leave_application($_POST[seemore]);
                                        }else{
                                            $_SESSION["emp_leave_application"] = get_emp_leave_application(0);
                                        }

                                        foreach ($_SESSION["emp_leave_application"] as $key => $value) {

                                        if ($_SESSION["emp_leave_application"][$key][half_day]=='') {
                                            $half_day='';
                                        }else{
                                            $half_day=' ('.substr($_SESSION["emp_leave_application"][$key][half_day], 0, strlen($_SESSION["emp_leave_application"][$key][half_day])-1).')';
                                        }
                                        if ($_SESSION["emp_leave_application"][$key][attachment]=='') {
                                            $attachment='NA';
                                        }else{
                                            $attachment="<a href='".$_SESSION["emp_leave_application"][$key][attachment]."'>View</a>";
                                        }
                                            echo ("

         <div class='box box-info'>
        <div class='box-body'>
        <div class='box-header'>
            <h3 class='box-title'>".$_SESSION['emp_leave_application'][$key]['firstname']." ".$_SESSION['emp_leave_application'][$key]['surname']."- ".$_SESSION["emp_leave_application"][$key][name].$half_day." ".strtolower($_SESSION["emp_leave_application"][$key][status])." from ".date("jS M Y", strtotime($_SESSION["emp_leave_application"][$key][date_from]))." to ".date("jS M Y", strtotime($_SESSION["emp_leave_application"][$key][date_to]))."</h3>
        </div>
                            <div class='row'>
                         <div class='col-xs-12 table-responsive'>
                            <table class='table table-condensed'>
                               
                                 <tbody><tr>

                                                <th>Employee</th>
                                                <td>".$_SESSION["emp_leave_application"][$key][firstname]." ".$_SESSION["emp_leave_application"][$key][surname]."</td>

                                                <th>Applied By</th><td>".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->surname."</td></tr>

                                                <tr><th>Leave Type</th><td>".$_SESSION["emp_leave_application"][$key][name].$half_day."</td>

                                                <th>Reason</th>
                                                <td>".$_SESSION["emp_leave_application"][$key][reason]."</td></tr>

                                                <tr><th>Date From</th>
                                                <td>".date("d-m-Y", strtotime($_SESSION["emp_leave_application"][$key][date_from]))."</td>
                                                <th>Date From</th><td>".date("d-m-Y", strtotime($_SESSION["emp_leave_application"][$key][date_to]))."</td></tr>
                                                <tr><th>Attachment</th><td>".$attachment."</td>"

                                                ); 
                                            echo "<th>Status</th><td>";
                                            switch ($_SESSION["emp_leave_application"][$key][status]) {
                                                case "Approved":
                                                    echo "<span class='label label-success'>Approved</span>";
                                                    break;
                                                case "Pending":
                                                    echo "<span class='label label-warning'>Pending</span>";
                                                    break;
                                                case "Rejected":
                                                    echo "<span class='label label-danger'>Rejected</span>";
                                                    break;
                                                case "Cancelled":
                                                    echo "<span class='label label-info'>Cancelled</span>";
                                                    break;
                                            }

                                            echo ("</td></tr>");

                                             if (empty($_SESSION["emp_leave_application"][$key][approved_by])) {
                                                    echo "<tr><th>Approved By</th><td>NA</td>";
                                                }else{

                                                    echo "<tr><th>Approved By</th><td>".get_emp_name($_SESSION["emp_leave_application"][$key][approved_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][approved_by])->surname."</td>
                                                ";
                                                }
                                            

                                                if (empty($_SESSION["emp_leave_application"][$key][date_approved])) {
                                                    echo "<th>Date Approved</th><td>NA</td></tr>";
                                                }else{

                                                    echo "<th>Date Approved</th><td>".date("d-m-Y h:i:s A", strtotime($_SESSION["emp_leave_application"][$key][date_approved]))."</td></tr>
                                                ";
                                                }
                                            

                                            echo "<tr><th>Created By</th><td>".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->surname."</td>
                                                ";

                                            echo "<th>Date Created</th><td>".date("d-m-Y h:i:s A", strtotime($_SESSION["emp_leave_application"][$key][date_created]))."</td></tr>
                                                ";

                                            if (empty($_SESSION["emp_leave_application"][$key][cancelled_by])) {
                                                    echo "<tr><th>Cancelled By</th><td>NA</td>";
                                                }else{

                                                    echo "<tr><th>Cancelled By</th><td>".get_emp_name($_SESSION["emp_leave_application"][$key][cancelled_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][cancelled_by])->surname."</td>
                                            ";
                                                }

                                            

                                                 if (empty($_SESSION["emp_leave_application"][$key][date_cancelled])) {
                                                    echo "<th>Date Cancelled</th><td>NA</td>";
                                                }else{

                                                    echo "<th>Date Cancelled</th><td>".date("d-m-Y h:i:s A", strtotime($_SESSION["emp_leave_application"][$key][date_cancelled]))."</td>
                                                ";
                                                }

                                            echo "</tr>";
                                             echo ("</tbody> </table> </div> </div> </div> </div>");

                                             

                                        } }else{


                                            $_SESSION["uemp_leave_application"] = get_uemp_leave_application(date("Y-m-d", time()), $_SESSION[emp_id]);
                                    foreach ($_SESSION["uemp_leave_application"] as $key => $value) {
                                            echo ("<tr>
                                                <td>".$_SESSION["uemp_leave_application"][$key][firstname]." ".$_SESSION["uemp_leave_application"][$key][surname]."</td>
                                                <td>".get_emp_name($_SESSION["uemp_leave_application"][$key][created_by])->firstname." ".get_emp_name($_SESSION["uemp_leave_application"][$key][created_by])->surname."</td>
                                                <td>".$_SESSION["uemp_leave_application"][$key][name]."</td>
                                                 <td>".$_SESSION["uemp_leave_application"][$key][reason]."</td> 
                                                <td>".date("d-m-Y", strtotime($_SESSION["uemp_leave_application"][$key][date_from]))."</td>
                                                <td>".date("d-m-Y", strtotime($_SESSION["uemp_leave_application"][$key][date_to]))."</td>
                                                <td>".get_emp_name($_SESSION["uemp_leave_application"][$key][approved_by])->firstname." ".get_emp_name($_SESSION["uemp_leave_application"][$key][approved_by])->surname."</td>
                                                <td>"); 
                                            switch ($_SESSION["uemp_leave_application"][$key][status]) {
                                                case "Approved":
                                                    echo "<span class='label label-success'>Approved</span>";
                                                    break;
                                                case "Pending":
                                                    echo "<span class='label label-warning'>Pending</span>";
                                                    break;
                                                case "Rejected":
                                                    echo "<span class='label label-danger'>Rejected</span>";
                                                    break;
                                                case "Cancelled":
                                                    echo "<span class='label label-info'>Cancelled</span>";
                                                    break;
                                            }

                                            echo ("</td>
                                                </tr>");
                                        }


                                        }
                                    ?>
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
                <?php 
                }else{

            ?>
            <row>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> You are not allowed to access this webpage.                   
                    </div>

                   
                </div>
            </row>

            
            <?php

            } ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->