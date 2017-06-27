<?php
if($_POST == NULL)
	login_table();
else{
	$username = $_POST[ "username" ];	
	$password = $_POST[ "password" ];
	
	$sql = "SELECT * FROM login WHERE username='{$username}' and password='{$password}';";
	
	//echo $sql . "<br>";
	$link_result = $link->query($sql);
	
	//var_dump($link_result);
	if($link_result !== NULL){
			echo "hi," . $username;
	}else{
			login_table();
			echo 'inclrrect username or password.';
	}
}

