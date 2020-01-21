<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

$form_data = json_decode(file_get_contents('php://input'), true);
$message= 	'';
$status = 	'';
$output = 	array();
$date   = 	date('Y-m-d');

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

	/*if(empty($form_data['role'])){
		$error[] = 'Role is required';
	}else{
		$role = $form_data['role'];
	}*/


if(empty($error)){
	$password = md5($password);
	$query = "INSERT INTO users (name, email, password, address, role ,createdDate)
	VALUES ('$name', '$email', '$password', '$address', 'admin', '$date')";
	if (mysqli_query($con, $query)) {
		$output['message'] = "New record created successfully";
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
?>