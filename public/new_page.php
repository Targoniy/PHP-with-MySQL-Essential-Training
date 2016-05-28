<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<?php find_selected_page(); ?>
<div id="main">
	<div id="navigation">
	<?php echo navigation($current_subject,$current_page);?>
	</div>
	<div id="page">
	<?php echo message(); ?>
	<?php $errors = errors();
	$current_subject_id = (int)current_subject_id();
	$pages = subject_pages();
	?>
	<?php echo form_errors($errors);?>
		<h2>Create Page</h2>
		<form action="create_page.php" method="post" >
			<p>Menu name
			<input type="text" name="menu_name" value=""/>
			<input type="text" hidden="" name="subject_id" value="<?php echo $current_subject_id ?>"/>
			</p> 
			<p>Position:
			<select name="position">
			<?php 
			for ($count = 1; $count <= ($pages + 1) ; $count++) { echo "<option value=\"{$count}\">{$count}</option>";}
			 ?>
			</select>
			</p>
			<p>Visible
			<input type="radio" name="visible" value="0">No &nbsp;
			<input type="radio" name="visible" value="1"> Yes
			</p>
            <textarea name="content" rows="10" cols=50></textarea>		
			<br><input type="submit" name="submit" value="Create Page">
		</br>		</form>
		<br>
		<a href="manage_content.php">Cancel</a>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	
   