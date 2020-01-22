<?php 
define('SITE_ROOT', __DIR__);
date_default_timezone_set("Asia/Calcutta");
$link = '';
$link .= $_SERVER['HTTP_HOST']; 
$url  = $_SERVER['PHP_SELF'];
$link_array = explode('/',$url);
$link .="/".$link_array[1];
define('base_url', $link)

?>