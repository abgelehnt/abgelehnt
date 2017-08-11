<?php
//2017.7.5创建


require_once("./printstring.php");
//echoo();




//$mine_qua 雷的数量
//echo "请输入雷的数量";
$mine_qua = 9;//trim(fgets(STDIN));
echo "雷的数量为$mine_qua\n\n";

//$x_scan 用户选择雷横坐标
//echo "请输入横坐标";
$x_scan = 9;//trim(fgets(STDIN));
echo "横坐标为$x_scan\n\n";

//$y_scan 用户选择雷纵坐标
//echo "请输入纵坐标";
$y_scan = 9;//trim(fgets(STDIN));
echo "纵坐标为$y_scan\n\n";




//初始化$is_mine
$is_mine[][] = 0;
for($i = 0; $i < 9; $i++){
	for($j = 0; $j < 9; $j++){
		$is_mine[$i][$j] = 0;
	}
}




//给$is_mine赋值
while($mine_qua > 0){

	$rand1 = rand(0,8);
	$rand2 = rand(0,8);


	//检测正在下雷的位置是否有雷
	if($is_mine[$rand1][$rand2] === 9)
		continue;


	//下雷
	$is_mine[$rand1][$rand2] = 9;
	$mine_qua--;

	//禁止边缘处放雷
	if($rand1 == 0 or $rand1 == 8 or $rand2 == 0 or $rand2 == 8){
		$mine_qua++;
		continue;
	}


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




//显示雷的代码并初始化$show_mine
for($i = 0; $i < 9; $i++){
	for($j = 0; $j < 9; $j++){
		echo $show_mine[$i][$j] = "@" . " ";
	}
	echo "\n";
}




//@未知; 0~8周围雷的数量;  >=9是雷
switch($is_mine[$x_scan][$y_scan]){

	case 9 or 10 or 11:
		if($shw_sch){
			echo "你输了";
			exit;
		}
		break;


	case 1 or 2 or 3 or 4 or 5 or 6 or 7 or 8 or 9:
		$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		break;


	case 0:
		//是否继续搜索附近的雷
		$shw_sch == false;

		//如果为空 则搜寻四周的雷

		//决定是否继续循环搜寻四周的雷
		$cnt_sch = true;
		while($cnt_sch){
		$cnt_sch = false;
		if($is_mine[$x_scan-1][$y_scan-1] == 0){
			$x_scan--;
			$y_scan--;
			$cnt_sch = true;
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
			continue;
		}
		if($is_mine[$x_scan-1][$y_scan] == 0){
			$x_scan--;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_scan-1][$y_scan+1] == 0){
			$x_scan--;
			$y_scan++;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_scan][$y_scan-1] == 0){
			$y_scan--;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_scan][$y_scan+1] == 0){
			$y_scan++;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_sca+11][$y_scan-1] == 0){
			$x_scan++;
			$y_scan--;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_scan-1][$y_scan] == 0){
			$x_scan--;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		if($is_mine[$x_scan-1][$y_scan+1] == 0){
			$x_scan--;
			$y_scan++;
			$cnt_sch = true;
			continue;
		}else{
			$show_mine[$x_scan][$y_scan] = $is_mine[$x_scan][$y_scan];
		}
		}
		break;

	default:
		echo "Programme ERROR.";
}




//显示雷
for($k = 0; $k < 9; $k++){
	for($m = 0;$m < 9; $m++){
		echo $show_mine[$k][$m] . " | ";
	}
	echo "\n-------------\n";
}


