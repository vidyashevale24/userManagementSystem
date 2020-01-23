<?php
//Include site path and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";

if(isset($_POST['confirm']))
{
	$status 	= '';
	$message	= '';
	$output 	= array();
	$form_data 	= array();

	if(empty($_POST['password'])){
		$error[] = 'Password is required';
	}else{
		$form_data['password'] = trim($_POST['password']);
	}

	if(empty($error)){
		//change password
		$_SESSION['action'] 		= 'confirm_password';
		$_SESSION['password'] 	 	= trim($_POST['password']);
		$_SESSION['token'] 	 		= trim($_POST['token']);
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
	header("Location: ../views/confirm.php");
}
?>