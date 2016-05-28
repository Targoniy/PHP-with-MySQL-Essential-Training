<?php require_once("../includes/session.php"); ?><?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_function.php"); ?>
<?php
	$current_subject_id = current_subject_id();
	// var_dump($current_subject_id);"<br>";
	if (isset($_POST['submit'])) { 
	
	$menu_name = mysql_prep($_POST["menu_name"]);
	$position = (int) $_POST["position"];
  	$visible = (int) $_POST["visible"];
  	$subject_id = (int)($_POST["subject_id"]);
  	$content = mysql_prep($_POST["content"]);
	$required_fields = array("subject_id","menu_name", "position", "visible", "content");
  	validate_presences($required_fields);
  
  	$fields_with_max_lengths = array("menu_name" => 30);
  	validate_max_length($fields_with_max_lengths);

   	if (!empty($errors)) {
	  	$_SESSION["errors"] = $errors;
	  	redirect_to("new_page.php");
	} else { 	
  	
	$query = "INSERT INTO pages (";
	$query .= " subject_id, menu_name, position, visible, content";
	$query .= ") VALUES (";
	$query .= " {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
	$query .= ")";


	$result = mysqli_query($connection, $query);
	if ($result && empty($errors)) {
		$_SESSION["message"] = "Page created.";
		redirect_to("manage_content.php");
	} else {
		$_SESSION["message"]  = "Page creation failed.";
		redirect_to("new_page.php");

		}
	}	
	} else {
		redirect_to("new_page.php");
	}
 ?>
<?php 
if (isset($connection)) { mysqli_close($connection);} ?>