<?php
//Include site path and database connection
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/database_connection.php";

$date   = 	date('Y-m-d');
if(!isset($_SESSION)) {   session_start();  } 

if(isset($_SESSION['action'])){
	//login method
	if($_SESSION['action'] == 'login'){
		$form_data = $_SESSION['form_data'];
		$query 		= "select * from users where email='".$form_data['email'] ."' and password='".md5($form_data['password'])."' LIMIT 1";
		$result 	= mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if($row['role'] == 'user'){
		    	$output['message'] 	= "Sorry! User don't have permission to Login.";;
			    $output['status']  	= "Fail";
			}else{
				//Create session for logged in user
				if(!isset($_SESSION)) {   session_start();  } 
				$_SESSION['email'] = $form_data['email'];
				include("userList.php");
			}
		}else{
				$output['message']  = 	"Incorrect Email or password.";
			    $output['status']  	= 	"Fail";
	   }
}

	//SignUp and addUser method
	if($_SESSION['action'] == 'signup' || $_SESSION['action'] == 'addUser'){
		echo $_SESSION['action'];
		$form_data = $_SESSION['form_data'];
		if($_SESSION['action'] == 'signup' ) 
			$role = 'admin' ;
		if($_SESSION['action'] == 'addUser' ) 
			$role = 'user'; 

		$query = "INSERT INTO users (name, email, password, address, role ,createdDate)
		VALUES ('".$name."', '".$email."', '".md5($password)."', '".$address."', '".$role."', '".$date."')";

		if (mysqli_query($con, $query)) {
			$output['message'] = "New record created successfully";
			$output['status']  = "Success";
		} else {
		    $output['message']  = "Error: " . $query . "<br>" . mysqli_error($con);
		    $output['status']  = "Fail";
		}
	}
}
?>