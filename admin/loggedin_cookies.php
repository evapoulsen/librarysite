<?php
require_once('includes/header.php');
if (isset($_SESSION['admin_id'])) {
	$admin_id = $_SESSION['admin_id'];
	$query = "SELECT first_name, last_name FROM admin WHERE admin_id = '$admin_id'";
	$result = mysqli_query($con, $query);
	if (!$result) die (mysqli_error($con));
	else {
		while($row = mysqli_fetch_assoc($result)){
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			?>
<div class="logged">
	<header class="bg-primary-logged text-white">
			<div class="container-logged text-center">
				<div class="box-logged">
					<h1>Welcome to MyLibrary's Administrative Section</h1>
					<p class="lead">You are logged in as <?php echo $first_name . " " . $last_name; ?></p>
				</div>
			</div>
		</header>
	</div>


<?php
			
		}
	}
require_once('includes/footer.php');
die();
}
elseif (!isset($_SESSION['admin_id'])) {
	?>
<div class="container">
	<header></header>
	<p>You don't have access to this page. Please login first.</p>

</div>
<?php
}
require_once('includes/footer.php');
die();
?>