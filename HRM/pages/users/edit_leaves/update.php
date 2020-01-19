<?php 

require_once('../../../includes/utils.php');
require_once('../../../includes/controller.php');

if (isset($_POST)&& !empty($_POST)){
	update_user_leaves($_POST[name],$_POST[value]+(get_precf(1)->prev_carry_fwd),$_POST[pk]);
	// pprint (update_user_leaves($_POST[name],$_POST[value],$_POST[pk]));

	// echo (get_precf(5)->prev_carry_fwd);
	// pprint("4");
}

// echo (get_precf(1)->prev_carry_fwd);
// 	pprint("hola");
// 	echo encrypt("admin")."<br>";
// 	echo encrypt("nigel")."<br>";
// 	echo encrypt("bob")."<br>";
// 	echo encrypt("steve")."<br>";
// 	echo encrypt("john")."<br>";
// 	echo encrypt("ben")."<br>";
// 	echo encrypt("chris")."<br>";
// 	echo encrypt("donald")."<br>";
	

 ?>