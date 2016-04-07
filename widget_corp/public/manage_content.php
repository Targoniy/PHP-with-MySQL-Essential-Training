<?php require_once("../includes/session.php"); ?><?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<?php find_selected_page(); ?>
<div id="main">
	<div id="navigation">
	<?php echo navigation($current_subject,$current_page);?>
	<br>
	<a href="new_subject.php">+ Add a subject</a>
	</div>
	<div id="page">
		<?php echo message(); ?>
		<?php 
			if ($current_subject) { ?>
				<h2>Manage Subject</h2>
				<?php echo "Menu name: " . htmlentities($current_subject["menu_name"]) . "<br>";?>
				Position: <?php echo ($current_subject["position"]) . "<br>";?>
				Visible: <?php echo ($current_subject["visible"]) == 1 ? "yes" : "no" . "<br>";?><br><br><br>
				<a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]);?>">Edit Subject</a><br><br><br>
				<h2>Pages in this subjects: </h2><br>
				<?php echo(navigation_page_on_subject($current_subject)) ?><br><br><br>
				<?php 
			
				$_SESSION["pages"] = find_number_of_pages_for_subject($current_subject);
				$_SESSION["current_subject_id"] = $current_subject["id"];
			
				?>
				<a href="new_page.php">
				<h4>+Add a new page to this subject</h2></a>
				<?php 
			} elseif ($current_page) { ?>
				<h2>Manage Page</h2>Menu name:
				<?php echo htmlentities($current_page["menu_name"]) . "<br>";?>
				Position: <?php echo ($current_page["position"]) . "<br>";?>
				Visible: <?php echo ($current_page["visible"]) == 1 ? "yes" : "no";?><br>
				Content:<br>
				<?php  ?>
				<div class="view-content">  <?php echo htmlentities($current_page["content"]) . "<br>";?> </div>
				<a href="edit_page.php?page=<?php echo urlencode($current_page["id"]);?>">
				<h4>Edit page</h4></a>
			<?php 
			} else{
				echo "Please select a subject or a page.";
			}
		 ?>
		 		
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	   