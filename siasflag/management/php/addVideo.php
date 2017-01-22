<?php
	/*添加视频*/
	include 'conn.php';
	mysql_query('set names utf8');
	$name = $_POST['vedioName'];
	$url = $_POST['vedioUrl'];
	$time = date('Y-m-d');
	
	$sql = "insert into media (title,url,time) values ('$name','$url','$time')";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo '插入数据失败：'.mysql_error();
	}
	echo $name.'添加成功！';
	?>