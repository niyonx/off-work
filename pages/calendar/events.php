<?php

	require_once('../../includes/utils.php');
	require_once('../../includes/controller.php');

  $json = array();
  $db = getDbo();
  $sql = "select la.id, concat(e.firstname,' ', e.surname, ' is on ', la.half_day, lower(lt.name)) title, date_from start, date_to end from tbl_leave_application la, tbl_employee e, tbl_leave_types lt where la.emp_id = e.id and lt.id = la.lt_id and la.status = 'Approved';";
  $rows = $db->loadResult($sql);

 // sending the encoded result to success page
	echo (json_encode($rows));

?>