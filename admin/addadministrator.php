<?php
require_once('../conn.php');
$password = password_hash('superman', PASSWORD_DEFAULT);
$query = "INSERT INTO admin(first_name, last_name, email, password) VALUES('Clark', 'Kent', 'superman@dccomics.com', '$password')";
$result = mysqli_query($con, $query);
if (!$result) die (mysqli_error($con));
else echo "Administrator added";
?>