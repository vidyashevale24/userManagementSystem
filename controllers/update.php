<?php

//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();
if($session == "yes"){

	if(isset($_POST['editUser']) ){
		$message= 	'';
		$status = 	'';
		$output = 	array();
		$error = 	array();
		$form_data = array();

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

			if(empty($_POST['userID'])){
				$error[] = 'userID is required';
			}else{
				$form_data['userID'] = $_POST['userID'];
			}

			if(empty($error)){
				if(!isset($_SESSION)) {   session_start();  } 
				$_SESSION['action'] 		= 'update';
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
	}
}else{
		header('Location: login.php');
}
?>