<?php
	header('content-type:text/html;charset=utf-8');
	include 'conn.php';
	include 'upload.php';
	
	//插入姓名和级别
	$name = $_POST['username'];
	$rank = $_POST['rank'];
		
	$sql = "insert into team (name,rank) values ('$name','$rank')";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo mysql_error();
	}
	
	//上传照片
	$fileInfo = $_FILES['img'];
	$path = '../../imgs/'.$rank;
	$flag = true;//是否检查文件类型
	$maxSize = 2097152;//2M
	$allowExt = array('jpeg','jpg','png','pjpeg');//上传格式
	getFiles();
	uploadFile($fileInfo,$path,$flag,$maxSize,$allowExt);
?>