<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

$_SESSION["tbl_employee"]= get_tbl_employee();

$groups = array(
  array('value' => 0, 'text' => 'Guest'),
  array('value' => 1, 'text' => 'Service'),
  array('value' => 2, 'text' => 'Customer'),
  array('value' => 3, 'text' => 'Operator'),
  array('value' => 4, 'text' => 'Support'),
  array('value' => 5, 'text' => 'Guest'),
);

// get_emp_name($_SESSION['tbl_employee'][$key]['head'])->firstname." ".get_emp_name($_SESSION['tbl_employee'][$key]['head'])->surname

// pprint($_SESSION["tbl_employee"]);
$str= '[';
// echo $str;
foreach ($_SESSION["tbl_employee"] as $key => $value) {
	$str .='{"value":'.$_SESSION["tbl_employee"][$key][id].',"text":"'.get_emp_name($_SESSION["tbl_employee"][$key][id])->firstname.' '.get_emp_name($_SESSION["tbl_employee"][$key][id])->surname.'"},';
	
}
$str .= ']';
// echo $str;


// $a = "hohahu";

echo (substr($str,0,strlen($str)-3).'}]');

// [{"value":0,"text":"Guest"},{"value":1,"text":"Service"},{"value":2,"text":"Customer"},{"value":3,"text":"Operator"},{"value":4,"text":"Support"},{"value":5,"text":"Guest"}]

// echo json_encode($groups);  

?>