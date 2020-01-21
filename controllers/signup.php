<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

$form_data = json_decode(file_get_contents('php://input'), true);

$error = '';
$message= '';
$output = array();
$date = date('Y-m-d');
if(!empty($form_data)){

	$query = "INSERT INTO users (name, email, password, address, role ,createdDate)
	VALUES ('".
		$form_data['name']."', '".
		$form_data['email'] ."','".
		md5($form_data['password'])."','".
		$form_data['address']."','".
		$form_data['role']."','".$date."')";

	if (mysqli_query($con, $query)) {
		$output['message'] = "New record created successfully";
		$output['status']  = "Success!.";
	} else {
	    $output['message']  = "Error: " . $query . "<br>" . mysqli_error($con);
	    $output['status']  = "Fail!";
	}
}else{
	$output['error'] 	= "Please fill all the details.";;
	$output['status']  	= "Fail!";
	echo json_encode($output);
	exit;
}
mysqli_close($con);

echo json_encode($output);
?>