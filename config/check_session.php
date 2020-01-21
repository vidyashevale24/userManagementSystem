<?php
//check session is exist or not
function ifsessionExists(){
	if(isset($_SESSION['email'])){
    return "yes";
  }else{
    return "no";
  }
 }
?>