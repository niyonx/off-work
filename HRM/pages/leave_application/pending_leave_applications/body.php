    <?php 
        
       if (isset($_POST[approve]) && !empty($_POST[approve])){
            $_POOST=(explode(" ", $_POST[approve]));

            if (get_half_day($_POOST[0])->half_day!='') {
                $half_day = get_half_day($_POOST[0])->half_day;
            }else{
                $half_day = '';
            }


            // pprint($_POOST);
            change_status($_POOST[0], 'Approved',$_SESSION["emp_id"],date("Y/m/d H:i:s", time()));
            if (isset($_POST[msg]) && !empty($_POST[msg])){
                $head_msg = $_POST[msg];
            }
            
            $mail->isHTML(true);     
            $mail->addAddress(get_emp_email($_POOST[1])->email,get_emp_name($_POOST[1])->firstname);
            $mail->addCC(get_emp_head_email($_POOST[1])->email,get_emp_name(get_emp_head($_POOST[1])->head)->firstname);
            if (get_cascade_approval_from_empid($_POOST[1])->cascade_approval==1){
                $mail->addCC(get_emp_head_email(get_emp_head($_POOST[1])->head)->email,get_emp_name(get_emp_head(get_emp_head($_POOST[1])->head)->head)->firstname);
            }
            // pprint(get_emp_head_email($data[employee_id])[0][email]);
            $mail->Subject="Leave application update";
            $head_name = get_emp_name($_SESSION["emp_id"])->firstname." ".get_emp_name($_SESSION["emp_id"])->surname;
            // $head_name = "Ninja";
            $emp_name= get_emp_name($_POOST[1])->firstname;
            $leave_type=strtolower(get_leave_type_name($_SESSION['all_pending'][$_POOST[2]][lt_id])[0][name]);
            $date_from=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_from]));
            $date_to=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_to]));
            if (isset($_POST[msg]) && !empty($_POST[msg])){
                $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$head_name.' </b><span style="color:green;">approved</span> your '.$half_day.$leave_type.' request from '.$date_from.' to '.$date_to.'.<br><br> Message from '.$head_name.' :
                '.$head_msg.'<br><br> Click <a href="'.$_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';
            }else{
            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'
            .$head_name.' </b><span style="color:green;">approved</span> your '.$half_day.$leave_type.' request from '.$date_from.' to '.$date_to.'. <br><br>Click <a href="'. $_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';}

          
          
            echo "<meta http-equiv='refresh' content='0;'>";
            try {
                $mail->send();
            } catch (Exception $e) {
                echo($e);
            }

        }

        if (isset($_POST[reject]) && !empty($_POST[reject])){
            $_POOST=(explode(" ", $_POST[reject]));

            if (get_half_day($_POOST[0])->half_day!='') {
                $half_day = get_half_day($_POOST[0])->half_day;
            }else{
                $half_day = '';
            }

            // pprint($_POOST);
            change_status($_POOST[0], 'Rejected',$_SESSION["emp_id"], date("Y/m/d H:i:s", time()));
            if (isset($_POST[msg]) && !empty($_POST[msg])){
                $head_msg = $_POST[msg];
            }

            $mail->isHTML(true);     
            $mail->addAddress(get_emp_email($_POOST[1])->email,get_emp_name($_POOST[1])->firstname);
            $mail->addCC(get_emp_head_email($_POOST[1])->email,get_emp_name(get_emp_head($_POOST[1])->head)->firstname);
            if (get_cascade_approval_from_empid($_POOST[1])->cascade_approval==1){
                $mail->addCC(get_emp_head_email(get_emp_head($_POOST[1])->head)->email,get_emp_name(get_emp_head(get_emp_head($_POOST[1])->head)->head)->firstname);
            }
            // pprint(get_emp_head_email($data[employee_id])[0][email]);
            $mail->Subject="Leave application update";
            $head_name = get_emp_name($_SESSION["emp_id"])->firstname." ".get_emp_name($_SESSION["emp_id"])->surname;
            $emp_name= get_emp_name($_POOST[1])->firstname;
            $leave_type=strtolower(get_leave_type_name($_SESSION['all_pending'][$_POOST[2]][lt_id])[0][name]);
            $date_from=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_from]));
            $date_to=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_to]));
            if (isset($_POST[msg]) && !empty($_POST[msg])){
                $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$head_name.' </b><span style="color:red;">rejected</span> your '.$half_day.$leave_type.' request from '.$date_from.' to '.$date_to.'.<br><br> Message from '.$head_name.' :
                '.$head_msg.'<br><br> Click <a href="'. $_SESSION['root_url'] .'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';
            }else{
            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that <b>'.$head_name.' </b><span style="color:red;">rejected</span> your '.$half_day.$leave_type.' request from '.$date_from.' to '.$date_to.'.<br><br>Click <a href="'.$_SESSION['root_url'] .'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';}

           
            echo "<meta http-equiv='refresh' content='0;'>";
            try {
                $mail->send();
            } catch (Exception $e) {
                echo($e);
            }
        }

        if (isset($_POST[cancel]) && !empty($_POST[cancel])){
            $_POOST=(explode(" ", $_POST[cancel]));

            if (get_half_day($_POOST[0])->half_day!='') {
                $half_day = get_half_day($_POOST[0])->half_day;
            }else{
                $half_day = '';
            }
            
            // pprint($_POOST);
            cancel_app($_SESSION["emp_id"],$_POOST[0],date("Y/m/d H:i:s", time()));
            // change_status($_POOST[0], 'Rejected',$_SESSION["emp_id"], date("Y/m/d H:i:s", time()));
            //id empid key
             if (isset($_POST[msg]) && !empty($_POST[msg])){
                $head_msg = $_POST[msg];
            }

            $mail->isHTML(true);     
            $mail->addAddress(get_emp_email($_POOST[1])->email,get_emp_name($_POOST[1])->firstname);
            $mail->addCC(get_emp_head_email($_POOST[1])->email,get_emp_name(get_emp_head($_POOST[1])->head)->firstname);
            if (get_cascade_approval_from_empid($_POOST[1])->cascade_approval==1){
                $mail->addCC(get_emp_head_email(get_emp_head($_POOST[1])->head)->email,get_emp_name(get_emp_head(get_emp_head($_POOST[1])->head)->head)->firstname);
            }
            // pprint(get_emp_head_email($data[employee_id])[0][email]);
            $mail->Subject="Leave application cancelled";
            $head_name = get_emp_name(get_emp_head($_POOST[1])->head)->firstname;
            $emp_name= get_emp_name($_POOST[1])->firstname." ".get_emp_name($_POOST[1])->surname;
            $leave_type=strtolower(get_leave_type_name($_SESSION['all_pending'][$_POOST[2]][lt_id])[0][name]);
            $date_from=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_from]));
            $date_to=date("d-m-Y", strtotime($_SESSION['all_pending'][$_POOST[2]][date_to]));
            if (isset($_POST[msg]) && !empty($_POST[msg])){
            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that  the '.$half_day.$leave_type.' request of <b>'.$emp_name.' </b> from '.$date_from.' to '.$date_to.' has been <span style="color:orange;">cancelled</span>.<br><br>Message from '.$head_name.':
                '.$head_msg.'<br><br> Click <a href="'. $_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';
            }else{
            $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$head_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 18px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that  the '.$half_day.$leave_type.' request of <b>'.$emp_name.' </b> from '.$date_from.' to '.$date_to.' has been <span style="color:orange;">cancelled</span>. <br><br>Click <a href="'. $_SESSION['root_url'].'pages/login/" style="color:blue;">here</a> to view.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';}

            echo "<meta http-equiv='refresh' content='0;'>";
            try {
                $mail->send();
            } catch (Exception $e) {
                echo($e);
            }
        }

     ?>


