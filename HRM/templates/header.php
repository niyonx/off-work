<?php /*

	if (isset($_SESSION["emp_job"]) && !empty($_SESSION["emp_job"]) || $_SERVER['PHP_SELF']=='http://192.168.75.21/pages/login/index.php' || $_SERVER['PHP_SELF']=='http://192.168.75.21/LMS/pages/change_pass/'){
		// echo "<meta http-equiv='refresh' content='0;url=http://192.168.75.21/LMS/pages/login/'>";
		// echo "<meta http-equiv='refresh' content='0;url=http://localhost/LMS/pages/login/'>";
		
	}else{
		// echo $_SERVER['PHP_SELF'];
		// pprint ($_SESSION);
		//good down
		// echo "<meta http-equiv='refresh' content='0;url=http://192.168.75.21/LMS/pages/login/'>";
	}
*/
 ?>

<title><?php echo $page_title; ?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="description" content="Leave Management System"/>

<link rel="icon" href="http://www.cybernaptics.mu/wp-content/uploads/2015/12/cropped-icon-1-32x32.png" sizes="32x32" />
<!-- bootstrap 3.0.2 -->
<link href="<?php echo root_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="<?php echo root_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<!-- <link href="<?php /*echo root_url(); */?>css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
<!-- Theme style -->
<link href="<?php echo root_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />