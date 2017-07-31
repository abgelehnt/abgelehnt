<?php

function echoo($string){
	for($i = 0; $i < count($string); $i++){
		for($j = 0; $j < count($string);$j++){
			echo $string[$i][$j] . ' | ';
		}
	echo "\n--------------------------------------------\n";
	}
}
