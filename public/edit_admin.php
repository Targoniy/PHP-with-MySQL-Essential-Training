<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php confirm_logged_in(); ?>

<?php require_once("../includes/validation_function.php"); ?>
<?php $admin = find_admin_by_id($_GET["id"]) ?>
<?php 
	if (!$admin) {
		redirect_to("manage_admin.php");
	}
 ?>
 <?php 
	if (isset($_POST['submit'])) { 
	
	$required_fields = array("username", "hashed_password");
  	validate_presences($required_fields);
  
  	$fields_with_max_lengths = array("username" => 30);
  	validate_max_length($fields_with_max_lengths);

   	if (empty($errors)) {
		$id = $admin["id"];
		$username = mysql_prep($_POST["username"]);
  	  	$hashed_password = password_encrypt($_POST["hashed_password"]);

		$query = "UPDATE admins SET ";
		$query .= "username = '{$username}', ";
		$query .= "hashed_password = '{$hashed_password}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
		var_dump($query);
		$result = mysqli_query($connection, $query);
		if ($result && mysqli_affected_rows($connection) >= 0) {  
			$_SESSION["message"] = "Admin updated.";
			redirect_to("manage_admins.php");
		} else {
			$message  = "Admin updated failed.";
		}
	 }
	}else {
	}

 ?>
 <?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<div id="main">
	<div id="navigation">
	</div>
	<div id="page">
	 	<?php 
	if (!empty($message)) {
		echo "<div class=\"message\">" . htmlentities($message) . "</div>";
	};?>
	<?php echo form_errors($errors);?>
		<h2>Edit Admin: <?php echo htmlentities($admin["username"]); ?></h2>
		<form action="edit_admin.php?id=<?php echo urlencode($admin["id"]);?>" method="post">
			<p>Username
			<input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>"/>
			</p>Password
			<input type="password" name="hashed_password" value=""/>
			<br>
			<input type="submit" name="submit" value="Update Page">
		</form>
		<br>
		<a href="manage_admins.php>">Cancel</a>
		&nbsp;
		&nbsp;
		<a href="delete_admin.php?id=<?php echo urlencode($admin["id"]) ?>" oncick="return confirm('Are you sure?');">Delete admin</a>
	
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	
     