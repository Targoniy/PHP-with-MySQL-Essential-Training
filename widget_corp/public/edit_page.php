<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_function.php"); ?>
<?php find_selected_page(); ?>
<?php 
	if (!$current_page) {
		redirect_to("manage_content.php");
	}
 ?>
 <?php 
	if (isset($_POST['submit'])) { 
	
	$required_fields = array("menu_name", "position", "visible");
  	validate_presences($required_fields);
  
  	$fields_with_max_lengths = array("menu_name" => 30);
  	validate_max_length($fields_with_max_lengths);

   	if (empty($errors)) {
		$id = $current_page["id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
	  	$visible = (int) $_POST["visible"];
  	  	$content = mysql_prep($_POST["content"]);

		$query = "UPDATE pages SET ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible}, ";
		$query .= "content = '{$content}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";

		$result = mysqli_query($connection, $query);
		if ($result && mysqli_affected_rows($connection) >= 0) {  
			$_SESSION["message"] = "Page updated.";
			$destination = urlencode($current_page["id"]);
			redirect_to("manage_content.php?page=" . $destination);
		} else {
			$message  = "Page updated failed.";
		}
	 }
	}else {
	}

 ?>
 <?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<div id="main">
	<div id="navigation">
	<?php echo navigation($current_subject,$current_page);?>
	</div>
	<div id="page">
	
	<?php 
	if (!empty($message)) {
		echo "<div class=\"message\">" . htmlentities($message) . "</div>";
	}
	?>
	<?php echo form_errors($errors);?>
		<h2>Edit Page: <?php echo htmlentities($current_page["menu_name"]); ?></h2>
		<form action="edit_page.php?page=<?php echo urlencode($current_page["id"]) ;?>" method="post">
			<p>Menu name
			<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>"/>
			</p>
			<p>Position:
			<?php 
			$subject_id = subjects_id($current_page["id"]);
			$pages_set = find_number_of_pages_for_subject_by_subjects_id($subject_id);
			?>
			<select name="position">
			<?php 
			
			for ($count = 1; $count <= ($pages_set) ; $count++) { 
				echo " <option value=\"{$count}\">{$count}</option>";
				if ($current_page["position"] == $count) {
				echo " selected";
				}
				echo ">{$count}</option>";
			}
			 ?>
			</select>
			</p>
			<p>Visible
			<input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0){echo "checked";} ?>>No &nbsp;
			<input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1){echo "checked";} ?>> Yes
			</p>
			<textarea name="content" rows="10" cols=50 ><?php echo htmlentities($current_page["content"]); ?></textarea>		
			<br>
			<input type="submit" name="submit" value="Update Page">
		</form>
		<br>
		<a href="manage_content.php?page=<?php echo urlencode($current_page["id"]);?>">Cancel</a>
		&nbsp;
		&nbsp;
		<a href="delete_page.php?page=<?php echo urlencode($current_page["id"]) ?>" oncick="return confirm('Are you sure?');">Delete page</a>
	
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	
   