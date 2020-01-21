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

	if(empty($_GET['userID'])){
		$output['error'] 	= "userID should not be empty.";;
		$output['status']  	= "Fail!";
		echo json_encode($output);
		exit;
	}

	$query 		= "select * from users where userID='".$_GET['userID']."'";
	$result 	= mysqli_query($con, $query);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$userData['name'] 		= 	$row['name'];
		$userData['email'] 		= 	$row['email'];
		$userData['address']	= 	$row['address'];
		$userData['role'] 		= 	$row['role'];
		
		$output['userData']		=	$userData;
		$output['message']  	= 	"Single user details.";
		$output['status']  		= 	"success!";
		}else{
			$output['message']  = 	"Something went wrong.";
		    $output['status']  	= 	"Fail!";
	   }

	mysqli_close($con);
	echo json_encode($output);
	}else{
		header('Location: login.php');
	}

?>