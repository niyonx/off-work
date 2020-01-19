<?php
session_start();
?>

<?php 

    if (isset($_SESSION["emp_job"]) && !empty($_SESSION["emp_job"]) || $_SERVER['PHP_SELF']=='/pages/logout/index.php' || $_SERVER['PHP_SELF']=='/pages/login/index.php' || $_SERVER['PHP_SELF']=='/pages/change_pass/index.php' || $_SERVER['PHP_SELF']=='/pages/account_recovery/index.php'){
        // $_SESSION[PR] =0;
        // echo "<meta http-equiv='refresh' content='0;url=http://192.168.75.21/LMS/pages/login/'>";
        // echo "<meta http-equiv='refresh' content='0;url=http://localhost/LMS/pages/login/'>";
        
    }else{
        // echo $_SERVER['PHP_SELF'];
        // pprint ($_SESSION);
        //good down
        $root_url= root_url();

        echo "<meta http-equiv='refresh' content='0;url=".$root_url."pages/login/'>";
    }

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"><?php
    		require_once($header_file);
            // echos ($more_header_file);
    		if (file_exists($more_header_file)){
    			require_once($more_header_file);
    		}?>
    </head>
	<body class="skin-black">
		<?php
            if (file_exists($body_header_file)){
                require_once($body_header_file);
            }
	    	require_once($body_file);
	    	require_once($footer_file);
	    	if (file_exists($more_footer_file)){
    			require_once($more_footer_file);
    		}
	    ?>
	</body>
</html>