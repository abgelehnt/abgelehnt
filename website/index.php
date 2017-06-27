<?php
session_start();
require_once("dbsql.php");
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
			if($_POST == NULL)
				exit;
			else{
				$username = $_POST[ "username" ];	
				$password = $_POST[ "password" ];
				
				$sql = "SELECT * FROM login WHERE username='{$username}' and password='{$password}';";
				
				echo $sql . "<br>";
				$link_result = $link->query($sql);
				
				//var_dump($link_result);
				if($link_result !== NULL){
						echo "hi" . $username;
				}
			
			?>
	
	
			<form action="index.php" method="post">
				<input name="username" type="text" />
				<input name="password" type="password" />
				<input type="submit" value="login" />
			</form>
	
	
		</div>
	<p id="main_id">hello</p>
	
	</body>
</html>

