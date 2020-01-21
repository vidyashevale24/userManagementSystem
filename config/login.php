<?php
include('cors.php');
include('database_connection.php');

$form_data = json_decode(file_get_contents('php://input'), true);

$error = '';
$message= '';
$output = array();

if(!empty($form_data)){
	$query = "select * from profile where email='".$form_data['email'] ."' and password='".$form_data['password']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetch();
	if(!empty($result)){
		$output['result']   = $result;
	}else{
		$message = "Invalid login Details.";
	}
}
$output['message'] = $message;
echo json_encode($output);
?>