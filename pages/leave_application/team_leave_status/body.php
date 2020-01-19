<aside class="right-side">                
            <!-- Content Header (Page header) -->
            <section class="content-header">
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Leave Application</a></li>
                    <li class="active">Team Leave Status</li>
                </ol>
            </section>

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
                <i class="fa fa-globe"></i> Team Leave Status

                <?php if($_SESSION["is_admin"]){ ?>

                (<button onclick="location.href='../leave_history/index.php'" class="btn btn-default btn-xs">View Detailed History</button>)

                <?php } ?>

                <small class="pull-right">Date: <?php 
        echo date("d/m/Y", time());
        ?></small>
            </h2>                            
        </div><!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Applied By</th>
                        <th>Leave Type</th>
                        <!-- <th>Reason</th> -->
                        <th>From</th>
                        <th>To</th>
                        <th>Approver</th>
                        <th>Status</th>
                        <?php  if($_SESSION["is_admin"]){ ?>
                        <th>Actions</th> <?php 
                        } ?>
                    </tr>                                    
                </thead>
                <tbody>
                    <?php  if($_SESSION["is_admin"]){ 
                    $_SESSION["emp_leave_application"] = get_emp_leave_application(0);
                    foreach ($_SESSION["emp_leave_application"] as $key => $value) {

                        if ($_SESSION["emp_leave_application"][$key][half_day]=='') {
                            $half_day='';
                        }else{
                            $half_day=' ('.substr($_SESSION["emp_leave_application"][$key][half_day], 0, strlen($_SESSION["emp_leave_application"][$key][half_day])-1).')';
                        }
                            echo ("<tr>
                                <td>".$_SESSION["emp_leave_application"][$key][firstname]." ".$_SESSION["emp_leave_application"][$key][surname]."</td>
                                <td>".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][created_by])->surname."</td>
                                <td>".$_SESSION["emp_leave_application"][$key][name].$half_day."</td>
                                <!-- <td>".$_SESSION["emp_leave_application"][$key][reason]."</td> -->
                                <td>".date("d-m-Y", strtotime($_SESSION["emp_leave_application"][$key][date_from]))."</td>
                                <td>".date("d-m-Y", strtotime($_SESSION["emp_leave_application"][$key][date_to]))."</td>");

                            if (empty($_SESSION["emp_leave_application"][$key][approved_by])) {
                                    echo "<td>NA</td>";
                                }else{

                                    echo "<td>".get_emp_name($_SESSION["emp_leave_application"][$key][approved_by])->firstname." ".get_emp_name($_SESSION["emp_leave_application"][$key][approved_by])->surname."</td>
                                ";
                                }
                                echo "<td>";
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

                            echo ("</td>");
                            ?> 

                             <form method="post" action="../leave_history/index.php">
                                            
                              <td><button name="seemore" value="<?php echo $_SESSION["emp_leave_application"][$key][id]; ?>" class="btn btn-dark btn-xs">See User History</button></td></tr>    
                             </form>

                            <?php
                        } }else{


                            $_SESSION["uemp_leave_application"] = get_uemp_leave_application(date("Y-m-d", time()), $_SESSION[emp_id]);
                    foreach ($_SESSION["uemp_leave_application"] as $key => $value) {
                            echo ("<tr>
                                <td>".$_SESSION["uemp_leave_application"][$key][firstname]." ".$_SESSION["uemp_leave_application"][$key][surname]."</td>
                                <td>".get_emp_name($_SESSION["uemp_leave_application"][$key][created_by])->firstname." ".get_emp_name($_SESSION["uemp_leave_application"][$key][created_by])->surname."</td>
                                <td>".$_SESSION["uemp_leave_application"][$key][name]."</td>
                                <!-- <td>".$_SESSION["uemp_leave_application"][$key][reason]."</td> -->
                                <td>".date("d-m-Y", strtotime($_SESSION["uemp_leave_application"][$key][date_from]))."</td>
                                <td>".date("d-m-Y", strtotime($_SESSION["uemp_leave_application"][$key][date_to]))."</td>
                                "); 
                            if (empty($_SESSION["emp_leave_application"][$key][approved_by])) {
                                    echo "<td>NA</td>";
                                }else{

                                    echo "<td>".get_emp_name($_SESSION["uemp_leave_application"][$key][approved_by])->firstname." ".get_emp_name($_SESSION["uemp_leave_application"][$key][approved_by])->surname."</td>
                                ";
                                }
                                echo "<td>";
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
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->