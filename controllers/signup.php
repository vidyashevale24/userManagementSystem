<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

if(isset($_POST['signup']))
{
	$message= 	'';
	$status = 	'';
	$output = 	array();
	$date   = 	date('Y-m-d');

	if(empty($_POST['name'])){
			$error[] = 'Name is required';
		}else{
			$name = $_POST['name'];
		}

		if(empty($_POST['email'])){
			$error[] = 'email is required';
		}else{
			$email = $_POST['email'];
		}

		if(empty($_POST['password'])){
			$error[] = 'password is required';
		}else{
			$password = $_POST['password'];
		}

		if(empty($_POST['address'])){
			$error[] = 'Address is required';
		}else{
			$address = $_POST['address'];
		}

		/*if(empty($_POST['role'])){
			$error[] = 'Role is required';
		}else{
			$role = $_POST['role'];
		}*/


		if(empty($error)){
			if(!isset($_SESSION)) {   session_start();  } 
			$_SESSION['action'] 		= 'signup';
			$_SESSION['form_data'] 	 	= $_POST;
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
	echo "view";
}


?>