<?php
	//数据库连接
	header("Content-Type:text/html;charset=utf-8");
	
	$con = mysql_connect("localhost","root","root");
	if(!$con){
		echo "数据库连接失败：".mysql_error();
	}
	/*echo "数据库连接成功！";*/
	mysql_query("set names utf8");
	mysql_select_db("siasflag",$con);
?>