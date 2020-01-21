<?php
//Include database connection file and cors file
require_once __DIR__."/../config.php";
require_once SITE_ROOT."/config/cors.php";
require_once SITE_ROOT."/config/database_connection.php";

$status 	= '';
$message	= '';
$output 	= array();
$userList 	= array();

session_start();
$session_user = $_SESSION['email'];

$sql 	= 	"select * from users where email != '".$session_user."'";
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
	$output['status']  	= 	"success!";
}
 	
mysqli_close($con);

echo json_encode($output);
?>