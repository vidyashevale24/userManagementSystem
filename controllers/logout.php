<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['action']);
	unset($_SESSION['form_data']);
	
	if(session_destroy())
	{
		header("Location: login");
	}
?>