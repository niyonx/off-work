<?php

$isValid=0;
$errors = '';
 ?>
    <aside class="right-side">
        <section class="content-header">
            <h1>
                Leave Application
                <small>#<?php echo (get_no_la()->max)+1; ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Leave Application</a></li>
                <li class="active">Apply Leave</li>
            </ol>
        </section>

        <div class="pad margin no-print">
            <div class="alert alert-info" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                <b>Note:</b> You will be notified about changes in your leave application by an email.
            </div>
        </div>

        <?php 

        if(isset($_POST[calendar]) && !empty($_POST[calendar])){
            $ajax_date = (explode(" ", $_POST[calendar]));
        }

        if(isset($_POST) && !(empty($_POST)) ){
            $required_fields = array('employee_id'=> 'Employee Name'
                                    ,'calendar' => 'Date Range'
                                    ,'leave_type_id' => 'Leave Type'
                                    ,'reason' => 'Reason');
            $data = $_POST;
        
            foreach ($data as $key => $value) {
                if(in_array($key, array_keys($required_fields)) && (isnull($value)) ){
                    $isValid +=1;
                    $errors .= '<li>'.$required_fields[$key].' is required<br/></li>';
                }
            }
            $array_date = (explode(" ", $data['calendar']));
            $array_dur= (explode(" ", $data['dur']));

            if ($array_dur[0]>get_lt_left($data[employee_id],$data[leave_type_id])->days_left && $data[leave_type_id] !=2) {
                $isValid +=1;
                $errors .= '<li>You are taking more leaves than you have left.<br/></li>';
            }
            if ($array_dur[0]==0) {
                $isValid +=1;
                $errors .= '<li>Please select at least one day of leave.<br/></li>';
            }

            // pprint($_POST);
            // $array_date = (explode("/", $array_date[1]));
            // echos('dddddddddddddddd ')
            // pprint($array_date[0]);
            // pprint($array_date);
            // pprint ($array_date[0]);
            // pprint (date())
            // echo date("Y-m-d", strtotime($array_date[0]));
            // echos('vvvvvvvvvvvv '.$isValid);
            if($isValid !==0){ ?>
            <row>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> Please correct following errors in the form.
                        <?php echo("<ul>".$errors."</ul>"); ?>
                    </div>

                    <?php include('application_form.php'); ?>
                </div>
            </row>

            
            <?php 
            }else{        
                if(isset($_FILES) && !(empty($_FILES))){
                    $name = $_FILES['file']['name'];
                    $tmp_name = $_FILES['file']['tmp_name'];

                    if (isset($name) && !empty($name)) {
                        $location = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
                        $extension = strtolower(end(explode('.', $name)));
                        $type = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        $max_size = 1024*1024;

                        if ($size <= $max_size){
                            if(move_uploaded_file($tmp_name, $location.$name) && ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png')){
                            $array_date = (explode(" ", $data[calendar]));
                            $array_dur = (explode(" ", $data[dur]));
                                $location = $_SESSION[root_url].'uploads/';
                                $half_day='';
                                if ($_POST[optionsRadios]=="option1"){

                                    set_leave_application_with_file($data[employee_id], $data[leave_type_id], $data[reason],$location.$name,$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0],'morning half day ');
                                    $half_day='a morning half day ';

                                }else if($_POST[optionsRadios]=="option2"){

                                    set_leave_application_with_file($data[employee_id], $data[leave_type_id], $data[reason],$location.$name,$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0],'afternoon half day ');

                                    $half_day='an afternoon half day ';


                                }else{

                                    set_leave_application_with_file($data[employee_id], $data[leave_type_id], $data[reason],$location.$name,$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0],'');

                                }

                            
                            // assign_approver();


                            $mail->isHTML(true);  

                        if (get_cascade_approval_from_empid($data[employee_id])->cascade_approval==1){
                            $mail->addCC(get_emp_head_email(get_emp_head($data[employee_id])->head)->email,get_emp_name(get_emp_head(get_emp_head($data[employee_id])->head)->head)->firstname);
                            }

                            $mail->addAddress(get_emp_head_email($data[employee_id])->email, get_emp_name(get_emp_head($data[employee_id])->head)->firstname);
                        // pprint(get_emp_head_email($data[employee_id])[0][email]);
                            $mail->Subject="Employee leave application";
                            $head_name = get_emp_name(get_emp_head($data[employee_id])->head)->firstname;
                            $emp_name= get_emp_name($data[employee_id])->firstname." ".get_emp_name($data[employee_id])->surname;
                            $leave_type=strtolower(get_leave_type_name($data[leave_type_id])[0][name]);
                            $date_from=date('l jS M Y', strtotime($array_date[0]));
                            $date_to=date('l jS M Y', strtotime($array_date[2]));
                            $root_url=root_url();

                            if ($date_to==$date_from){

                                $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$emp_name.'</b> applied for '.$half_day.''.$leave_type.' for '.$date_from.'. <br><br>Click <a href="'.$root_url.'pages/login/" style="color:blue;">here</a> to review the application.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

                            }else{

                            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$emp_name.'</b> applied for '.$half_day.''.$leave_type.' from '.$date_from.' to '.$date_to.'. <br><br>Click <a href="'.$root_url.'pages/login/" style="color:blue;">here</a> to review the application.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';
                            }

               
                            try {
                                $mail->send();
                            } catch (Exception $e) {
                                echo($e);
                                                   }
echo "<meta http-equiv='refresh' content='5;'>";
                             ?>
                    <row>
                        <div class="col-md-2"></div>
                        <div class="alert alert-success col-md-8 text-center">
                          <h1><strong>Success!</strong> Leave application submitted with attachment.</h1>
                        </div>
                    </row>
                            <?php 
                            }else{

                            ?>
            <row>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> The attachment should be in jpg, jpeg or png format only.
                        <?php //echo("<ul>".$errors."</ul>"); ?>
                    </div>

                    <?php include('application_form.php'); ?>
                </div>
            </row>

            
            <?php


                            }
                        }else{

                            ?>
            <row>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> The attachment size should be less than 1 Mb.
                        <?php //echo("<ul>".$errors."</ul>"); ?>
                    </div>

                    <?php include('application_form.php'); ?>
                </div>
            </row>

            
            <?php

                        }
                    }else{
                        $half_day= '';
                        if ($_POST[optionsRadios]=="option1"){

                                    set_leave_application($data[employee_id], $data[leave_type_id], $data[reason],$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0],'morning half day ');
                                    $half_day='a morning half day ';

                                }else if($_POST[optionsRadios]=="option2"){

                                    set_leave_application($data[employee_id], $data[leave_type_id], $data[reason],$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0],'afternoon half day ');
                                    $half_day='an afternoon half day ';

                                }else{

                                    set_leave_application($data[employee_id], $data[leave_type_id], $data[reason],$array_date[0],$array_date[2],$_SESSION["emp_id"],$array_dur[0], '');

                                }
                        
                        // assign_approver();

                        // $mail->addAddress(get_emp_head_email($data[employee_id])[0][email]);
                        $mail->isHTML(true);     

                         if (get_cascade_approval_from_empid($data[employee_id])->cascade_approval==1 && get_emp_head_email(get_emp_head($data[employee_id])->head)->email != get_emp_head_email($data[employee_id])->email

                            ){
                            $mail->addCC(get_emp_head_email(get_emp_head($data[employee_id])->head)->email,get_emp_name(get_emp_head(get_emp_head($data[employee_id])->head)->head)->firstname);
                            }

                            $mail->addAddress(get_emp_head_email($data[employee_id])->email, get_emp_name(get_emp_head($data[employee_id])->head)->firstname);

                        
                        // pprint(get_emp_head_email($data[employee_id])[0][email]);
                            $mail->Subject="Employee leave application";
                            $head_name = get_emp_name(get_emp_head($data[employee_id])->head)->firstname;
                            $emp_name= get_emp_name($data[employee_id])->firstname." ".get_emp_name($data[employee_id])->surname;
                            $leave_type=strtolower(get_leave_type_name($data[leave_type_id])[0][name]);
                            $date_from=date('l jS M Y', strtotime($array_date[0]));
                            $date_to=date('l jS M Y', strtotime($array_date[2]));

                            if ($date_to==$date_from){

                                $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 40px; font-size: 18px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:13px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$emp_name.'</b> applied for '.$half_day.''.$leave_type.' for '.$date_from.'. <br><br>Click <a href="'.$_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to review the application.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:13px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

                            }else{

                            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 40px; font-size: 18px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:13px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$emp_name.'</b> applied for '.$half_day.''.$leave_type.' from '.$date_from.' to '.$date_to.'. <br><br>Click <a href="'.$_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to review the application.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:13px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

                            }

                           
                            try {
                                $mail->send();
                            } catch (Exception $e) {
                                echo($e);
                            }
echo "<meta http-equiv='refresh' content='5;'>";
                        ?>
                    <row>
                        <div class="col-md-2"></div>
                        <div class="alert alert-success col-md-8 text-center">
                          <h1><strong>Success!</strong> Leave application submitted.</h1>
                        </div>
                    </row>
                <?php }
                        // $name = $_FILES['file']['name'];
                        // echo ($location.$name);
                        // pprint($_FILES);
                }else{}
            }
        }
        else{ 
                include('application_form.php');
        } ?>



             

            <?php /* <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                               <div class="form-group">
                                    <label>Select Leave Type</label>
                                    <select class="form-control">
                                        <?php 
                                foreach ($_SESSION["all_leave_type_names"] as $key => $value) {
                                    echo ("<option>".$_SESSION["all_leave_type_names"][$key]['name']."</option>");
                                }

                             ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Attachment</label>
                                    <input type="file" id="exampleInputFile">
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <form>
                    <div class="box box-danger">
                        <div class="box-body">
                            <!-- Date range -->
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation"/>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->                                         <!-- textarea -->
                                <div class="form-group">
                                    <label>Purpose</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    </form>
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        
            
        </section><!-- /.content -->  */ ?>
        <!-- </section> -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->