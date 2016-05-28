<?php require_once("../includes/session.php"); ?><?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?> 
<?php find_selected_page(true); ?>
<div id="main">
	<div id="navigation">
	<p><strong><a href="admin.php">Admin Menu</a></strong></p>
	<?php echo public_navigation($current_subject,$current_page);?>
	<br>
	</div>  
	<div id="page">
 		<?php 
			if($current_page) { ?>
		   	 <h2><?php echo htmlentities($current_page["menu_name"]) . "<br>";?></h2>
		   	 <?php echo nl2br((htmlentities($current_page["content"]))) . "<br>"; ?> 
			<?php 
			} else{?>
			<p>Welcome!</p>
			<?php } ?>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>	   