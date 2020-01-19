<?php 

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

if (isset($_POST)&& !empty($_POST)){


	if ($_POST[name]=='active' && $_POST[value]=='active'){
		update_user_details($_POST[name],1,$_POST[pk]);

	}elseif ($_POST[name]=='active' && $_POST[value]=='inactive') {
		update_user_details($_POST[name],0,$_POST[pk]);

	}elseif ($_POST[name]=='admin' && $_POST[value]=='true'){
		update_user_details($_POST[name],1,$_POST[pk]);

	}elseif ($_POST[name]=='admin' && $_POST[value]=='false'){
		update_user_details($_POST[name],0,$_POST[pk]);
	}elseif ($_POST[name]=='cascade_approval' && $_POST[value]=='true'){
		update_user_details($_POST[name],1,$_POST[pk]);

	}elseif ($_POST[name]=='cascade_approval' && $_POST[value]=='false'){
		update_user_details($_POST[name],0,$_POST[pk]);
	}
	else{
		update_user_details($_POST[name],$_POST[value],$_POST[pk]);
	}
	// pprint (update_user_details($_POST[name],$_POST[value],$_POST[pk]));

	// echo "<meta http-equiv='refresh' content='0;'>";

	// if ($_POST[name]=='head'){

	// }
}

// pprint($_POST);
 ?>