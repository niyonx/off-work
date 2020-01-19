<?php
require_once('utils.php'); //now able to use utils.php
    

function getDbo(){ //instantiation and create object
  static $dbobject = null;
  if (null === $dbobject) {
    $dbobject = new DatabaseMySql();            
  }
  return $dbobject;
}

function get_leave_types(){
	$db = getDbo();
  $sql = "call get_leave_types()";
  $rows = $db->loadResult($sql);
  return $rows;
}

function set_leave_types($new_name,$new_default_days, $carry_fwd){
	$db = getDbo();
	$sql = "call set_leave_types('$new_name','$new_default_days','$carry_fwd'); call refresh();";
	$db->loadResult($sql);
}

function set_department($new_name,$new_dept_code, $new_dept_head){
  $db = getDbo();
  $sql = "call set_department('$new_name','$new_dept_code', '$new_dept_head'); call refresh();";
  // pprint($sql);
  $db->loadResult($sql);
}

function delete_leave_type($delete_name){
  $db = getDbo();
  $sql = "call delete_leave_type('$delete_name'); call refresh();";
  $db->loadResult($sql);
}

function delete_department($delete_name){
  $db = getDbo();
  $sql = "call delete_department('$delete_name'); call refresh();";
  $db->loadResult($sql);
}

function verify($email, $password){
  $db = getDbo();
  $sql = "call verify('$email','$password')";
  $row = $db->loadSingleResult($sql);
  return $row;
   }

function verify_email($email){
  $db = getDbo();
  $sql = "call verify_email('$email')";
  $row = $db->loadSingleResult($sql);
  return $row;
   }

function get_user_leave_types($emp_id){
  $db = getDbo();
  $sql = "call get_user_leave_types('$emp_id')";
  $row = $db->loadResult($sql);
  return $row;
   }

function get_leave_type_name($lt_id){
  $db = getDbo();
  $sql = "call get_leave_type_name($lt_id)";
  $row = $db->loadResult($sql);
  return $row;
}

function get_ltid_from_name($lt_name){
  $db = getDbo();
  $sql = "call get_ltid_from_name('$lt_name')";
  $row = $db->loadSingleResult($sql);
  return $row;
}


function get_employee_leave_balance($emp_id){
  $db = getDbo();
  $sql = "call get_employee_leave_balance($emp_id)";
  $row = $db->loadResult($sql);
  return $row;
}

function get_all_leave_type_names(){
  $db = getDbo();
  $sql = "call get_all_leave_type_names()";
  $row = $db->loadResult($sql);
  return $row;
}

function get_all_department_names(){
  $db = getDbo();
  $sql = "call get_all_department_names()";
  $row = $db->loadResult($sql);
  return $row;
}

function get_all_employee_names(){
  $db = getDbo();
  $sql = "call get_all_employee_names()";
  $row = $db->loadResult($sql);
  return $row;
}

function get_all_employee_names_a(){
  $db = getDbo();
  $sql = "call get_all_employee_names_a()";
  $row = $db->loadResult($sql);
  return $row;
}

