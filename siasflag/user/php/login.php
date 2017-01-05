<?php
	error_reporting(0);
	include("DBconnect.php");
	session_start();
	unset($_SESSION["Passed"]);
	if(!isset($_SESSION["Passed"])){
		$_SESSION["Passd"] = false;
	}
	if(!isset($_SESSION["super"])){
		$_SESSION["super"] = false;
	}
	/*if(!isset($_SESSION['admin'])){
		$_SESSION['admin']=false;
	}*/
	if($_SESSION["Passed"]== false){
		$name = $_POST["username"];
		$pwd = $_POST["pwd"];
		$flag = $_POST["flag"];
		$sql = "select * from user where username = '$name' && password = '$pwd' && flag = '$flag'";
		$result = mysql_query($sql,$con);
		if(!$result){
			echo mysql_error();
		}
		
		if(empty(mysql_fetch_array($result))){
			echo "用户名或密码错误！";
		}elseif($flag == 0){
			echo "用户登录";
		}else{
			if($name == "super" && $pwd == "super"){
				/*$_SESSION['admin'] = false;*/
				$_SESSION["super"] = true;
				echo "超级管理员";
			}else{
				$_SESSION["super"] = false;
				/*$_SESSION['admin'] = true;*/
				echo "管理员登录";
			}
		}
		$_SESSION["Passed"] = true;
		$_SESSION['user'] = $name;
		/*$_SESSION['admin'] = $name;*/
	}
?>