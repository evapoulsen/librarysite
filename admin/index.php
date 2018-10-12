<?php
require_once('includes/header.php');
$page = 'index';
require_once('auto_login.php');
if (isset($_POST['email']) && isset($_POST['password']) && !isset($_POST['remember'])) {
	$email_tmp = $_POST['email'];
	$password_tmp = $_POST['password'];
	$query = "SELECT * FROM admin WHERE email = '$email_tmp'";
	$result = mysqli_query($con, $query);
	if (!$result) die (mysqli_error($con));
	else {
		$rows = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)) {
			$admin_id = $row['admin_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$password = $row['password'];
			$token = (password_verify($password_tmp, $password));
			setcookie("cookie[username]", $email_tmp, time() - (86400*7));
			setcookie("cookie[password]", $password_tmp, time() - (86400*7));
			if ($token == $password) {
				$_SESSION['admin_id'] = $admin_id;
				header("Location: loggein_nocookies.php");
			}
			die();
		}
	}
}
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['remember'])) {
	$email_tmp = $_POST['email'];
	$password_tmp = $_POST['password'];
	if ($_POST['remember'] == 'remember') {
		setcookie("cookie[username]", $email_tmp, time() + (86400*7));
		setcookie("cookie[password]", $password_tmp, time() + (86400*7));
	}
	$query = "SELECT * FROM admin WHERE email = '$email_tmp'";
	$result = mysqli_query($con, $query);
	if (!$result) die (mysqli_error($con));
	else {
		$rows = mysqli_num_rows($result);
		while($row = mysqli_fetch_assoc($result)) {
			$admin_id = $row['admin_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$password = $row['password'];
			$token = (password_verify($password_tmp, $password));
			if ($token == $password) {
				$_SESSION['admin_id'] = $admin_id;
				header("Location: loggedin_cookies.php");
			}
			die();
		}
	}
}
	?>

<header class="bg-primary text-white">
			<div class="container text-center">
				<div class="box">
					<h1>Welcome to MyLibrary</h1>
					<p class="lead">To access the administration pages please login</p>
				</div>
			</div>
		</header>
<?php
if (isset($_COOKIE['cookie'])) {
	$cookies = $_COOKIE['cookie'];
	if (array_key_exists('username', $cookies) && array_key_exists('password', $cookies)) {
	$username = $cookies['username'];
	$password_tmp = $cookies['password'];
		$query = "SELECT admin_id FROM admin WHERE email = '$username'";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($result)) {
			$admin_id = $row['admin_id'];
		$_SESSION['admin_id'] = $admin_id;
?>
		<div class="container form">
			<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<h1 class="h3 mb-3 font-weight-normal">Please login</h1>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value = "<?php echo $username; ?>" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value = "<?php echo $password_tmp; ?>" required>
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember" name="remember"> Remember me </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>

		</div>
<?php
	}
}
}
else {
	?>
<div class="container form">
			<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<h1 class="h3 mb-3 font-weight-normal">Please login</h1>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember" name="remember"> Remember me </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>

		</div>
<?php
}
require_once('includes/footer.php');
?>