﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  session_start();
error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>详情</title>
	<link rel="stylesheet" type="text/css" href="css/file detail.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<script src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var title = $('input[name=title]').val();
			var time = $('input[name=time]').val();
			$('#file').empty();
			$.ajax({
				type: 'GET',
				url: 'php/getFiles.php?id=4&r=' + Math.random() + '&listTitle=' + title + '&listTime=' + time,
				success: function(data) {
					$('#file').html('<br><div class="title" align="center">' + title + '<br></div>');
					$('#file').append(data);
				},
				error: function(data) {
					alert(data.status);
				}

			});
		});</script>
	</head>
	<body>
		<?php include_once("baidu_js_push.php") ?>
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
		echo '<li><a href="javascript:;">留言板</a></li>';
	} else {
		echo '<li><a href="message.php">留言板</a></li>';
	}
	?>
</ul>
</div>
<div id="con">
	<input type="hidden" name="title" value="<?php echo $_GET['listTitle']; ?>" >
	<input type="hidden" name="time" value="<?php echo $_GET['listTime']; ?>">
	<div id="file">

		<p>
			&nbsp;&nbsp;我们是周一清晨最嘹亮的口号声，我们是西亚斯最整齐的步伐，是国旗台旁最挺拔的身姿。我们在训练中用汗水和坚持激荡青春，在任务中守卫国旗无上荣誉，在行动中传播爱国主义知识和精神。
			<br />
			&nbsp;&nbsp;我们的队训是：光荣在于平淡，艰巨在于漫长，神圣在于责任。我们常说的是：天气不错，适合训练！
			<br />
			&nbsp;&nbsp;我们是西亚斯国旗护卫队。我们以“国旗在肩，铭记使命”威宗旨，以“国旗尊严重于生命”为全队的行动指南，肩负着提高和表现我校全院师生爱国主义热情的神圣使命。
			&nbsp;&nbsp;我们是周一清晨最嘹亮的口号声，我们是西亚斯最整齐的步伐，是国旗台旁最挺拔的身姿。我们在训练中用汗水和坚持激荡青春，在任务中守卫国旗无上荣誉，在行动中传播爱国主义知识和精神。
			<br />
			&nbsp;&nbsp;我们的队训是：光荣在于平淡，艰巨在于漫长，神圣在于责任。我们常说的是：天气不错，适合训练！
			<br />
			&nbsp;&nbsp;我们是西亚斯国旗护卫队。我们以“国旗在肩，铭记使命”威宗旨，以“国旗尊严重于生命”为全队的行动指南，肩负着提高和表现我校全院师生爱国主义热情的神圣使命。
		</p>
		<span>
			<a href="javascript:history.go(-1)" >
				返回
			</a></span>

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
</body>
</html>
