    <aside class="right-side">                
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-bottom: 30px;">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Leave Application</a></li>
                <li class="active">Leave Types</li>
            </ol>
        </section>

        <div class="pad margin no-print">
            <div class="alert alert-warning" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                <b>Note:</b> Deleting a leave type will cancel all ongoing pending leave applications with it.
            </div>
        </div>

        <!-- Main content -->
        <section class="content invoice">                    
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Leave Types
                        <small class="pull-right">Date: <?php 
                        echo date("d/m/Y", time());
                        ?></small>
                    </h2>                            
                </div><!-- /.col -->
            </div>
                                
                <!-- title row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <!-- <div class="box-header">
                            <h3 class="box-title">Leave types table</h3>
                            <div class="box-tools">
                                
                                <div class="input-group"> -->

                                    <!-- <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/> -->
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div> -->
                              <!--   </div>
                            </div>
                        </div> -->
                        <div class="box-body table-responsive no-padding" style="overflow-y: hidden !important; overflow-x: auto !important; ">
                            <table class="table table-hover" data-toggle="table" data-pagination="true" data-show-export="true">
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Leave Type</th>
                                    <th>Default Number of days entilted</th>
                                    <th>Maximum number of days carry forward</th>
                                </tr>
                                <?php
                                if($_SESSION["is_admin"]){ 
                                    $leave_types = get_leave_types();
                                    foreach ($leave_types as $value) {
                                        echo ("<tr>
                                        "/* <td>".$value["id"]."</td> */."
                                        <td><a id='ltname' data-name='name' data-url='update.php' data-pk='".get_ltid_from_name($value["name"])->id."' data-type='text'>".$value["name"]."</a></td>

                                        <td><a id='ltdef' data-name='default_days' data-url='update.php' data-pk='".get_ltid_from_name($value["name"])->id."' data-type='text'>".$value["default_days"]."</a></td>
                                        
                                        <td><a id='ltacf' data-name='allowed_carryfwd_days' data-url='update.php' data-pk='".get_ltid_from_name($value["name"])->id."' data-type='text'>".$value["allowed_carryfwd_days"]."</a></td>
                                        </tr>");
                                    }

                                }else{

                                     $leave_types = get_leave_types();
                                    foreach ($leave_types as $value) {
                                        echo ("<tr>
            "/* <td>".$value["id"]."</td> */."
            <td>".$value["name"]."</td>

            <td>".$value["default_days"]."</td>
            
            <td>".$value["allowed_carryfwd_days"]."</td>
            </tr>");
                                    }


                                }
                                ?>
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
<?php if($_SESSION["is_admin"]){ ?>
                    <div class="container">
                      <!-- Trigger the modal with a button -->
                        <button class="btn btn-flat btn-success" id="myBtn">Add leave type</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter new leave type" name="new_leave_type" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter default number of days for new leave type" name="new_default_day">
                                            </div>
                                             <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter maximum number of days allowed to carry forward" name="carry_fwd">
                                            </div>
                                                <button type="Submit" class="btn btn-success btn-block ">Submit</button>
                                              <?php
                                                if (isset($_POST[new_leave_type]) && isset($_POST[new_default_day])){
                                                    set_leave_types($_POST[new_leave_type],$_POST[new_default_day],$_POST[carry_fwd]);
                                                    // header("Refresh:3");
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                            }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <button class="btn btn-flat btn-danger" id="myBtn2">Delete leave type</button>

                      <!-- Modal -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top:14%;">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body" style="padding:40px 50px;">
                                        <form method="post" role="form">
                                        <div class="form-group">
                                          <!-- <input type="text" class="form-control" placeholder="Enter leave type name to be deleted" name="delete_name" autofocus /> -->
                                          <select class="form-control" name="delete_name" >
                                    <?php 

                                        $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);
                                    $_SESSION["all_leave_type_names"] = get_all_leave_type_names();

                            foreach ($_SESSION["all_leave_type_names"] as $key => $value) {

                                echo ("<option value='".$_SESSION["all_leave_type_names"][$key]['name']."'>".$_SESSION["all_leave_type_names"][$key]['name']."</option>");}

                                    
                                ?>
                                </select>
                                        </div>
                                          <button type="Submit" class="btn btn-success btn-block ">Delete</button>
                                          <?php
                                            if (isset($_POST['delete_name'])){
                                                $mail_to = get_deleted_lt_cancel_empid($_POST['delete_name']);

                    foreach ($mail_to as $key => $value) {            
                            $mail->isHTML(true);     
                            $mail->addAddress(get_emp_email($mail_to[$key][emp_id])->email);
                        // pprint(get_emp_head_email($data[employee_id])[0][email]);
                            $mail->Subject="Leave application cancelled";
                            $emp_name= get_emp_name($mail_to[$key][emp_id])->firstname;
                            $leave_type=strtolower($_POST['delete_name']);
                            $root_url= root_url();
                            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform your pending'.$leave_type.' application(s) has been <span style="color:orange;">cancelled</span> since this type of leave is no longer usable. Click <a href="http://'.$root_url.'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';
                            try {
                                $mail->send();
                            } catch (Exception $e) {
                                echo($e);
                            }   
                        }
                                                // pprint($mail_to);
                                                delete_leave_type($_POST['delete_name']);
                                                echo "<meta http-equiv='refresh' content='0'>";
                                        }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>

                    <?php }

            ?>
                </div>
            </div><!-- /.row -->
        </section>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->





