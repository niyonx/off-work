<?php

        
         /*if ($_SESSION[from_change_pass]=1) {
            ?>

            <row>
                <div class="col-md-12">
                <br>
                
                    <div class="alert alert-success">
                        <i class="fa fa-exclamation"></i> Password changed successfully! :D
                    </div>
                </div>
            </row>

            
            <?php 
            $_SESSION[from_change_pass] = 0;
        } */


        if (isset($_POST[email]) && isset($_POST[password])){
            $login_details = verify($_POST[email],encrypt($_POST[password]));
            $result = $login_details;
            if ($login_details == null)
            {
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
               

                $_SESSION["emp_id"]=$result->id;

                if (is_admin($_SESSION["emp_id"])->admin==1){
                    $_SESSION["is_admin"] = true;
                    // echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";
                }else{
                    $_SESSION["is_admin"] = false;
                    // echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";
                }

                $_SESSION["firstname"]=$result->firstname;
                $_SESSION["surname"]=$result->surname;
                $_SESSION["user_leave_types"] = get_user_leave_types($_SESSION["emp_id"]);
                $_SESSION["employee_leave_balance"] = get_employee_leave_balance($_SESSION["emp_id"]);
                $_SESSION["all_leave_type_names"] = get_all_leave_type_names();
                $_SESSION["all_department_names"] = get_all_department_names();
                $_SESSION["all_employee_names"] = get_all_employee_names();
                $_SESSION["emp_leave_application"] = get_emp_leave_application(0);
                $_SESSION["edit_user_leave_table"] = get_edit_user_leave_table();
                $_SESSION["max_emp"] = get_max_emp()->max_emp;
                $_SESSION["max_lt"] = get_max_lt()->max_lt;
                $_SESSION["tbl_employee"]= get_tbl_employee();
                $_SESSION["tbl_department"]= get_tbl_department();
                $_SESSION["pending_leaves"] = get_pending_leaves();
                // $_SESSION["casual_leave"] = get_casual_leave($_SESSION["emp_id"]);
               
                // $_SESSION["sick_leave"] = get_sick_leave($_SESSION["emp_id"]);
                $_SESSION["emp_job"] = get_emp_job($_SESSION["emp_id"]);
                $_SESSION['all_pending']= get_all_pending();
                $_SESSION["all_employee_names_a"] = get_all_employee_names_a();
                $_SESSION['lt_id']=get_leave_types();
                $_SESSION['tbl_emp_no_dep']= get_tbl_emp_no_dep();
                $_SESSION['root_url']=root_url();
                // $_SESSION["emp_name"] = get_emp_name(2);
                // print_r (get_leave_type_name($_SESSION[user_leave_types][2]['lt_id'])[0]['name']);
                // print_r ($_SESSION["employee_leave_balance"][0][days_entitled]);
                
                // print_r($_SESSION["edit_user_leave_table"]);
                // print_r($_SESSION["edit_user_leave_table"][0]['id']);
                // print_r ($_SESSION["edit_user_leave_table"][5]['days_left']);
                // print_r ($_SESSION["tbl_employee"]);
                // print_r ($_SESSION['all_pending']);
                // print_r($_SESSION["all_employee_names_a"]);
                // print_r($_SESSION['tbl_emp_no_dep']);
                // print_r(get_emp_head_email(2));
                echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";
                // header("Location: ../../index.php");  
            }
    }?>
<div class="form-box" id="login-box" >
    <div class="header bg-orange">Sign In</div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="body bg-gray">
            <div class="form-group">
                <div class="input-group">
                                           <span class="input-group-addon">@</span>

                <input type="email" name="email" class="form-control" placeholder="Email" autofocus/>
            </div>
            </div>
            <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>          
<!--             <div class="form-group">
                <input type="checkbox" name="remember_me"/> Remember me
            </div>
 -->        </div>
        <div class="footer bg-orange">
            <button type="submit" class="btn bg-gray btn-block">Sign me in</button>  
<!--             <p><a href="#">I forgot my password</a></p> -->
        </div>
    </form>
    <form method="post" action="../account_recovery/index.php">
    <button type="submit" style="color:red;" class="btn btn-sm bg-dark btn-block"><u>I forgot my password</u></button>
    </form>
</div>