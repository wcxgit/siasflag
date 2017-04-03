<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
	error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>照片墙</title>
		<link rel="stylesheet" type="text/css" href="css/picture.css">
		<link rel="stylesheet" type="text/css" href="css/cell.css">
		<link rel="stylesheet" type="text/css" href="css/common.css">
		<link rel="shortcut icon" href="images/title_icon.ico" />
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script src="js/picture.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<a name="top"></a>
		<div id="header">
			<h1>
			<a href="index.html">
				<img src="images/logo.png">
			</a></h1>
			<ul>
				<?php
				if (!$_SESSION["user"]) {
					echo "<ul>
<li>
<a href='login.html'>登录</a>
</li>
|
<li>
<a href='register.html'>注册</a>
</li>
</ul>";
				} else {
					echo "<ul>
<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：" . $_SESSION["user"] . " </a></li>
<li><a href='php/loginOut.php'>退出登录</li>
</ul>";
				}
				?>
			</ul>
		</div>
		<div id="nav">
			<ul>
				<li>
					<a href="../index.php">
						网站首页
					</a>
				</li>
				<li>
					<a href="about.php">
						部门介绍
					</a>
				</li>
				<li>
					<a href="depShow.php">
						荣誉展示
					</a>
				</li>
				<li>
					<a href="file.php">
						文件列表
					</a>
				</li>
				<li>
					<a href="picture.php">
						照片墙
					</a>
				</li>
				<?php
				if ($_SESSION['on-off']) {
					echo '<li>
<a href="come.php">加入我们</a>
</li>';
				} else {
					echo '<li>
<a href="javascript:;" onclick="msg();">加入我们</a>
</li>';
				}
				?>
				<?php
				if (!$_SESSION[user]) {
					echo '<li><a href="javascript:;" onclick="log();">留言板</a></li>';
				} else {
					echo '<li><a href="message.php">留言板</a></li>';
				}
				?>
			</ul>
		</div>
		<div id="con">
			<img src="images/message/message_1.png">
			<div class="left">
				<img src="images/message/message_3.png">
				<div class="line">
					<p>
						<a href="inTeam.php">
							在队人员 >>
						</a>
					</p>
					<p>
						<a href="picture.php">
							照片墙 >>
						</a>
					</p>
				</div>
			</div>
			<div class="centre"></div>
			<div class="right">
				<div class="list">
					<ul>
						<li class="bg">
							<a href="picture.php" class="active"><?php echo date('Y') - 3; ?>级</a>
						</li>
						<li>
							<a href="picterSecond.php"><?php echo date('Y') - 2; ?>级</a>
						</li>
						<li>
							<a href="picterThird.php"><?php echo date('Y')-1; ?>级</a>
						</li>
					</ul>
				</div>
				<div class="yq">
					
				</div>
				<div id="page">
					<ul>
						<li>
							<a href="#">
								<
							</a>
						</li>
						<li>
							<a href="#">
								1
							</a>
						</li>
						<li>
							<a href="#">
								2
							</a>
						</li>
						<li>
							<a href="#">
								3
							</a>
						</li>
						<li>
							<a href="#">
								4
							</a>
						</li>
						<li>
							<a href="#">
								5
							</a>
						</li>
						<li>
							<a href="#">
								6
							</a>
						</li>
						<li>
							<a href="#">
								>
							</a>
						</li>
					</ul>
				</div>

			</div>
		</div>
		<div id="footer">
			<div class="contact">
				西亚斯国旗护卫队<br />
		技术支持：<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 763396567@qq.com <br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如遇问题，欢迎反馈
			</div>
		</div>
	</body>
</html>
