<?php   
    if(!isset($_SESSION)) {   session_start();  } 
        if(isset($_SESSION['name'])){
        $session_user_name = $_SESSION['name'];
        $userData = $_GET['userData'];
        include('add.php'); 
}            
 ?>
