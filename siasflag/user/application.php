<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>申请加入</title>
	<link rel="stylesheet" type="text/css" href="css/application.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="js/jquery.1.7.2.min.js"></script>
	<script src="js/application.js"></script>
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
				<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：<span id='username'>".$_SESSION["user"]." </span></a></li>
				<li><a href='php/loginOut.php'>退出登录</li>
			</ul>";
		}
		?>	 </ul>
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
			<pre>申请表：</pre>
			<p><label for="">姓名：</label><input type="text" name="" id="name" value="" required="" onfocus="hide();"/>	</p>
			<p><label for="">性别：</label><input type="text" name="" id="sex" value="" readonly="" required="" onfocus="hide();"/></p>
			<p><label for="">年龄：</label><input type="text" name="" id="age" value="" required="" onfocus="hide();" /><span id="errAge" style="color: red" ></span></p>
			<p><label for="">QQ：</label><input type="text" name="" id="qq" value="" required="" onfocus="hide();"/></p>
			<p><label for="">手机号：</label><input type="text" name="" id="tel" value="" required="" onfocus="hide();"/></p>
			<p><label for="">兴趣、爱好：</label><textarea name="" rows="3" cols="50" id="hospital" required="" onfocus="hide();"></textarea></p>
			<p><label for="">自我评价：</label><textarea name="" rows="3" cols="50" id="evaluate" required="" onfocus="hide();"></textarea></p>
			<p><label for="">加入理由：</label><textarea name="" rows="3" cols="50" id="reason" required="" onfocus="hide();"></textarea></p>
			<p><span id="msg" style="color: red"></span></p>
			<p>
				<input type="reset" name="reset" value="重置" class="btn" onclick="reset();" />
				<input type="submit" name="Submit" value="提交" class="btn" onclick="submit();" />
			</p>
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