<link href="<?php echo root_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="ion ion-load-a"></i> Pending leave applications
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Leave Application</a></li>
                <li class="active">Pending leaves</li>
            </ol>
        </section>

        <div class="pad margin no-print">
            <div class="alert alert-success" style="margin-bottom: 0!important;">
                <i class="fa fa-info"></i>
                <b>Note:</b> The employee will be notified about any changes in his leave application status by email.
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">                        
                <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">
                        <!-- timeline time label -->
                        <?php 

                        $_SESSION['all_pending']= get_all_pending();
                        foreach ($_SESSION['all_pending'] as $key => $value) {
                         
                            if (get_cascade_approval_from_empid($_SESSION['all_pending'][$key][emp_id])->cascade_approval==1){
                                $alt_head=true;
                            }else{
                                $alt_head=false;
                            }

                          if ($_SESSION['all_pending'][$key][emp_id]==$_SESSION[emp_id] || $_SESSION["is_admin"] || get_emp_head($_SESSION['all_pending'][$key][emp_id])->head==$_SESSION[emp_id] || get_emp_head(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->head == $_SESSION[emp_id] && $alt_head){ ?>
                        <li class="time-label">
                            <span class='<?php 
                            
                            $number = $number +1;
                            switch($number):
                               case $number==1: echo "bg-green";
                               break;
                               case $number==2: echo "bg-orange";
                               break;
                               case $number==3: echo "bg-red";
                               break;
                               case $number==4: echo "bg-blue";
                               break;
                               case $number==5: echo "bg-purple";
                               break;
                               case $number==6: echo "bg-yellow";
                               break;
                               case $number==7: echo "bg-green";
                               break;
                               case $number==8: echo "bg-orange";
                               break;
                               case $number==9: echo "bg-red";
                               break;
                               case $number==10: echo "bg-blue";
                               break;
                               case $number==11: echo "bg-purple";
                               break;
                               case $number==12: echo "bg-yellow";
                               break;
                               case $number==13: echo "bg-green";
                               break;
                               case $number==14: echo "bg-orange";
                               break;
                               case $number==15: echo "bg-red";
                               break;
                               case $number==16: echo "bg-blue";
                               break;
                               case $number==17: echo "bg-purple";
                               break;
                               case $number==18: echo "bg-yellow";
                               break;
                            endswitch;

                             ?>'>
                                <?php echo date('jS M Y', strtotime($_SESSION['all_pending'][$key][date_created])); ?>
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <div class="fa fa-envelope bg-blue"></div>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php 

                                echo date('H:i', strtotime($_SESSION['all_pending'][$key][date_created]));

                                 ?></span>
                                <h3 class="timeline-header"><a><?php 
                                echo (get_emp_name($_SESSION['all_pending'][$key][emp_id])->firstname." ". get_emp_name($_SESSION['all_pending'][$key][emp_id])->surname);
                                 

                                if (substr($_SESSION['all_pending'][$key][half_day], 0,1)=='a'){

                                     ?>

                                 </a> applied for an <?php 

                                 echo $_SESSION['all_pending'][$key][half_day]."";

                                }else{

                                    ?>

                                 </a> applied for a <?php 

                                 echo $_SESSION['all_pending'][$key][half_day]."";

                                }

                                 

                                 echo strtolower(get_leave_type_name($_SESSION['all_pending'][$key][lt_id])[0][name]);

                                 if ($_SESSION['all_pending'][$key][date_to]==$_SESSION['all_pending'][$key][date_from]){

                                    ?> for <?php 

                                    echo date("l jS M Y", strtotime($_SESSION['all_pending'][$key][date_from]));

                                     echo ".";

                                   echo " (Immediate approver: <b>".get_emp_name(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->firstname." ".get_emp_name(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->surname."</b>)";

                                 }else{

                                  ?> from <?php 

                                  echo date("l jS M Y", strtotime($_SESSION['all_pending'][$key][date_from]));
                                  // echo $_SESSION['all_pending'][$key][date_from];

                                   ?> to <?php 

                                   echo date("l jS M Y", strtotime($_SESSION['all_pending'][$key][date_to]));

                                   echo ".";

                                   echo " (Immediate approver: <b>".get_emp_name(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->firstname." ".get_emp_name(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->surname."</b>)";

                               }

                               

                                    ?></h3>
                                <div class="timeline-body">Comments: <?php 

                                    echo $_SESSION['all_pending'][$key][reason];

                                     ?>
                                </div>
                                <?php 

                                    if (!empty($_SESSION['all_pending'][$key][attachment])) {
                                       echo ('<div class="timeline-body">
                                    <img src="'.$_SESSION['all_pending'][$key][attachment].'" height="234px" >
                                </div>');}
                                     ?>
                                     <form method="post" role="form" id="frm" action="index.php">

                                <div class='timeline-footer'>
                                
                                    <?php if (get_emp_head($_SESSION['all_pending'][$key][emp_id])->head==$_SESSION[emp_id] || $_SESSION["is_admin"] || $_SESSION['all_pending'][$key][emp_id]==$_SESSION[emp_id] || get_emp_head(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->head == $_SESSION[emp_id] && $alt_head){ ?>
                                    <div class="form-group">
                                            <label>Include a message to employee (optional)</label>
                                            <textarea class="form-control" rows="2" name='msg' placeholder="Enter ..." maxlength="150"></textarea>
                                        </div>
                                        <?php } ?>
                                        <?php if (get_emp_head($_SESSION['all_pending'][$key][emp_id])->head==$_SESSION[emp_id] || $_SESSION["is_admin"] || get_emp_head(get_emp_head($_SESSION['all_pending'][$key][emp_id])->head)->head == $_SESSION[emp_id] && $alt_head){ ?>
                                    <button class="btn btn-success" value="<?php echo ($_SESSION['all_pending'][$key][id]." ".$_SESSION['all_pending'][$key][emp_id]." ".$key); ?>" style="width:49.5%" name="approve">Approve</button>
 
                                    <button class="btn btn-danger" value="<?php echo ($_SESSION['all_pending'][$key][id]." ".$_SESSION['all_pending'][$key][emp_id]." ".$key); ?>"  name="reject" style="width:49.5%">Reject</button>
                                    <?php } ?>

                                    <?php if ($_SESSION['all_pending'][$key][emp_id]==$_SESSION[emp_id] || $_SESSION["is_admin"] ){ ?>
                                    <button class="btn btn-warning" value="<?php echo ($_SESSION['all_pending'][$key][id]." ".$_SESSION['all_pending'][$key][emp_id]." ".$key); ?>" style="width:99.3%; margin-top:3px;" name="cancel">Cancel</button>
                                <?php } ?>
                                
                                </div>
                                    </form>
                            </div>
                        </li> <?php } }?>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li>
                            <i class="fa fa-clock-o"></i>
                        </li>
                    </ul>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->