<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <?php session_start();
	error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>西亚斯国旗护卫队后台管理</title>
</head>
<?php 
    if($_SESSION['super'] || $_SESSION['admin']){
 ?>
<frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="top.html" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame"/>
    <frameset cols="213,*" frameborder="no" border="0" framespacing="0">
        <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame"/>
        <frame src="main.html" name="mainFrame" id="mainFrame" title="mainFrame"/>
    </frameset>
</frameset>
<noframes></noframes>
<?php }else{
    echo "<div align='center' style='width:50%;height:50%;margin:20% auto;color:red;font-size:24px;'>你没有权限访问！</div>";
    } ?>
    <body>

    </body>
</html>