function get_leave_application(){
  $db = getDbo();
  $sql = "call get_leave_application()";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_emp_leave_application($emp_iden){
  $db = getDbo();
  $sql = "call get_emp_leave_application('$emp_iden')";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_uemp_leave_application($today_date, $emp_iden){
  $db = getDbo();
  $sql = "call get_uemp_leave_application('$today_date','$emp_iden')";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_emp_name($emp_id){
  $db = getDbo();
  $sql = "call get_emp_name($emp_id)";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_edit_user_leave_table(){
  $db = getDbo();
  $sql = "call get_edit_user_leave_table()";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_max_emp(){
  $db = getDbo();
  $sql = "call get_max_emp()";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_max_lt(){
  $db = getDbo();
  $sql = "call get_max_lt()";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_tbl_employee(){
  $db = getDbo();
  $sql = "call get_tbl_employee();";
  $row = $db->loadResult($sql);
  return $row;
}

function get_tbl_department(){
  $db = getDbo();
  $sql = "call get_tbl_department();";
  $row = $db->loadResult($sql);
  return $row;
}

function get_pending_leaves(){
  $db = getDbo();
  $sql = "call get_pending_leaves()";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_casual_leave($empid){
  $db = getDbo();
  $sql = "call get_casual_leave($empid)";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_sick_leave($empid){
  $db = getDbo();
  $sql = "call get_sick_leave($empid)";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_study_leave($empid){
  $db = getDbo();
  $sql = "call get_study_leave($empid)";
  $row = $db->loadSingleResult($sql);
  return $row;
}

function get_emp_job($emp_id){
  $db = getDbo();
  $sql = "call get_emp_job($emp_id)";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_all_pending(){
  $db = getDbo();
  $sql = "call get_all_pending();";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_approved(){
  $db = getDbo();
  $sql = "call get_approved();";
  $rows = $db->loadResult($sql);
  return $rows;
}

function set_leave_application_with_file($empid , $ltid, $purpose,$file,$datefrom, $dateto,$createdby,$dur, $half_day){
  $db = getDbo();
  $sql = 'call set_leave_application_with_file("'.$empid.'" , "'.$ltid.'", "'.$purpose.'","'.$file.'","'.$datefrom.'", "'.$dateto.'","'.$createdby.'","'.$dur.'","'.$half_day.'");';
  // pprint ($sql);
  $db->loadResult($sql);
}

function set_leave_application($empid , $ltid, $purpose,$datefrom, $dateto,$createdby, $dur, $half_day){
  $db = getDbo();
  $sql = 'call set_leave_application("'.$empid.'" , "'.$ltid.'", "'.$purpose.'","'.$datefrom.'", "'.$dateto.'","'.$createdby.'","'.$dur.'","'.$half_day.'");';
  // pprint ($sql);
  $db->loadResult($sql);
}

function change_status($iden, $stat,$approver,$d_approve){
  $db = getDbo();
  $sql = "call change_status($iden, '$stat', $approver, '$d_approve');";
  $db->loadResult($sql);
}

function get_id($fname,$sname,$email){
  $db = getDbo();
  $sql = "call get_id('$fname','$sname','$email');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_att_id($emp_iden,$attachment,$dcreated){
  $db = getDbo();
  $sql = "call get_att_id('$emp_iden','$attachment','$dcreated');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_did($fname){
  $db = getDbo();
  $sql = "call get_did('$fname');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function set_new_employee($fname, $lname, $dept_id , $job_name ,$email ,$phone, $admin, $pass, 
  $dob, $doe, $nic, $passport, $nkin, $pnkin, $address){
  $db = getDbo();
  // $dob="null";
  // $doe="null";
  // $nic="null";
  // $passport="null";
  // $nkin="null";
  // $pnkin="null";
  // $address="null";
  // $sql= "call set_new_employee('".$fname."', '".$lname."','".$dept_id."','".$job_name."','".$email."', '".$phone."','".$admin."','".$pass."',".$dob.",".$doe.",".$nic.",".$passport.",".$nkin.",".$pnkin.",".$address.");";
  $sql= "call set_new_employee('".$fname."', '".$lname."',".$dept_id.",'".$job_name."','".$email."', '".$phone."','".$admin."','".$pass."',$dob,$doe,$nic,$passport,$nkin,$pnkin,$address);";
  // pprint($sql);
  $db->loadResult($sql);
}

function no_pending(){
  $db = getDbo();
  $sql = "call no_pending();";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function update_user_leaves($name,$value,$id){
  $db = getDbo();
  $sql = "call update_user_leaves('$name','$value','$id')";
  pprint($sql);
  $db->loadResult($sql);
}

function update_user_details($name,$value,$id){
  $db = getDbo();
  $sql = "call update_user_details('$name','$value','$id')";
  pprint($sql);
  $db->loadResult($sql);
}

function update_holiday($name,$value,$id){
  $db = getDbo();
  $sql = "call update_holiday('$name','$value','$id')";
  pprint($sql);
  $db->loadResult($sql);
}

function update_departments($name,$value,$id){
  $db = getDbo();
  $sql = "call update_departments('$name','$value','$id')";
  pprint($sql);
  $db->loadResult($sql);
}

function update_leave_types($name,$value,$id){
  $db = getDbo();
  $sql = "call update_leave_types('$name','$value','$id')";
  pprint($sql);
  $db->loadResult($sql);
}

function get_tbl_emp_no_dep(){
  $db = getDbo();
  $sql = "call get_tbl_emp_no_dep();";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_emp_head_email($emp_iden){
  $db = getDbo();
  $sql = "call get_emp_head_email($emp_iden);";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_emp_email($emp_iden){
  $db = getDbo();
  $sql = "call get_emp_email($emp_iden);";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_emp_head($emp_iden){
  $db = getDbo();
  $sql = "call get_emp_head($emp_iden);";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function change_pass($em, $new_pass){
  $db = getDbo();
  $sql = "call change_pass('$em', '$new_pass');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function assign_approver(){
  $db = getDbo();
  $sql = "call assign_approver();";
  $db->loadResult($sql);
}

function cancel_app($emp_iden, $iden, $d_cancel){
  $db = getDbo();
  $sql = "call cancel_app($emp_iden, $iden, '$d_cancel');";
  $db->loadResult($sql);
}

function cancel_approved($emp_iden, $iden, $d_cancel){
  $db = getDbo();
  $sql = "call cancel_approved($emp_iden, $iden, '$d_cancel');";
  $db->loadResult($sql);
}

function get_deleted_lt_cancel_empid($lt_name){
  $db = getDbo();
  $sql = "call get_deleted_lt_cancel_empid('$lt_name');";
  $rows = $db->loadResult($sql);
  return $rows;
}

function get_no_users(){
  $db = getDbo();
  $sql = "call get_no_users()";
  $row = $db-> loadSingleResult($sql);
  return $row;
}

function is_admin($emp_iden){
  $db = getDbo();
  $sql = "call is_admin('$emp_iden')";
  $row = $db-> loadSingleResult($sql);
  return $row;
}

function no_on_leave($today_date){
  $db = getDbo();
  $sql = "call no_on_leave('$today_date')";
  $row = $db-> loadSingleResult($sql);
  return $row;
}

function no_pending_u($emp_iden){
  $db = getDbo();
  $sql = "call no_pending_u('$emp_iden')";
  $row = $db-> loadSingleResult($sql);
  return $row;
}

function get_duration($datefrom, $dateto){
  $db = getDbo();
  $sql = "call get_duration('$datefrom', '$dateto')";
  $row = $db-> loadSingleResult($sql);
  return $row;
}

function get_tbl_holidays(){
  $db = getDbo();
  $sql = "call get_tbl_holidays();";
  $rows = $db->loadResult($sql);
  return $rows;
}

function set_holiday($holiname, $holidate){
  $db = getDbo();
  $sql = "call set_holiday('$holiname','$holidate'); call refresh();";
  // pprint($sql);
  $db->loadResult($sql);
}

function delete_holiday($delete_name){
  $db = getDbo();
  $sql = "call delete_holiday('$delete_name'); call refresh();";
  $db->loadResult($sql);
}

function delete_att($iden){
  $db = getDbo();
  $sql = "call delete_att('$iden'); call refresh();";
  $db->loadResult($sql);
}

function get_holiden($the_name){
  $db = getDbo();
  $sql = "call get_holiden('$the_name');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_no_la(){
  $db = getDbo();
  $sql = "call get_no_la();";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_lt_left($emp_iden, $lt_iden){
  $db = getDbo();
  $sql = "call get_lt_left($emp_iden, $lt_iden);";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_precf($iden){
  $db = getDbo();
  $sql = "call get_precf($iden);";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function new_year(){
  $db = getDbo();
  $sql = "call new_year();";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_name_from_email($email){
  $db = getDbo();
  $sql = "call get_name_from_email('".$email."');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_id_from_dcode($dcode){
  $db = getDbo();
  $sql = "call get_id_from_dcode('".$dcode."');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_cascade_approval_from_empid($emp_iden){
  $db = getDbo();
  $sql = "call get_cascade_approval_from_empid('".$emp_iden."');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_half_day($iden){
  $db = getDbo();
  $sql = "call get_half_day('".$iden."');";
  $rows = $db->loadSingleResult($sql);
  return $rows;
}

function get_admins(){
  $db = getDbo();
  $sql = "call get_admins();";
  $rows = $db->loadResult($sql);
  return $rows;
}

function set_attachment($link, $emp_iden, $updator){
  $db = getDbo();
  $sql = "call set_attachment('".$link."','".$emp_iden."','".$updator."');";
  $db->loadResult($sql);
}

function get_emp_attachments($emp_iden){
  $db = getDbo();
  $sql = "call get_emp_attachments('".$emp_iden."');";
  $rows = $db->loadResult($sql);
  return $rows;
}

?>