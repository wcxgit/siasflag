<?php 
	header('content-type:text/html;charset=utf-8');
	include 'conn.php';
	mysql_query('set names utf8');
	$name = $_POST['username'];
	$pwd = $_POST['pwd'];
	echo "123";
	//验证用户是否已存在
	$sqlName = "select * from user where username = '{$name}'& flag = 1";
	$resutlName = mysql_query($sqlName);
	if(!$resutlName){
		echo "验证失败！".mysql_error();
		exit();
	}
	$row = mysql_fetch_row();
	if(!empty($row)){
		echo "管理员已存在！";
		exit();
	}

	$sql = "insert user (username,password) vlaues ('{$name}','{$pwd}')";
	$result = mysql_query($sql);
	if(!$result){
		echo "添加管理员失败：".mysql_error();
		exit();
	}else{
		echo "添加管理员成功！";
	}

 ?>