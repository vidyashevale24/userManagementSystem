<?php
session_start();
//Include site path and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";

if(isset($_POST['forgot']))
{
	$status 	= '';
	$message	= '';
	$output 	= array();
	$form_data 	= array();

	if(empty($_POST['email'])){
		$error[] = 'email is required';
	}else{
		$form_data['email'] = trim($_POST['email']);
	}

	if(empty($error)){
		//check email exist here and sent email 
		$_SESSION['action'] 	='forgot_password';
		$_SESSION['email'] 	 	= trim($_POST['email']);
		require_once SITE_ROOT."/models/user.php";
	}else{
		$validation_error = implode(",",$error);
		$output['message']   = $validation_error;
		$output['status']  	= "Fail";
		echo json_encode($output);
		exit;
	}
	mysqli_close($con);
	echo json_encode($output);
}else{
	header("Location: ../views/forgot.php");
}
?>