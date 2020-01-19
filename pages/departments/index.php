<?php

require_once('../../includes/utils.php');
require_once('../../includes/controller.php');

$leave_types = get_leave_types();

$page_title = 'Departments';
$body_file = 'body.php';
$header_file = '../../templates/header.php';
$footer_file = '../../templates/footer.php';
$sidebar_menu_file = "../../templates/sidebar_menu.php";
$body_header_file = "../../templates/body_header.php";
$more_footer_file = "more_footer.php";
$more_header_file = "more_header.php";


require_once('../../templates/template.php');


?>
