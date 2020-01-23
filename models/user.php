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

				//create logged in user session

				$_SESSION['email']  = $form_data['email'];
				$_SESSION['name']   = $row['name'];
				include('userList.php');
				$output['message'] = "Logged In successfully.";
				$output['status']  = "Success";
			}
		}else{
				$output['message']  = 	"Incorrect Email or password.";
			    $output['status']  	= 	"Fail";
	   }
}

	//SignUp and addUser method
	if($_SESSION['action'] == 'signup' || $_SESSION['action'] == 'addUser'){
		$query = "INSERT INTO users (name, email, password, address, role ,createdDate)
		VALUES ('".$form_data['name']."', '".$form_data['email']."', '".md5($form_data['password'])."', '".$form_data['address']."', '".$form_data['role']."', '".$date."')";

		if (mysqli_query($con, $query)) {
			if($form_data['role'] == 'admin'){
				$_SESSION['email']  = $form_data['email'];
				$_SESSION['name']   = $form_data['name'];
			}
			$output['message'] = "New record created successfully.";
			$output['status']  = "Success";
		} else {
		    $output['message']  = "Error: " . $query . "<br>" . mysqli_error($con);
		    $output['status']  = "Fail";
		}
	}

	if($_SESSION['action'] == 'userList'){
		
		if(!isset($_SESSION)) {   session_start();  } 
		if(isset($_SESSION['email']))
		$session_user = $_SESSION['email'];
		$sql 	= 	"select * from users where email != '".$session_user."'";
		//$sql 	= 	"select * from users where email != '".$session_user."' and role='user'";
		$res    = 	mysqli_query($con, $sql);
		if (mysqli_num_rows($res) > 0) {
		$i=0;
		while ($r = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$userList[$i]['userID'] 		= $r['userID'];
			$userList[$i]['name'] 		= $r['name'];
			$userList[$i]['email'] 		= $r['email'];
			$userList[$i]['address']	= $r['address'];
			$userList[$i]['role'] 		= $r['role'];
			$i++;
		}   
			$output['userList']	=	$userList;
			$output['message']  = 	"User List";
			$output['status']  	= 	"Success";
		}else{
			$output['message']  = 	"User list does not exist";
			$output['status']  	= 	"Success";
		}
	}

	if($_SESSION['action'] == 'delete'){
		
		if(!isset($_SESSION)) {   session_start();  } 
		if(isset($_SESSION['email']))
		$session_user = $_SESSION['email'];

		$form_data = $_SESSION['userID'];
		$sql 	= 	"DELETE FROM `users` WHERE userID=".$_SESSION['userID'];
		if (mysqli_query($con, $sql)) {
		    $output['message']  =  "Record deleted successfully";
		    $output['status']  	= 	"Success";
		} else {
		    $output['message']  =  "Error deleting record: " . mysqli_error($con);
		    $output['status']  	= 	"Fail";
		}
	}


	if($_SESSION['action'] == 'edit'){

		if(!isset($_SESSION)) {   session_start();  } 
		if(isset($_SESSION['email']))
		$session_user = $_SESSION['email'];
		$form_data = $_SESSION['form_data'];
		$query 		= "select * from users where userID='".$form_data."'";
		$result 	= mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$userData['userID'] 	= 	$row['userID'];
			$userData['name'] 		= 	$row['name'];
			$userData['email'] 		= 	$row['email'];
			$userData['address']	= 	$row['address'];
			$userData['role'] 		= 	$row['role'];
			
			$output['userData']		=	$userData;
			$output['message']  	= 	"Single user details.";
			$output['status']  		= 	"Success";
			}else{
				$output['message']  = 	"Something went wrong.";
			    $output['status']  	= 	"Fail";
		   }

		mysqli_close($con);
	}

	if($_SESSION['action'] == 'update'){
		if(!isset($_SESSION)) {   session_start();  } 
		if(isset($_SESSION['email']))
		$session_user = $_SESSION['email'];
		$form_data = $_SESSION['form_data'];
		$query = "UPDATE users SET 
				name = '".$form_data['name']."', 
				email = '".$form_data['email']."', 
				address = '".$form_data['address']."', 
				role = '".$form_data['role']."'
				
			WHERE userID = '".$form_data['userID']."' ";
		
	if (mysqli_query($con, $query)) {
			$output['message'] = "Record updated successfully";
			$output['status']  = "Success";
		} else {
		    $output['message']  = "Error: " . $query . "<br>" . mysqli_error($con);
		    $output['status']  = "Fail";
		}
	}
	
	//forgot password
	if($_SESSION['action'] == 'forgot_password'){
		$email = $_SESSION['email'];
		$query = "select userID from users where email='".$email."'";
		$is_exit=mysqli_query($con, $query);
		if($is_exit->num_rows!=0){
			$token=md5(uniqid(rand(), true));
			$query_token = "update users set token='".$token."' where email='".$email."'";
			if(mysqli_query($con, $query_token)){
				//echo "<a href='".base_url."/controller/confirm.php?token=".$token."' target='_blank' title='Click to reset password'>Reset Password</a>";
				$sender    = 	'vidya.shevale24@gmail.com';
				$recipient = 	$email;
				$server    =	$_SERVER['HTTP_HOST'] ;

				// subject
				$subject = "Reset your password";
				$url = "<a href='$server/userManagementSystem/views/confirm.php?token='".$token ."' target='_blank'  title='Click to reset password'>Forgot Password</a>";
				// compose message
				$message ='Click on below link to reset password <br>'.$url;

				// To send HTML mail, the Content-type header must be set
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

				$headers .= 'From:' . $sender;

				if (mail($recipient, $subject, $message, $headers))
				{
				   $output['message'] = "Reset password link has send on registered Email Address";
					$output['status']  = "Success";
				}
				else
				{
				    $output['message'] = "Oops! Something went wrong";
					$output['status']  = "Fail";
				}

			}
		}else {
		    $output['message']  = "Email : " . $email . " not registered" ;
		    $output['status']  = "Fail";
		}
	}

	//Confirm password
	if($_SESSION['action'] == 'confirm_password'){
		$password = md5($_SESSION['password']);
		$token = $_SESSION['token'];
		$query = "select userID from users where token='".$token."'";
		$token_exist=mysqli_query($con, $query);
		if($token_exist->num_rows!=0){
			$query_token_delete = "update users set password='".$password."',token='' where token='".$token."'";
			mysqli_query($con, $query_token_delete);
			$output['message'] = "Password has reset successfully";
			$output['status']  = "Success";
		}else{
			$output['message'] = "Invalid request for reset password, please try again";
			$output['status']  = "Fail";
		}
	}

}
?>