<?php
require_once('../conn.php');
if (isset($_COOKIE['cookie'])) {
	$cookies = $_COOKIE['cookie'];
	print '<pre>';
	print_r($cookies);
	print '</pre>';
	if (array_key_exists('username', $cookies) && array_key_exists('password', $cookies)) {
		$username = $cookies['username'];
		$password_tmp = $cookies['password'];
		$query = "SELECT * FROM admin WHERE email = '$username'";
		$result = mysqli_query($con, $query);
		if (!$result) die (mysqli_error($con));
		else {
			while ($row = mysqli_fetch_assoc($result)){
				$admin_id = $row['admin_id'];
				$email = $row['email'];
				$password = $row['password'];
				$token = password_verify($password_tmp, $password);
				if ($token == $password) {
					header("Location: loggedin_cookies.php");
				}
				
			}
		}
		
	}
}
elseif (!isset($_COOKIE['cookie']) && $page <> 'index') { 
	header("Location: index.php");
	die();
} 
?>