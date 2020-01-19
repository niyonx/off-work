<?php


        if (isset($_POST[email])){
            $login_details = verify_email($_POST[email]);
            $result = $login_details;
            if ($login_details == null)
            {
                ?>

            <row>
                <div class="col-md-12">
                <br>
                
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> Email address does not correspond to any user email.
                    </div>
                </div>
            </row>

            
            <?php 
            } 
            else{
               $mail->isHTML(true);     
               $mail->ClearCCs();
                $mail->addAddress($_POST[email]);
                        // pprint(get_emp_head_email($data[employee_id])[0][email]);
                $mail->Subject="Account Recovery - Change of password";
                $emp_name = get_name_from_email($_POST[email])->name;
                $plain_pass = random();
                $mail->Body='<table style="background: rgb(239, 239, 239);" align="center" border="0" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><table class="content" style="background: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221);" align="center" border="0" width="700" cellpadding="0" cellspacing="0"><tbody><tr><td height="20" style="display: block;margin-left: 135px;margin-right: auto; width: 50%;margin-top:20px;"><img src="http://www.cybernaptics.mu/wp-content/uploads/2016/03/cybernaptics_logo.png" /></td></tr><tr><td><table align="center" border="0" width="96%" cellpadding="0" cellspacing="0"><tbody><tr><td style="color: rgb(102, 102, 102); line-height: 16px; font-size: 17px;" valign="top"><span style="font-family:Arial;">Dear '.$emp_name.',</span></td></tr><tr><td style="line-height: 18px;"><p><br> <span style="font-family:Arial;font-size:14px;"><span style="line-height: 20px;"><span style="color:#666666;"> <span style="line-height: 16.799999237060547px;">This is an e-mail notification to inform you that your password has been changed to '.$plain_pass.'. Click <a href="'.$_SESSION[root_url].'pages/change_pass/" style="color:blue;">here</a> to change your password.
                This is an automatic email. Please do not respond.</span></span></span><p><span style="line-height: 20px;"><span style="font-family:Arial;font-size:14px;color:#666666;"></span></span><span style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px">Sincerely,<br> Cybernaptics Mailer <br> '.date("d/m/Y H:i:s").'</span><tr><td style="LINE-HEIGHT: 18px; FONT-FAMILY: arial; COLOR: #666; FONT-SIZE: 14px"><table width="660" border="0" cellspacing="0"><tr><td>&nbsp;</td></tr>';

                            
                            try {
                                $mail->send();
                                change_pass($_POST[email], encrypt($plain_pass),
                                 get_name_from_email($_POST[email])->id);
                            } catch (Exception $e) {
                                echo($e);
                                                   }
                $_SESSION[PR]=1;
                echo "<meta http-equiv='refresh' content='0; url=../logout/index.php'";
            }
    }?>
<div class="form-box" id="login-box" >
    <div class="header bg-orange">Account Recovery</div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" autofocus/>
            </div>
            <!-- <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>      -->     
<!--             <div class="form-group">
                <input type="checkbox" name="remember_me"/> Remember me
            </div>
 -->        </div>
        <div class="footer bg-orange">
            <button type="submit" class="btn bg-gray btn-block">Send me an email with a new password</button>  
<!--             <p><a href="#">I forgot my password</a></p> -->
        </div>
    </form>
    <!-- <form method="post" action="../password_recovery/index.php">
    <button type="submit" style="color:red;" class="btn btn-sm bg-dark btn-block"><u>I forgot my password</u></button>
    </form> -->
</div>