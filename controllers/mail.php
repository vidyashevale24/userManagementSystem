<?php 
//Send emil using mail function


        
$server =  $_SERVER['HTTP_HOST'];$token ="123";
$url = "<a href='$server/userManagementSystem/views/confirm.php?token='".$token ."' target='_blank'  title='Click to reset password'>$server/userManagementSystem/views/confirm.php?token='".$token ."'</a>";
echo $url;die;

	$sender    = 	'vidya.shevale24@gmail.com';
	$recipient = 	'sagi@gmail.com';

	// subject
	$subject = "forget Details";

	// compose message
	$message ='hello';

	// To send HTML mail, the Content-type header must be set
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	$headers .= 'From:' . $sender;

	if (mail($recipient, $subject, $message, $headers))
	{
	   echo json_encode(array('status'=>1,'message'=>'Email send successfully'));
		exit;
	}
	else
	{
	    echo json_encode(array('status'=>0,'message'=>'Error! Somthing went wrong please try again'));
		exit;
	}
/*}else
{
	 echo json_encode(array('status'=>0,'message'=>'Error! Please provide input value'));
	 exit;
}*/