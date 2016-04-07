<!DOCTYPE html>
<html>
<head>
	<title>
		False Positive
	</title>
</head>
<body>
	<?php 
		function is_equal($value1, $value2)
		{
			$output = "{$value1} == {$value2}: ";
			if ($value1 == $value2) {
				$output .= "true<br />";
			} else {
				$output .= "false<br />";
			}
			return $output;

		}
		echo is_equal(1, "b");
	?>
	
</form>
	
</body>
</html>