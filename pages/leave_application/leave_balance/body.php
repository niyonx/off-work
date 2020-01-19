<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Leave Application
                        <small>#<?php echo (get_no_la()->max)+1; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Leave Application</a></li>
                        <li class="active">Leave Balance</li>
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
                                <i class="fa fa-globe"></i> My Leave Balance
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
                                        <th> </th>
                                        <th style='text-align:center'>Days Entitled</th>
                                        <th style='text-align:center'>Days Taken</th>
                                        <th style='text-align:center'>Days Left</th>
                                        <th style='text-align:center'>Max Days Carry Forward</th> 
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php 
                                        $_SESSION["user_leave_types"] = get_user_leave_types($_SESSION["emp_id"]);
                                        $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);
                                        foreach ($_SESSION["user_leave_types"] as $key => $value) {
                                            echo ("<tr>
                                                <td><b>".get_leave_type_name($_SESSION[user_leave_types][$key]['lt_id'])[0]['name']." (Default ".$_SESSION["employee_leave_balance"][$key][prev_carry_fwd].")"."</b></td>
                                                <td style='text-align:center'>".$_SESSION["employee_leave_balance"][$key][days_entitled]."</td>
                                                <td style='text-align:center'>".$_SESSION["employee_leave_balance"][$key][days_taken]."</td>
                                                <td style='text-align:center'>".$_SESSION["employee_leave_balance"][$key][days_left]."</td>
                                                <td style='text-align:center'>".$_SESSION["employee_leave_balance"][$key][carry_fwd]."</td>
                                                </tr>");
                                        }
                                     ?>
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->