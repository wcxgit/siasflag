<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>申请须知</title>
	<link rel="stylesheet" type="text/css" href="css/come.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="js/jquery.1.7.2.min.js"></script>
	<script type="text/javascript">
		function msg(){
			alert('暂未开放此功能！');
		}
		function log(){
			alert('请先登录！');
		}
	</script>
</head>

<body>
	<a name="top"></a>
	<div id="header">
		<h1><a href="index.html"><img src="images/logo.png"></a></h1>
		<ul>
			<?php 
			if(!$_SESSION["user"]){  
				echo "<ul>
				<li>
					<a href='login.html'>登录</a>
				</li>
				|
				<li>
					<a href='register.html'>注册</a>
				</li>
			</ul>";
		}else{
			echo "<ul>
			<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：".$_SESSION["user"]." </a></li>
			<li><a href='php/loginOut.php'>退出登录</li>
		</ul>";
	}
	?>
</ul>
</div>
<div id="nav">
	<ul>
		<li><a href="index.php">网站首页</a></li>
		<li><a href="about.php">部门介绍</a></li>
		<li><a href="depShow.php">荣誉展示</a></li>
		<li><a href="file.php">文件列表</a></li>
		<li><a href="picture.php">照片墙</a></li>
		<?php
		if ($_SESSION['on-off']) {
			echo '<li>
			<a href="come.php">加入我们</a>
		</li>';
	}else{
		echo '<li>
		<a href="javascript:;" onclick="msg();">加入我们</a>
	</li>';
}
?>
<?php
if(!$_SESSION[user]){
	echo '<li><a href="javascript:;" onclick="log();">留言板</a></li>';
}else{
	echo  '<li><a href="message.php">留言板</a></li>';
}
?>

</ul>
</div>
<div id="con">
	<img src="images/message/message_1.png">
	<div class="left">
		<img src="images/message/message_3.png">
		<div class="line">
			<p><a href="come.php">申请须知 >></a></p>
			<p><a href="application.php">申请加入 >></a></p>
		</div>
	</div>
	<div class="centre"></div>
	<div class="right">
		<pre>加入要求：</pre>
		<div class="yq">
			<span>西亚斯国旗护卫队作为我校唯一一支半军事化的学生团体，肩负着非同寻常的任务。为了圆满完成每一次升旗、仪仗和校园活动，我队必须进行一定程度的训练，以达到与我队肩负的使命相对应的实力。因我队执行任务的复杂性，所需一定的人员来完成人员的继承。<br /> 
				一、又值一年一度新生季，我队现对大一新生以及大二学生进行招新。具体要求如下：
				<p>1、态度积极端正者优先；</p>
				<p>2、不怕吃苦，有毅力坚持训练；</p>
				<p>3、身高:&nbsp;&nbsp;(1)男生1米72;&nbsp;&nbsp;(2)女生1米65以上；</p> 
				<p>4、有较好的身体素质、运动能力。</p></span>
				<span>二、招新地点：<br />
					<p>1、地点一；</p>
					<p>2、地点二；</p>
					<p>3、地点三；</p>
					<p>4、地点四。</p></span>
					<p>联系方式：&nbsp;&nbsp;qq群：123123123123&nbsp;&nbsp;微博：西亚斯国旗护卫队&nbsp;&nbsp; 手机：123123123<br /> 你也可通过本站进行申请：</p><br /></span>
				</div>
			</div>   
		</div>
		<div id="footer">
	<div class="contact">
		电话：010-12348888　传真：010-88666666　客服电话：400-0809-560
		<br />
		西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号
	</div>
</div>
		</body>
		</html>
