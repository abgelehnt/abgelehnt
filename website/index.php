<?php
session_start();


require_once("dbsql.php");
require_once("table.php");
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>chi</title>
	</head>
	
	
	<body>
		<div class="main_div">
	
			<?php
				require_once("login.php");
			?>

		</div>

		<?php
		require_once( "show_msg.php" );
		?>		


	</body>
</html>

