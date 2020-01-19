<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

// $groups = array(
//   array('value' => 0, 'text' => 'Guest'),
//   array('value' => 1, 'text' => 'Service'),
//   array('value' => 2, 'text' => 'Customer'),
//   array('value' => 3, 'text' => 'Operator'),
//   array('value' => 4, 'text' => 'Support'),
//   array('value' => 5, 'text' => 'Guest'),
// );



// pprint($groups);

$_SESSION["tbl_department"] = get_tbl_department();

// pprint($_SESSION["tbl_department"]);

$str= '[';
// echo $str;
foreach ($_SESSION["tbl_department"] as $key => $value) {
	$str .='{"value":'.$_SESSION["tbl_department"][$key][id].',"text":"'.$_SESSION["tbl_department"][$key][dept_name].'"},';
	
}
$str .= ']';
// echo $str;


// $a = "hohahu";

echo (substr($str,0,strlen($str)-3).'}]');

// echo json_encode($_SESSION["all_department_names"]);


// echo json_encode($groups);  

?>