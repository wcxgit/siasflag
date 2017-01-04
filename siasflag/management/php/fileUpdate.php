<?php
		/*文件上传*/
		header('content-type:text/html;charset=utf-8');
		include 'conn.php';
		include 'upload.php';
		mysql_query('set names utf8');
		$time = date('Y-m-d');
		$path = '../../files';
		$flag = false;
		$maxSize = 209715200;
		$allowExt = array('txt','doc','docx','ppt','xlsx');//上传格式
		
		$files = getFiles();
		echo "<fieldset>
				<legend>文件上传</legend>
				<table width='95%' border='0' cellpadding='2' cellspacing='0' align='center'>";
	foreach ($files as $fileInfo) {
		uploadFile($fileInfo,$path,$flag,$maxSize,$allowExt);
		$fileInfo_name =  $fileInfo['name'];
		/*$fileInfo_name = iconv('gb2312', 'utf-8', $fileInfo['name']);*/
		$file_path = $path.'/'.$fileInfo_name;
		$name = strtolower(reset(explode('.', $fileInfo_name)));
		$sql = "insert into file (name,url,time) values ('$name','$file_path','$time')";
		$result = mysql_query($sql,$con);
		if(!$result){
			echo '发生错误：'.mysql_error();
		}
		
	}
	
	echo "</table>
			</fieldset>";
	echo "<a href='javascript:;' onclick='javascript:history.go(-1);'>点此返回上页继续添加！</href>";
	
		
	?>