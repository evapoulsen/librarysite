<?php 
require_once( 'includes/header.php'); 
session_destroy(); 
setcookie( "cookie[username]", $email_tmp, time() - (86400*7)); 
setcookie( "cookie[password]", $password_tmp, time() - (86400*7)); 
header( "Location: index.php"); 
?>