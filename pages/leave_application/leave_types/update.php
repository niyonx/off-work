<?php 

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

if (isset($_POST)&& !empty($_POST)){
	// pprint (bb($_POST[name],$_POST[value],$_POST[pk]));
	update_leave_types($_POST[name],$_POST[value],$_POST[pk]);
	// echo "<meta http-equiv='refresh' content='0;'>";

	// if ($_POST[name]=='head'){

	// }
}

// update_holiday($_POST[name],$_POST[value],$_POST[pk]);

// pprint($_POST);
 ?>