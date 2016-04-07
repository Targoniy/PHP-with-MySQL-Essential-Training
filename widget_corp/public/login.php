<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
 
<?php require_once("../includes/validation_function.php"); ?>
<?php 
	$username = "";
	if (isset($_POST['submit'])) { 
	
		$required_fields = array("username", "hashed_password");
	  	validate_presences($required_fields);
	  
	  	$username = $_POST["username"];
	  	$password = $_POST["hashed_password"];
	   	
	   	if (empty($errors)) {
	   		$found_admin = attempt_login($username, $password);
			if ($found_admin) {  
				$_SESSION["username"] = $found_admin["username"];
				$_SESSION['admin_id'] = true;
				redirect_to("admin.php");
			} else {
				$_SESSION["message"]  = "Username/password not found.";
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
	<?php echo message(); ?>
	<?php echo form_errors($errors);?>
		<h2>Login</h2>
		<form action="login.php" method="post" >
			<p>Username
			<input type="text" name="username" value="<?php echo htmlentities($username); ?>"/>
			</p> 
			<p>
			Password
			<input type="password" name="hashed_password" value=""/>
			</p>
			<br><input type="submit" name="submit" value="Submit">
			</br>	
		</form>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	
   