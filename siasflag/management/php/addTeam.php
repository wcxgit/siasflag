<?php
	header('content-type:text/html;charset=utf-8');
	include 'conn.php';
	include 'upload.php';

	$rank = $_POST['rank'];//级别
	//上传照片
	$path = '../../imgs/'.$rank;
	$flag = true;//是否检查文件类型
	$maxSize = 209715200;//2M
	$allowExt = array('jpeg','jpg','png','pjpeg');//上传格式
	//获取队员姓名（除去扩展名）
	$files = getFiles();
	foreach ($files as $fileInfo) {
		$name = strtolower(reset(explode('.', $fileInfo['name'])));
		$sql = "insert into team (name,rank) values ('$name','$rank')";
		$result = mysql_query($sql,$con);
		if(!$result){
			echo '发生错误：'.mysql_error();
		}
		uploadFile($fileInfo,$path,$flag,$maxSize,$allowExt);
	}
	/*$fileInfo = $_FILES['img[]'];*/
	/*$name = strtolower(reset(explode('.',$fileInfo['name'])));*/
	//插入姓名和级别
	
	
	
	
?>