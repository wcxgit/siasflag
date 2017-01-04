<?php
	error_reporting(0);
	header("Content-Type:text/html;charset=utf-8");
	mysql_query('set charset set utf8');
	mysql_query("set names utf8");
	$con = mysql_connect("localhost","root","root");
	if(!$con){
		echo "连接失败：".mysql_error();
	}
	mysql_select_db("siasflag",$con);
?>