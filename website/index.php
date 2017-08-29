<?php
session_start();

//Uses Thinkphp
//require './thinkphp/index.php';


require_once("./php_files/dbsql.php");
require_once("./php_files/table.php");
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
				require_once("./php_files/login.php");
			?>

		</div>

		<?php
		require_once( "./php_files/show_msg.php" );
		?>		


	</body>
</html>

