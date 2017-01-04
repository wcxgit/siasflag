<?php
	header('content-type:text/html;charset=utf-8');
	include 'conn.php';
	include 'upload.php';

	mysql_query('set names utf8');
	$rank = $_POST['rank'];//级别
	$time = date('Y-m-d');
	//上传照片
	$path = '../../imgs/'.$rank;
	$flag = true;//是否检查文件类型
	$maxSize = 209715200;//2M
	$allowExt = array('jpeg','jpg','png','pjpeg');//上传格式
	//获取队员姓名（除去扩展名）
	$files = getFiles();
	echo "<fieldset>
				<legend>添加在队人员</legend>
				<table width='95%' border='0' cellpadding='2' cellspacing='0' align='center'>";
	foreach ($files as $fileInfo) {
		$fileInfo_name =  $fileInfo['name'];
		$photo_path = $path.'/'.$fileInfo_name;
		$name = strtolower(reset(explode('.', $fileInfo_name)));
		$sql = "insert into team (name,rank,photo,create_time) values ('$name','$rank','$photo_path','$time')";
		$result = mysql_query($sql,$con);
		if(!$result){
			echo '发生错误：'.mysql_error();
		}
		uploadFile($fileInfo,$path,$flag,$maxSize,$allowExt);
	}
	
	echo "</table>
			</fieldset>";
	echo "<a href='javascript:;' onclick='javascript:history.go(-1);'>点此返回上页继续添加！</href>";
	
	
	
?>