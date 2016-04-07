<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<?php find_all_admins(); ?>
<div id="main">
	<div id="navigation">
	</div>
	<div id="page">
	<?php echo message(); ?>
	<?php $errors = errors();
	?>
	<?php echo form_errors($errors);?>
		<h2>Create Admin</h2>
		<form action="create_admin.php" method="post" >
			<p>Username
			<input type="text" name="username" value=""/>
			</p> 
			<p>
			Password
			<input type="password" name="password" value=""/>
			</p>
			<br><input type="submit" name="submit" value="Create Admin">
			</br>	
		</form>
		<br>
		<a href="manage_admins.php">Cancel</a>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	
   