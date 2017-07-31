<?php

require_once("./printstring.php");
//echoo();

//$mine_qua 雷的数量
echo "请输入雷的数量";
$mine_qua = trim(fgets(STDIN));
echo "雷的数量为$mine_qua\n";

//$x_scan 用户选择雷横坐标
echo "请输入横坐标";
$x_scan = trim(fgets(STDIN));


//$y_scan 用户选择雷纵坐标
echo "请输入纵坐标";
$y_scan = trim(fgets(STDIN));



//初始化$is_mine
$is_mine[][] = 0;
for($i = 0; $i < $mine_qua; $i++){
	for($j = 0; $j < $mine_qua; $j++){
		$is_mine[$i][$j] = 0;
	}
}


//给$is_mine赋值
while($mine_qua > 0){
	//下雷
	$rand1 = rand(0,count($mine_qua));
	$rand2 = rand(0,count($mine_qua));
	$is_mine[$rand1][$rand2] = 9;
	$mine_qua--;

	//禁止边缘处放雷
//	if($rand1 = 0 or $rand1 = 9 or $rand2 = 0 or $rand2 = 9){
//		$mine_qua++;
//		continue;
//	}

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
for($i = 0; $i < count($show_mine); $i++){
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

		default:
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			break;

	}
}while($cnt_sch);
	
	var_dump($show_mine);
	exit;


//显示雷
for($k = 0; $k < 9; $k++){
	for($m = 0;$m < 9; $m++){
		echo $show_mine[$k][$m] . " | ";
	}
	echo "-------------/\n/";
}


