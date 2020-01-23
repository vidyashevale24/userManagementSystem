<?php
ob_start();
//Include database connection file and cors file
include $_SERVER['DOCUMENT_ROOT'].'/userManagementSystem/config.php';
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();

if($session == "yes"){
		
			header('Location:../../views/user/add');
		
}else{
	header('Location:login.php');
}
