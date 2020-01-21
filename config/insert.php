<?php
include('cors.php');
include('database_connection.php');

$form_data = json_decode(file_get_contents('php://input'), true);

$error = '';
$message= '';
$validation_error = '';
$firstName = '';
$lastName = '';
$output = array();
if($form_data['action'] == 'fetch_single_data'){
	$query = "SELECT * FROM profile WHERE id='".$form_data['id']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetch();
	if(!empty($result)){
		$output['firstName'] = $result['firstName'];
		$output['lastName'] = $result['lastName'];
	}
}
elseif($form_data['action'] == "Delete"){
	$query = "DELETE FROM profile WHERE id='".$form_data['id']."'";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$message = 'Record Deleted Successfully.';
	}
}
else{
	
	if(empty($form_data['firstName'])){
		$error[] = 'First Name is required';
	}else{
		$firstName = $form_data['firstName'];
	}

	if(empty($form_data['lastName'])){
		$error[] = 'Last Name is required';
	}else{
		$lastName = $form_data['lastName'];
	}

	if(empty($error)){
		if($form_data['action'] == 'Insert'){

			//Method 1
			/*$statement = $connect->prepare("INSERT INTO profile(firstName,lastName) VALUES (:firstName,:lastName)");
			$statement->bindParam(":firstName", $firstName, PDO::PARAM_STR);
			$statement->bindParam(":lastName", $lastName, PDO::PARAM_STR);
			if($statement->execute()){
				$message = "Record inserted successfully";
			}*/

			//Method 2
			$data = array(
				':firstName' => $firstName,
				':lastName' => $lastName
			);
			$query = "INSERT INTO profile(firstName,lastName) VALUES (:firstName,:lastName)";
			$statement = $connect->prepare($query);
			$statement->bindParam(":firstName", $firstName, PDO::PARAM_STR);
			$statement->bindParam(":lastName", $lastName, PDO::PARAM_STR);
			if($statement->execute()){
				$message = "Record Inserted Successfully";
			}
		}
		if($form_data['action'] == 'Edit')
		{
			$data = array(
				':firstName'	=>	$form_data['firstName'],
				':lastName'	=>	$form_data['lastName'],
				':id'			=>	$form_data['id']
			);
			$query = "
			UPDATE profile SET firstName = :firstName, lastName = :lastName WHERE id = :id
			";

			$statement = $connect->prepare($query);
			$statement->bindParam(":firstName", $firstName, PDO::PARAM_STR);
			$statement->bindParam(":lastName", $lastName, PDO::PARAM_STR);
			if($statement->execute($data))
			{
				$message = 'Record Edited Successfully.';
			}
		}
	}else{
		$validation_error = implode(",",$error);
	}
}
$output['error']   = $validation_error;
$output['message'] = $message;
echo json_encode($output);
?>