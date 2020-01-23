<?php
ob_start();
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/check_session.php";
require_once SITE_ROOT."/config/cors.php";

//Check session is already started or not
if(!isset($_SESSION)) {   session_start();  } 
$session 	= ifsessionExists();

if($session == "yes"){
		header("Location: ../views/dashboard");
}else{
	header('Location: ../controllers/login.php');
}
?>