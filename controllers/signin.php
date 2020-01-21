<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

$form_data = json_decode(file_get_contents('php://input'), true);
$status 	= '';
$message	= '';
$output 	= array();

if(empty($form_data['email']) && empty($form_data['password'])){
	$output['error'] 	= "Email and password should not be empty.";;
	$output['status']  	= "Fail!";
	echo json_encode($output);
	exit;
}

$query 		= "select * from users where email='".$form_data['email'] ."' and password='".md5($form_data['password'])."' LIMIT 1";
$result 	= mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
		if($row['role'] == 'user'){
	    	$output['error'] 	= "Sorry! User don't have permission to Login.";;
		    $output['status']  	= "Fail";
		}else{
			//Create session for logged in user
			session_start();
			$_SESSION['email'] = $form_data['email'];
			include("userList.php");
			
	    	/*$sql 	= 	"select * from users where email !='".$form_data['email']."'";
			$res    = 	mysqli_query($con, $sql);
			if (mysqli_num_rows($res) > 0) {
				$i=0;
				while ($r = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
					$userList[$i]['name'] = $r['name'];
					$userList[$i]['email'] = $r['email'];
					$userList[$i]['address'] = $r['address'];
					$userList[$i]['role'] = $r['role'];
					$i++;
				}
				
				$output['userList']	=	$userList;
				$output['message']  = 	"User List";
	    		$output['status']  	= 	"success!";
	    	}else{
	    		$output['message']  = 	"User list does not exist";
	    		$output['status']  	= 	"Fail!";
	    	}*/
    	}
}else{
		$output['message']  = 	"Email or password does not exist.";
	    $output['status']  	= 	"Fail!";
   }

mysqli_close($con);
echo json_encode($output);
?>