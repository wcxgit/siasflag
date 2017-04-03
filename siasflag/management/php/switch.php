<?php
/*开关设置*/
include 'conn.php';
session_start();
//查询开关标识
$sql = 'select * from switch ';
$result = mysql_query($sql, $con);
$flag = mysql_result($result, 0);

if ($flag == 0) {
	//如果为0表示关
	$_SESSION['on-off'] = false;
} elseif ($flag == 1) {
	//如果为1表示开
	$_SESSION['on-off'] = true;
}
//接收传过来的参数
$of = $_POST['of'];
if ($of == 'off') {
	//点击关闭单选按钮
	$sql = 'update switch set flag = 0';
	$result = mysql_query($sql, $con);
	if(!$result){
		echo '设置失败：'.mysql_error();
		exit();
	}
	echo "关闭成功！";
	$_SESSION['on-off'] = false;
} else {
	//点击开启单选按钮
	$sql = 'update switch set flag = 1';
	$result = mysql_query($sql, $con);
	if(!$result){
		echo '设置失败：'.mysql_error();
		exit();
	}
	echo "开启成功！";
	$_SESSION['on-off'] = true;
}
?>