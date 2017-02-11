<?php 
header('content-type:text/html;charset=utf-8');
include 'conn.php';
mysql_query('set names utf8');
$name = $_POST['username'];
$pwd = $_POST['pwd'];
$time = date("Y-m-d");
	//验证用户是否已存在
$sqlName = "select * from user where username = '{$name}'&& flag = 1";
$resutlName = mysql_query($sqlName);
if(!$resutlName){
	echo "验证失败！".mysql_error();
	exit();
}
$row = mysql_num_rows($resutlName);
if($row > 0){
	echo "管理员已存在！";
	exit();
}else{

	$sql = "insert user (username,password,flag,creat_time) values ('{$name}','{$pwd}',1,'{$time}')";
	$result = mysql_query($sql);
	if(!$result){
		echo "添加管理员失败：".mysql_error();
		exit();
	}else{
		echo "添加管理员成功！";
	}
}


?>