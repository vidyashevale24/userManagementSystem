<?php

//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();
if($session == "yes"){

	$status 	= '';
	$message	= '';
	$output 	= array();

	$form_data = json_decode(file_get_contents('php://input'), true);
	if(empty($form_data['name'])){
		$error[] = 'Name is required';
	}else{
		$name = $form_data['name'];
	}

	if(empty($form_data['email'])){
		$error[] = 'email is required';
	}else{
		$email = $form_data['email'];
	}

	if(empty($form_data['password'])){
		$error[] = 'password is required';
	}else{
		$password = $form_data['password'];
	}

	if(empty($form_data['address'])){
		$error[] = 'Address is required';
	}else{
		$address = $form_data['address'];
	}

	if(empty($form_data['role'])){
		$error[] = 'Role is required';
	}else{
		$role = $form_data['role'];
	}


	if(empty($form_data['userID'])){
		$error[] = 'UserID is required';
	}else{
		$userID = $form_data['userID'];
	}

	if(empty($error)){

		$password 	= md5($form_data['password']);

		$query = "UPDATE users SET 
				name = '$name', 
				email = '$email', 
				password = '$password', 
				address = '$address', 
				role = '$role' 
			WHERE userID = '$userID' ";
		
	if (mysqli_query($con, $query)) {
			$output['message'] = "Record record created successfully";
			$output['status']  = "Success!.";
		} else {
		    $output['message']  = "Error: " . $query . "<br>" . mysqli_error($con);
		    $output['status']  = "Fail!";
		}
	}else{
		$validation_error = implode(",",$error);
		$output['error']   = $validation_error;
		$output['status']  	= "Fail!";
		echo json_encode($output);
		exit;
	}

	mysqli_close($con);
	echo json_encode($output);
	}else{
		header('Location: login.php');
	}

?>