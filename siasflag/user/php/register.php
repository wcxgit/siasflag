<?php
/*注册验证*/
error_reporting(E_ALL || ~E_NOTICE);
include("DBconnect.php");
date_default_timezone_set("Asia/Shanghai");
$name = $_POST["username"];
$tel = $_POST["tel"];
/*$mail = $_POST["mail"];
*/$pwd = $_POST["pwd"];
$repwd = $_POST["repwd"];
$time = date("Y-m-d h:i:s");
$sex = $_POST['sex'];
if($sex == 1){
	$sex = '男';
}else{
	$sex = '女';
}
/*验证数据是否已存在*/
function chkNmae(){
	$sqlName = "select username from user where username = '{$name}'";
	$resultName = mysql_query($sqlName);
	if(!$resultName){
		echo "用户名失败！";
	}
	if(mysql_num_rows($resultName)>0){
		echo '用户名已被注册!';
		exit();
	}
}
function chkTel(){
	$sqlTel = "select tel from user where tel = '{$tel}'";
	$resultTel = mysql_query($sqlTel);
	if(!$resultTel){
		echo "电话失败！";
	}elseif(mysql_num_rows($resultTel)>0){
		echo '电话号码已被注册!';
		exit();
	}
}
/*function chkMail(){
$sqlMail = "select mail from user where mail = '{$mail}'";
	$resultMail = mysql_query($sqlMail);
	if(!$resultMail){
		echo "邮箱失败！";
	}elseif(mysql_num_rows($resultMail)>0){
		echo "邮箱已被注册!";
		exit();
	}
}*/


//插入数据 
$sql = "insert into user (tel,username,password,flag,creat_time,sex) values ('$tel','$name','$pwd','0','$time','$sex')";
$result = mysql_query($sql);
if(!$result){
	echo "注册失败：".mysql_error();
}else{
	echo '注册成功，即将跳转到首页！';
	exit();
}
mysql_close($con);
?>