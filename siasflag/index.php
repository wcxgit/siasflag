<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="user/css/index.css">
	<link rel="stylesheet" type="text/css" href="user/css/common.css">
	<script src="user/js/jquery.1.7.2.min.js"></script>
	<script src="user/js/jquery.img_silder.js"></script>
	<script src="user/js/index.js"></script>

	<title>西亚斯国旗护卫队</title>

</head>

<body>
	<a name="top"></a>
	<div id="header">
		<h1>
			<a href="index.php">
				<img src="user/images/logo.png">
			</a></h1>
			<?php
			if (!$_SESSION['user']) {
				echo "<ul>
				<li>
					<a href='user/login.html'>登录</a>
				</li>
				|
				<li>
					<a href='user/register.html'>注册</a>
				</li>
			</ul>";
		} else {
			$id = $_SESSION['user'];
			echo "<ul>
			<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：" . $_SESSION["user"] . " </a></li>
			<li><a href='user/php/loginOut.php'>退出登录</li>
		</ul>";
	}
	?>
</div>
<div id="nav">
	<ul>
		<li>
			<a href="index.php">
				网站首页
			</a>
		</li>
		<li>
			<a href="user/about.php">
				部门介绍
			</a>
		</li>
		<li>
			<a href="user/depShow.php">
				荣誉展示
			</a>
		</li>
		<li>
			<a href="user/file.php">
				文件列表
			</a>
		</li>
		<li>
			<a href="user/picture.php">
				照片墙
			</a>
		</li>
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
<div class="silder" id="silder">
	<ul class="silder_list" id="silder_list">
		<li>
			<img src="user/images/index/banner_a.jpg">		</li>
		<li>
			<img src="user/images/index/banner_b.jpg">		</li>
		<!-- <li>
			<img src="images/index/banner_c.jpg">
		</li> -->
	</ul>
</div>
<div id="con">
	<div class="left">
		<h3>校 园 活 动 <a href="user/file.php" style="float: right;">更多>>></a></h3>
		<ul id="xiaoyuan">
			
		</ul>
	</div>
	<div class="right">
		<img src="user/images/index/right_pc.jpg">
		<div class="sj">
			<h3>队 内 纪 事<a href="user/file.php" style="float: right;">更多>>></h3>
			<ul id="duinei">
				
			</ul>
		</div>
	</div>
</div>
<div id="subnav">
	<h3>友 情 链 接</h3>
	<dl>
		<dt>
			<img src="user/images/index/link_1.jpg" style="margin-bottom: 10px";>
		</dt>
		<dd>
			<a href="http://www.wust.edu.cn/" style="margin-left: 18px;">
				武汉科技大学
			</a>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="user/images/index/link_2.jpg">
		</dt>
		<dd>
			<a href="http://www.nkdgh.cn">
				内蒙古科技大学国旗护卫队
			</a>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="user/images/index/link_3.jpg">
		</dt>
		<dd>
			<a href="http://www.jnu.edu.cn">
				暨南大学
			</a>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="user/images/index/link_4.jpg">
		</dt>
		<dd>
			<a href="http://www.sdust.edu.cn">
				山东科技大学
			</a>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="user/images/index/link_5.jpg">
		</dt>
		<dd>
			<a href="http://www.tsinghua.edu.cn">
				清华大学
			</a>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="user/images/index/link_6.jpg">
		</dt>
		<dd>
			<a href="http://www.hdu.edu.cn">
				杭州电子科技大学
			</a>
		</dd>
	</dl>
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