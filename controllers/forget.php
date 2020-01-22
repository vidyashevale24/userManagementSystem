<?php
//Include site path and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";

if(isset($_POST['forget']))
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