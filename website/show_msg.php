<?php

$sql = "SELECT * FROM msg order by time desc;";
$link_result = $link->query( $sql );


while(true){
	$row = $sql_result->fetcharray(MYSQLI_ASSOC);
	if($row == null)
		break;
	$rows[] = $row;
}

var_dump($rows);
foreach($i = 0; $i < count($rows); $i++){


	//	<p>username:</p><?php	//echo $row	?>




}





