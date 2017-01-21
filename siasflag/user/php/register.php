<?php
/*注册验证*/
error_reporting(E_ALL || ~E_NOTICE);
include("DBconnect.php");
date_default_timezone_set("Asia/Shanghai");
$name = $_POST["username"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$pwd = $_POST["pwd"];
$repwd = $_POST["repwd"];
$time = date("Y-m-d h:i:s");
$sex = $_POST['sex'];
if($sex == 1){
	$sex = '男';
}else{
	$sex = '女';
}
echo $sex;
		//插入数据 
$sql = "insert into user (tel,mail,username,password,flag,creat_time,sex) values ('$tel','$mail','$name','$pwd','0','$time','$sex')";
$result = mysql_query($sql);
if(!$result){
	echo "注册失败：".mysql_error();
}else{
	echo "<a href='../login.html'>注册成功,点击返回登录</a>";
}
mysql_close($con);
?>