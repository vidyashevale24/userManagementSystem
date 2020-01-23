<?php
ob_start();
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";

 	if(!isset($_SESSION)) {   session_start();  } 
	if(isset($_SESSION['email']))
	$session_user = $_SESSION['email'];

	$_SESSION['action'] 	= 'userList';
	require_once SITE_ROOT."/models/user.php";
	$link = $_SERVER['PHP_SELF'];
	$link_array = explode('/',$link);
	$page = end($link_array);	
	$pageName = explode('.', $page);

	if($pageName[0] == 'userList'){
		mysqli_close($con);
		echo json_encode($output);
	}
?>