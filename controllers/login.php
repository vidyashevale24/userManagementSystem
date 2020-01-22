<?php
//Include site path and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";

if(isset($_POST['login']))
{
	$status 	= '';
	$message	= '';
	$output 	= array();

	if(empty($_POST['email'])){
		$error[] = 'email is required';
	}else{
		$email = trim($_POST['email']);
	}

	if(empty($_POST['password'])){
		$error[] = 'password is required';
	}else{
		$password = trim($_POST['password']);
	}
	if(empty($error)){
		if(!isset($_SESSION)) {   session_start();  } 
		$_SESSION['action'] 		= 'login';
		$_SESSION['form_data'] 	 	= $_POST;
		require_once SITE_ROOT."/models/user.php";
	}else{
		$validation_error = implode(",",$error);
		$output['error']   = $validation_error;
		$output['status']  	= "Fail";
		echo json_encode($output);
		exit;
	}
	mysqli_close($con);
	echo json_encode($output);
}else{
	//header("Location: ".SITE_ROOT."/views/login.php");
	//header (SITE_ROOT."/views/login.php");
	//echo "view";
}
?>