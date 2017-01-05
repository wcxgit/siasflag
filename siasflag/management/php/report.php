<?php
	/*通讯管理*/
	include 'conn.php';
	mysql_query('set names utf8');
	$qq = $_POST['qq'];
	$weibo = $_POST['weibo'];
	$wechat = $_POST['wechat'];
	
	$sql = "insert report (qq,weibo,wechat) values ('$qq','$weibo','$wechat')";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo "添加失败：".mysql_error();
	}else{
		echo '添加成功!';
	}
	
	
	?>