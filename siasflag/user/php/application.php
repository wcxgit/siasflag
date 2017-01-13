<?php
error_reporting(0);
include 'DBconnect.php';

$id = $_POST['id'];

if($id == 1){
	//获取需要的填充数据
	$name = $_POST['username'];
	$sql = "select * from user where username = '$name'";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询出错：'.mysql_error();
	}
	$row = mysql_fetch_row($result);
	$array = array('username' => $row[3],'sex'=> $row[7],'tel'=>$row[1] );
	$json = json_encode($array);
	echo $json;
}elseif($id ==2 ){
	//申请数据写入
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$qq = $_POST['qq'];
	$tel = $_POST['tel'];
	$hospital = $_POST['hospital'];
	$evaluate = $_POST['evaluate'];
	$reason = $_POST['reason'];
	$time = date('Y-m-d');
	$sql = "insert joinus (name,sex,age,qq,tel,hospital,evaluate,reason,time) values ('$name','$sex','$age','$qq','$tel','$hospital','$evaluate','$reason','$time')";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo '申请失败！'.mysql_error();
	}else{
		echo '申请成功！';
	}


}




?>