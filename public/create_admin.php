<?php require_once("../includes/session.php"); ?><?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../includes/validation_function.php"); ?>
<?php
	$current_subject_id = current_subject_id();
	if (isset($_POST['submit'])) { 
	
	$username = mysql_prep($_POST["username"]);
	$hashed_password = password_encrypt($_POST["password"]);
	$required_fields = array("username", "hashed_password");
  
  	$fields_with_max_lengths = array("username" => 30);
  	validate_max_length($fields_with_max_lengths);

   	if (empty($errors)) {
  	
		$query = "INSERT INTO admins (";
		$query .= " username, hashed_password ";
		$query .= ") VALUES (";
		$query .= "'{$username}', '{$hashed_password}'";
		$query .= ")";

		$result = mysqli_query($connection, $query);
		if ($result && empty($errors)) {
			$_SESSION["message"] = "Page created.";
			redirect_to("manage_admins.php");
		} else {
			$_SESSION["message"]  = "Page creation failed.";
			redirect_to("new_admin.php");
		}
	}else {
		redirect_to("new_admin.php");
	}
}
 ?>
<?php 
if (isset($connection)) { mysqli_close($connection);} ?><?php find_all_admins(); ?>