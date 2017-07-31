<?php

//load messages
$sql = "SELECT * FROM msg order by time desc;";
$link_result = $link->query( $sql );
while(true){
	$row = $link_result->fetch_array(MYSQLI_ASSOC);
	if($row == null)
		break;
	$rows[] = $row;
}

//show messages
for($i = 0; $i < count($rows); $i++){

	echo 'username<p style="color:red;">' . $rows[ $i ][ "username" ] . "</p> ";
	echo 'msg<p style="color:red;">' . $rows[ $i ][ "msg" ] . "</p> ";
	echo 'time<p style="color:red;">' . $rows[ $i ][ "time" ] . "</p>";
	echo "<hr>";

}





