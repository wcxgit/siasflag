<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script src="js/jquery.1.7.2.min.js"></script>
	<script src="js/jquery.img_silder.js"></script>
	<script>$(function() {
		$('#silder').imgSilder({
		s_width: '980', //容器宽度
		s_height: 390, //容器高度
		is_showTit: true, // 是否显示图片标题 false :不显示，true :显示
		s_times: 3000, //设置滚动时间
		css_link: 'css/index.css'
	});
		
	});
	function msg(){
		alert('暂未开放此功能！');
	}

//填充校园活动
$.ajax({
	method:'get',
	url:'php/getFiles.php?id=1&r='+Math.random(),
	success:function(data){
		$('#xiaoyuan').html(data);
	},
	error:function(data){
		alert (data.status);
	}
});
/*填充队内纪事*/
$.ajax({
	method:'get',
	url:'php/getFiles.php?id=2&r='+Math.random(),
	success:function(data){
		$('#duinei').html(data);
	},
	error:function(data){
		alert (data.status);
	}
});

</script>

<title>西亚斯国旗护卫队</title>
<link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body>
	<a name="top"></a>
	<div id="header">
		<h1>
			<a href="index.html">
				<img src="images/logo.png">
			</a></h1>
			<?php
			if (!$_SESSION['user']) {
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
			$id = $_SESSION['user'];
			echo "<ul>
			<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：" . $_SESSION["user"] . " </a></li>
			<li><a href='php/loginOut.php'>退出登录</li>
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
	}else{
		echo '<li>
		<a href="javascript:;" onclick="msg();">加入我们</a>
	</li>';
}
?>
<?php
if(!$_SESSION[user]){
	echo '<li><a href="javascript:;">留言板</a></li>';
}else{
	echo  '<li><a href="message.php">留言板</a></li>';
}
?>
</ul>
</div>
<div class="silder" id="silder">
	<ul class="silder_list" id="silder_list">
		<li>
			<img src="images/index/banner_a.jpg">
		</li>
		<li>
			<img src="images/index/banner_b.jpg">
		</li>
		<li>
			<img src="images/index/banner_c.jpg">
		</li>
	</ul>
</div>
<div id="con">
	<div class="left">
		<h3>校 园 活 动 <a href="file.php" style="float: right;">更多>>></a></h3>
		<ul id="xiaoyuan">
					
				</ul>
			</div>
			<div class="right">
				<img src="images/index/right_pc.jpg">
				<div class="sj">
					<h3>队 内 纪 事<a href="file.php" style="float: right;">更多>>></h3>
					<ul id="duinei">
						
					</ul>
				</div>
			</div>
		</div>
		<div id="subnav">
			<h3>友 情 链 接</h3>
			<dl>
				<dt>
					<img src="images/index/link_1.jpg">
				</dt>
				<dd>
					<a href="http://www.wust.edu.cn/">
						武汉科技大学
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<img src="images/index/link_2.jpg">
				</dt>
				<dd>
					<a href="http://www.nkdgh.cn">
						内蒙古科技大学国旗护卫队
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<img src="images/index/link_3.jpg">
				</dt>
				<dd>
					<a href="http://www.jnu.edu.cn">
						暨南大学
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<img src="images/index/link_4.jpg">
				</dt>
				<dd>
					<a href="http://www.sdust.edu.cn">
						山东科技大学
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<img src="images/index/link_5.jpg">
				</dt>
				<dd>
					<a href="http://www.tsinghua.edu.cn">
						清华大学
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<img src="images/index/link_6.jpg">
				</dt>
				<dd>
					<a href="http://www.hdu.edu.cn">
						杭州电子科技大学
					</a>
				</dd>
			</dl>
		</div>
		<div id="footer">
			<p>
				电话：010-12348888　传真：010-88666666　客服电话：400-0809-560
				<br />
				西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号
			</p>
			<h3>
				<a href="#top">
					top
				</a></h3>
				<div class="link">
					<a href="#">
						网站首页
					</a>
					<span>|</span>
					<a href="#">
						部门介绍
					</a>
					<span>|</span>
					<a href="#">
						荣誉展示
					</a>
					<span>|</span>
					<a href="#">
						文件列表
					</a>
					<span>|</span>
					<a href="#">
						照片墙
					</a>
					<span>|</span>
					<a href="#">
						在队人员
					</a>
					<span>|</span>
					<a href="#">
						留言板
					</a>
					<span>|</span>
					<a href="#">
						关于我们
					</a>
				</div>
			</div>
		</body>

		</html>