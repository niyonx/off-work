<?php 

    $x=0;
    $pass= random();
    $encpass = encrypt($pass);

    if(isset($_POST) && !(empty($_POST))){
        if (isset($_POST[admin]) && !empty($_POST[admin]))
        set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 1,$encpass);
        else{
           set_new_employee($_POST[fname], $_POST[lname], $_POST[dept_id] , $_POST[job_name] ,$_POST[email] ,$_POST[phone], 0,$encpass); 
        }
        $x=1;

        $mail->isHTML(true);     
        $mail->addAddress($_POST[email]);
    // pprint(get_emp_head_email($data[employee_id])[0][email]);
        $mail->Subject="Leave Management System account created";
        $emp_name= $_POST[fname];
        
        $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is to inform you that your account is now created! Click <a href="http://'.$_SESSION[root_url] .'pages/change_pass/" style="color:blue;">here</a> to enter the system and change your password.<br><br>Password: '.$pass.'.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 13px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

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
                        Leave Application
                        <small>#007612</small>
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
                    else{ ?>
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