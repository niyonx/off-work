<?php 


    if (isset($_POST) && !empty($_POST)){
        $login_details = verify($_POST[email],encrypt($_POST[old_password]));
        $result = $login_details;
        if ($login_details == null)
        {
            // user does not exist
            // echo "<meta http-equiv='refresh' content='0;'>";
            // echo "waa";

            ?>

            <row>
                <div class="col-md-12">
                <br>

                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> User does not exist. Wrong combination of email and password.
                    </div>
                </div>
            </row>

            
            <?php 

        } 
        else{
            //user exist no error
            if ($_POST[new_password]== $_POST[new_password_2]){
                // echo "wooo";
                change_pass($_POST[email], encrypt($_POST[new_password]));
                $_SESSION[from_change_pass]=1;
                echo "<meta http-equiv='refresh' content='0; url=../logout/index.php'";
            }else{
                // echo "zzz";
                // error msg two password not same

                ?>

            <row>
                <div class="col-md-12">
                <br>
                
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation"></i> The two new passwords are not similar.
                    </div>
                </div>
            </row>

            
            <?php 
            }
        }
    }

 ?>

<div class="form-box" id="login-box">
            <div class="header bg-orange">Change password</div>
            <!-- form action="<?php /* echo root_url(); */?>pages/login/" method="post"> -->
            <form action="#" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control" placeholder="Old password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password" class="form-control" placeholder="New password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password_2" class="form-control" placeholder="Retype new password"/>
                    </div>
                </div>
                <div class="footer bg-orange">                    
                    <button type="submit" class="btn bg-gray btn-block">Submit</button>
                </div>
            </form>
        </div>


