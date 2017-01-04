<?php
	/*添加视频*/
	include 'conn.php';
	
	$name = $_POST['vedioName'];
	$url = $_POST['vedioUrl'];
	
	$sql = "insert into media (title,url) values ('$name','$url')";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo '插入数据失败：'.mysql_error();
	}
	echo $name.'添加成功！';
	?>