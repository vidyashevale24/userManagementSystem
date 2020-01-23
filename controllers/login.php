<?php
//Include site path and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";

if(isset($_POST['login']))
{
	$status 	= '';
	$message	= '';
	$output 	= array();
	$error 		= array();
	$form_data 	= array();

	if(empty($_POST['email'])){
		$error[] = 'email is required';
	}else{
		$form_data['email'] = trim($_POST['email']);
	}

	if(empty($_POST['password'])){
		$error[] = 'password is required';
	}else{
		$form_data['password'] = trim($_POST['password']);
	}
	if(empty($error)){
		if(!isset($_SESSION)) {   session_start();  } 
		$_SESSION['action'] 		= 'login';
		$_SESSION['form_data'] 	 	= $form_data;
		require_once SITE_ROOT."/models/user.php";
		echo json_encode($output);
	}else{
		$validation_error = implode(",",$error);
		$output['message']   = $validation_error;
		$output['status']  	= "Fail";
		echo json_encode($output);
		exit;
	}
}else{
	header("Location:../views/login");
}
?>