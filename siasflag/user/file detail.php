<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>详情</title>
<link rel="stylesheet" type="text/css" href="css/file detail.css">
<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		var title = $('input[name=title]').val();
		var time = $('input[name=time]').val();
		$('#file').empty();
		$.ajax({
			type:'GET',
			url:'php/getFiles.php?id=4&r='+Math.random()+'&listTitle='+title+'&listTime='+time,
			success:function(data){
				$('#file').html('<br><div class="title" align="center">'+title+'<br></div>');
				$('#file').append(data);
			},
			error:function(data){
				alert(data.status);
			}

		});
	});
</script>
</head>

<body>
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
	echo '<li><a href="javascript:;">留言板</a></li>';
}else{
	echo  '<li><a href="message.php">留言板</a></li>';
}
?>
	   </ul>
</div>
<div id="con">
<input type="hidden" name="title" value="<?php echo $_GET['listTitle'];?>" >
    <input type="hidden" name="time" value="<?php echo $_GET['listTime'];?>">
    <div id="file">
    
	<p>&nbsp;&nbsp;我们是周一清晨最嘹亮的口号声，我们是西亚斯最整齐的步伐，是国旗台旁最挺拔的身姿。我们在训练中用汗水和坚持激荡青春，在任务中守卫国旗无上荣誉，在行动中传播爱国主义知识和精神。 <br />&nbsp;&nbsp;我们的队训是：光荣在于平淡，艰巨在于漫长，神圣在于责任。我们常说的是：天气不错，适合训练！ <br />&nbsp;&nbsp;我们是西亚斯国旗护卫队。我们以“国旗在肩，铭记使命”威宗旨，以“国旗尊严重于生命”为全队的行动指南，肩负着提高和表现我校全院师生爱国主义热情的神圣使命。
	&nbsp;&nbsp;我们是周一清晨最嘹亮的口号声，我们是西亚斯最整齐的步伐，是国旗台旁最挺拔的身姿。我们在训练中用汗水和坚持激荡青春，在任务中守卫国旗无上荣誉，在行动中传播爱国主义知识和精神。 <br />&nbsp;&nbsp;我们的队训是：光荣在于平淡，艰巨在于漫长，神圣在于责任。我们常说的是：天气不错，适合训练！ <br />&nbsp;&nbsp;我们是西亚斯国旗护卫队。我们以“国旗在肩，铭记使命”威宗旨，以“国旗尊严重于生命”为全队的行动指南，肩负着提高和表现我校全院师生爱国主义热情的神圣使命。</p>
	<span><a href="javascript:history.go(-1)" >返回</a></span>
	
    </div>
</div>
<div id="footer">
           <p>电话：010-12348888　传真：010-88666666　客服电话：400-0809-560<br />
           西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号</p>
		   <h3><a href="#top">top</a></h3>
		   <div class="link">
		    <a href="#">网站首页</a>
           <span>|</span>
	       <a href="#">部门介绍</a>
           <span>|</span>
	       <a href="#">荣誉展示</a>
           <span>|</span>
	       <a href="#">文件列表</a>
           <span>|</span>
	       <a href="#">照片墙</a>
           <span>|</span>
	       <a href="#">在队人员</a>
           <span>|</span>
	       <a href="#">留言板</a>
           <span>|</span>
	       <a href="#">关于我们</a>
		   </div>
</div>
</body>
</html>
</body>
</html>
