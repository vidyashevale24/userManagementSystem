<?php
session_start();
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";

//Check session is already started or not
$status 	= '';
$message	= '';
$output 	= array();
$error 		= array();
$form_data 	= array();
$session 	= ifsessionExists();
if($session == "yes"){
	if(empty($_POST['userID'])){
		$error[] = 'userID is required';
	}else{
		$userID = trim($_POST['userID']);
	}
	if(empty($error)){
		if(!isset($_SESSION)) {   session_start();  } 
		$_SESSION['action'] 		= 'delete';
		$_SESSION['userID'] 	 	=  $userID;
		require_once SITE_ROOT."/models/user.php";
		echo json_encode($output);
		exit;
	}else{
		$validation_error = implode(",",$error);
		$output['message']   = $validation_error;
		$output['status']  	= "Fail";
		echo json_encode($output);
		exit;
	}
} else {
	header('Location: login.php');
}

?>