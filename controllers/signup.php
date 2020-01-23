<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

if((isset($_POST['signup']) )|| isset($_POST['addUser']) )
{
	$message= 	'';
	$status = 	'';
	$output = 	array();
	$error = 	array();
	$form_data = array();

	$date   = 	date('Y-m-d');

	if(empty($_POST['name'])){
			$error[] = 'Name is required';
		}else{
			$form_data['name'] = trim($_POST['name']);
		}

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

		if(empty($_POST['address'])){
			$error[] = 'Address is required';
		}else{
			$form_data['address'] = trim($_POST['address']);
		}

		if(empty($_POST['role'])){
			$error[] = 'Role is required';
		}else{
			$form_data['role'] = $_POST['role'];
		}

		if(empty($error)){
			if(!isset($_SESSION)) {   session_start();  } 
			$_SESSION['action'] 		= 'signup';
			$_SESSION['form_data'] 	 	= $form_data;
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
	header("Location:../views/signup");
}


?>