<?php
ob_start();
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

$status 	= '';
$message	= '';
$output 	= array();
$userList 	= array();

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();

if($session == "yes"){
	$session_user = $_SESSION['email'];
	//$sql 	= 	"select * from users where email != '".$session_user."'";
	$sql 	= 	"select * from users where email != '".$session_user."' and role='user'";
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
		$output['status']  	= 	"Success";
	}else{
		$output['message']  = 	"User list does not exist";
		$output['status']  	= 	"Success";
	}

	//Code to check userList is loaded by API or include by another page
	$link = $_SERVER['PHP_SELF'];
	$link_array = explode('/',$link);
	$page = end($link_array);	
	$pageName = explode('.', $page);

	if($pageName[0] == 'userList'){
		mysqli_close($con);
		echo json_encode($output);
	}
}else{
	header('Location: login.php');
}
?>