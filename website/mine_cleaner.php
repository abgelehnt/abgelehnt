<?php
//$mine_qua 雷的数量
//$x_scan 用户选择雷横坐标
//$y_scan 用户选择雷纵坐标

//初始化$is_mine
for($i = 0; $i < count($is_mine)); $i++{
	for($j = 0; $j < count($is_mine[$i]); $j++){
		$is_mine[$i][$j] = 0;
	}
}


//给$is_mine赋值
while($mine_qua > 0){
	//下雷
	$rand1 = rand(0,count($is_mine));
	$rand2 = rand(0,count($is_mine));
	$is_mine[$rand1][$rand2] = 9;
	$mine_qua--;

	//相邻地区显示数字
	$is_mine[$rand1-1][$rand2-1]++;
	$is_mine[$rand1-1][$rand2]++;
	$is_mine[$rand1-1][$rand2+1]++;
	$is_mine[$rand1][$rand2-1]++;
	$is_mine[$rand1][$rand2+1]++;
	$is_mine[$rand1+1][$rand2-1]++;
	$is_mine[$rand1+1][$rand2]++;
	$is_mine[$rand1+1][$rand2+1]++;
}


//显示雷的代码
for($i = 0; $i < count($show_mine)); $i++{
	for($j = 0; $j < count($show_mine[$i]); $j++){
		$show_mine[$i][$j] = "@";
	}
}

//@未知; 0~8周围雷的数量;  9是雷
$shw_sch = true;
do{
	switch($is_mine[$x_scan][$y_scan]){
		
		case 9:
			if($shw_sch){
				echo "你输了";
				exit;
			}
			break;
		
		case 1~8:
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			break;

		case 0:
			$shw_sch == false;

			//如果为空 则搜寻四周的雷
			if($is_mine[$x_scan-1][$y_scan-1] == 0){
				$x_scan--;
				$y_scan--;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan-1][$y_scan] == 0){
				$x_scan--;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan-1][$y_scan+1] == 0){
				$x_scan--;
				$y_scan++;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan][$y_scan-1] == 0){
				$y_scan--;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan][$y_scan+1] == 0){
				$y_scan++;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_sca+11][$y_scan-1] == 0){
				$x_scan++;
				$y_scan--;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan-1][$y_scan] == 0){
				$x_scan--;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}
			if($is_mine[$x_scan-1][$y_scan+1] == 0){
				$x_scan--;
				$y_scan++;
				$cnt_sch == true;	
			}else{
				$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			}

			break;
	}
}while($cnt_sch)

//显示雷
for($i = 0; $i < count($show_mine); $i++){
	for($j = 0; $j < count($show_time[$i]); $j++){
		echo $show_mine[$i][$j] . " | ";
	}
	echo "----------------<br>"'
}





