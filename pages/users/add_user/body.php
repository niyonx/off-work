<?php 

    $x=0;
    $pass= random();
    $encpass = encrypt($pass);
    $isValid=0;
    $errors = '';

    // [fname] => 
    // [lname] => 
    // [email] => 
    // [phone] => 
    // [dob] => 
    // [address] => 
    // [nic] => 
    // [passport] => 
    // [fnkin] => 
    // [snkin] => 
    // [pnkin] => 
    // [dept_id] => 1
    // [job_name] => 
    // [doe] => 



        if(isset($_POST) && !(empty($_POST)) ){
            $required_fields = array('fname'=> 'First name'
                                    ,'lname'=> 'Last name'
                                    ,'email'=> 'Email address'
                                    ,'phone'=> 'Phone number'
                                    ,'dept_id'=> 'Department'
                                    // ,'dob'=> 'Date of birth'
                                    // ,'address'=> 'Address'
                                    // ,'nic'=> 'National Identity Card'
                                    // ,'passport'=> 'Passport'
                                    // ,'fnkin'=> 'First Name of Kin'
                                    // ,'snkin'=> 'Last Name of Kin'
                                    // ,'pnkin'=> 'Phone number of Kin'
                                    ,'job_name'=> 'Designation');
                                    // ,'doe'=> 'Date of entry');
            $data = $_POST;
        
            foreach ($data as $key => $value) {
                if(in_array($key, array_keys($required_fields)) && (isnull($value)) ){
                    $isValid +=1;
                    $errors .= '<li>'.$required_fields[$key].' is required<br/></li>';
                }
            }

            // if ($array_dur[0]>get_lt_left($data[employee_id],$data[leave_type_id])->days_left && $data[leave_type_id] !=2) {
            //     $isValid +=1;
            //     $errors .= '<li>You are taking more leaves than you have left.<br/></li>';
            // }
            // if ($array_dur[0]==0) {
            //     $isValid +=1;
            //     $errors .= '<li>Please select at least one day of leave.<br/></li>';
            // }

            // pprint($_POST);
            if($isValid !==0){ 

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
        } 
            }else{  }

    if(isset($_POST) && !(empty($_POST))){


        $data = $_POST;

        if (isset($_POST[dob]) && !empty($_POST[dob])){
            
            $data[dob] = "'".date("Y-m-d",strtotime($data[dob]))."'";
        }else{
            $data[dob] = 'null';
        }

        if (isset($_POST[nic]) && !empty($_POST[nic])){
            $data[nic] = "'".$data[nic]."'";
        }else{
            
            $data[nic] = 'null';
        }

        if (isset($_POST[address]) && !empty($_POST[address])){
            $data[address] = "'".$data[address]."'";
        }else{
            
            $data[address] = 'null';
        }

        if (isset($_POST[passport]) && !empty($_POST[passport])){
            $data[passport] = "'".$data[passport]."'";
        }else{
            
            $data[passport] = 'null';
        }

        if (isset($_POST[pnkin]) && !empty($_POST[pnkin])){
            $data[pnkin] = "'".$data[pnkin]."'";
        }else{
            $data[pnkin] = 'null';
        }

        if (isset($_POST[doe]) && !empty($_POST[doe])){
            $data[doe] = "'".date("Y-m-d",strtotime($data[doe]))."'";
            // pprint($data);
        }else{
            $data[doe] = 'null';
        }


        if(isset($_POST[fnkin]) && !empty($_POST[fnkin] && isset($_POST[snkin]) && !empty($_POST[snkin]))){
            $nkin = "'".$_POST[snkin]." ".$_POST[snkin]."'";

        }else if(isset($_POST[snkin]) && !empty($_POST[snkin])){
            // $_POST[fnkin] = "'".$_POST[fnkin]."'";
            $nkin = "'".$_POST[snkin]."'";

        }else if(isset($_POST[fnkin]) && !empty($_POST[fnkin])){
            $nkin = "'".$_POST[fnkin]."'";
        }else{
            $nkin = 'null';
        }
        // // if (!isset($_POST[dob]) && empty($_POST[dob])){

        // // }

        

        // if (isset($_POST[admin]) && !empty($_POST[admin])){
        // set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 1,$encpass,date("Y-m-d",strtotime($data[dob])),date("Y-m-d",strtotime($data[doe])),$data[nic],$data[passport],$nkin,$data[pnkin],$data[address]); 
        // }else{
        //    set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 0,$encpass,date("Y-m-d",strtotime($data[dob])),date("Y-m-d",strtotime($data[doe])),$data[nic],$data[passport],$nkin,$data[pnkin],$data[address]); 
        // }

        if (isset($_POST[admin]) && !empty($_POST[admin])){
        set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 1,$encpass,$data[dob],$data[doe],$data[nic],$data[passport],$nkin,$data[pnkin],$data[address]); 
        }else{
        set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 0,$encpass,$data[dob],$data[doe],$data[nic],$data[passport],$nkin,$data[pnkin],$data[address]); 
        }


        if(isset($_FILES) && !(empty($_FILES))){
            foreach ($_FILES['file']['name'] as $key => $value) {
                
                $name = $_FILES['file']['name'][$key];
                $tmp_name = $_FILES['file']['tmp_name'][$key];

            if (isset($name) && !empty($name)) {
                $location = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
                $extension = strtolower(end(explode('.', $name)));
                $type = $_FILES['file']['type'][$key];
                $size = $_FILES['file']['size'][$key];
                $max_size = 1024*1024;

                if ($size <= $max_size){
                    if(move_uploaded_file ($tmp_name, $location.$name)){

                        $location = ''.$_SESSION['root_url'].'uploads/'.$name;
                        set_attachment($location,(get_no_users()->x),$_SESSION[emp_id]);
                       
                    
                    }
                }
            }
            }
        }


        $x=1;

        // pprint($_POST);
        // pprint($_FILES);

        $mail->isHTML(true);     
        $mail->ClearCCs();
        $mail->addAddress($_POST[email]);
    // pprint(get_emp_head_email($data[employee_id])[0][email]);
        $mail->Subject="Leave Management System account created";
        $emp_name= $_POST[fname];
        
        $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is to inform you that your account is now created! Click <a href="http://'.$_SESSION['root_url'].'pages/change_pass/" style="color:blue;">here</a> to enter the system and change your password.<br><br>Password: '.$pass.'.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

        try {
            $mail->send();
        } catch (Exception $e) {
            echo($e);
        }

    }
 ?>

  
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        New User
                        <small>#<?php echo get_no_users()->x+1 ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Users</a></li>
                        <li class="active">Add User</li>
                    </ol>
                </section>

                <?php if($_SESSION["is_admin"]){ ?>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> You will be notified about any change in your leave application by an email.
                    </div>
                </div>
                
                    <?php 
                    if ($x==0){
                        include('application_form.php');
                    }
                    else{

                            echo "<meta http-equiv='refresh' content='5;'>";
                     ?>

                        <row>
                            <div class="col-md-2"></div>
                            <div class="alert alert-success col-md-8 text-center">
                                <h1><strong>Success!</strong> New user created. </br>
                                Email sent at <?php echo $_POST[email]; ?> for login credidentials.</br></h1>
                            </div>
                        </row> <?php
                    }
                     ?>
                     <?php }else{

            ?>
           
            <div class="pad margin no-print">
                    <div class="alert alert-danger" style="margin-bottom: 0!important;">
                        <i class="fa fa-exclamation"></i>
                        <b>Note:</b> You are not allowed to access this webpage.                   
                    </div>
            </div>
            
            <?php

            } ?>
            </aside><!-- /.right-side -->
            
        </div><!-- ./wrapper -->