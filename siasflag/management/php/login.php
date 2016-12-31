<?php
	error_reporting(0);
	include("conn.php");
	session_start();
	if(!isset($_SESSION["Passed"])){
		$_SESSION["Passed"] = false;
	}
	if($_SESSION["Passed"] == false){
		$name = $_POST["username"];
		$pwd = $_POST["pwd"];
		$sql = "select * from user where username = ".$name."&&password=".$pwd."&&flag= 1";
		$result = mysql_query($sql,$con);
		if(empty(mysql_fetch_array($result)){
			echo "用户名或密码错误！";
		}else{
			echo "登录成功！";
			$_SESSIOON["user"] = $name;
			$_SESSION["Passed"] = true;
		}
	}
	
	mysql_close($con);
	
?>