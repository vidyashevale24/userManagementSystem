<?php

//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();
if($session == "yes"){

	$status 	= '';
	$message	= '';
	$output 	= array();

	if(empty($_GET['userID'])){
		$output['error'] 	= "userID should not be empty.";;
		$output['status']  	= "Fail!";
		echo json_encode($output);
		exit;
	}
	if(!isset($_SESSION)) {   session_start();  } 
		$_SESSION['action'] 		= 'edit';
		$_SESSION['form_data'] 	 	= $_GET['userID'];
		require_once SITE_ROOT."/models/user.php";
		echo json_encode($output);
		header("Location: ../views/user/edit.php?" . http_build_query($output));
	}else{
		header('Location: login.php');
	}

?>