<?php 

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

if(isset($_POST) && !empty($_POST)){

$_SESSION["employee_leave_balance"] = get_employee_leave_balance($_POST["emp_sel"]);
    $_SESSION["all_leave_type_names"] = get_all_leave_type_names();
foreach ($_SESSION["all_leave_type_names"] as $key => $value) {
    echo ("<option value='".($key+1)."'>".$_SESSION["all_leave_type_names"][$key]['name']." (".$_SESSION["employee_leave_balance"][$key][days_left]." left)"."</option>");
}

}


 ?>