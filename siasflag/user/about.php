<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/about.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="shortcut icon" href="images/title_icon.ico" />
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/easySlider.js"></script>
	<script src="js/about.js"></script>

	<title>部门介绍</title>
	
</head>

<body>
	<a name="top"></a>
	<div id="header">
		<h1><a href="index.html"><img src="images/logo.png"></a></h1>
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
</div>
<div id="nav">
	<ul>
		<li><a href="../index.php">网站首页</a></li>
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
	<div class="left">
		<p><img src="images/about_con1.jpg">&nbsp;&nbsp;我们是周一清晨最嘹亮的口号声，我们是西亚斯最整齐的步伐，是国旗台旁最挺拔的身姿。我们在训练中用汗水和坚持激荡青春，在任务中守卫国旗无上荣誉，在行动中传播爱国主义知识和精神。 <br />&nbsp;&nbsp;我们的队训是：光荣在于平淡，艰巨在于漫长，神圣在于责任。我们常说的是：天气不错，适合训练！ <br />&nbsp;&nbsp;我们是西亚斯国旗护卫队。我们以“国旗在肩，铭记使命”威宗旨，以“国旗尊严重于生命”为全队的行动指南，肩负着提高和表现我校全院师生爱国主义热情的神圣使命。</p>
		<div class="xq">
			<h3>详 情 简 介</h3>
			<p>&nbsp;&nbsp;郑州大学西亚斯国际学院国旗护卫队成立于2004年。原属于社团联合会，于2007年归属于共青团郑州大学西亚斯国际学院委员会。在学校及老师的大力支持和关心下，国旗护卫队逐步壮大，逐步成为西亚斯一道靓丽的风景线。在人员方面，由最初的十几人，到现在的正式队员75人,下设办公室、作训部、宣传部等三大部门。每周一大型升旗已按照天安门国旗护卫队的36人标准执行，着07式解放军陆军学员军礼服，56式礼宾枪。并按仪仗队形式负责学校迎宾礼仪活动。在所获荣誉方面，现为郑州南大学城国旗护卫队理事会会长、
				<a href="http://v.youku.com/v_show/id_XNzA5MDg0Njcy.html?from=s1.8-1-1.2#paction">大比武特邀嘉宾</a>，并于2014年代表河南高校到北京参加<a href="http://www.chinaflag.org.cn/KuaiXun/2014102153451514.html">全国高校国旗护卫队交流赛</a>并囊括三项大奖。<br /> &nbsp;&nbsp;
				西亚斯国旗护卫队原为一年制，队员全部从大一新生中挑选，依据他们的军训表现严格筛选。从第六届（即2009级）开始，为了提高执勤水平，避免人才培养断层，改为两年制;从第十届（即2013级）开始，为了增强队伍精神和经验传承，改为三年制。<br /></p>
			</div>
			<div id="ts">
				<p class="a">队徽</p>
				<p class="b">臂章</p>
			</div>
		</div>
		<div class="centre"></div>
		<div class="right">
			<div class="top">
				<h3>视 频 观 看</h3>
				<div id="slider">
					<ul class="slides clearfix" style="margin-bottom: 36px;">
						<li><iframe height=190 width=100% src='http://player.youku.com/embed/XNzY2MDEwNDQ4' frameborder=0 'allowfullscreen'></iframe>
						</li>
						<li><iframe height=190 width=100% src='http://player.youku.com/embed/XMTcyNDQ0NjYxNg==' frameborder=0 'allowfullscreen'></iframe>
						</li>
						<li>
							<iframe height=190 width=100% src='http://player.youku.com/embed/XNzA4ODgwMDI4' frameborder=0 'allowfullscreen'></iframe>
						</li>
					</ul>
						<ul class="pagination" >
							<li class="active"></li>
							<li></li>
							<li></li>
						</ul>
					</div>

				</div>
				<div class="bottom">
					<h3>在 校 职 责</h3>
					<span>&nbsp;&nbsp;西亚斯国旗护卫队作为增强青年大学生民族自信心和自豪感、开展爱国主义教育的中坚力量，是激扬广大青 年学生爱国热情、增强同学们国家荣誉感的重要教育载体，是一个承载神圣使命、深远意义的特殊团体。我们在校职责是：<br />
						<p>1、负责每周一的升旗仪式，全面认真完成国家重要节日、学校重要活动的升降旗仪式及队列表演。</p>
						<p>2、担负校内大型活动的礼仪、值勤任务，承担郑州大学西亚斯国际学院仪仗队任务，参与校园文化活动。</p>
						<p>3、通过学习政治性纲领文章宣传国旗、国徽、国歌知识，宣扬爱国主义，建设文明校园。</p>
						<p>4、通过日常训练，提高国旗护卫队队员的思想素质，心理素质、身体素质和团队凝聚力。</p></span>
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
