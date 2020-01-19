<?php 

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

if(isset($_POST) && !empty($_POST)){

	$ajax_date = (explode(" ", $_POST[dates]));

	// if (get_duration($ajax_date[0],$ajax_date[2])->dur == 1) {
	if ($ajax_date[0]==$ajax_date[2]) {
		echo get_duration($ajax_date[0],$ajax_date[2])->dur." day";
	}else{
		echo get_duration($ajax_date[0],$ajax_date[2])->dur." days";
	}
}


 ?>