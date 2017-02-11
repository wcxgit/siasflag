<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联系我们</title>
<link rel="stylesheet" type="text/css" href="css/contact.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$.ajax({
			type:'GET',
			url:'php/getFiles.php?id=5',
			success:function(data){
				var json = JSON.parse(data);
				var list = json.list[0];
				var wechat = list.wechat;
				$('#wechat').html(list.wechat);
				$('#qq').html(list.qq);
				$('#weibo').html(list.weibo);
			},
			error:function(msg){
				alert(msg.status);
			}
		});
	});
	function msg(){
		alert('暂未开放此功能！');
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
	echo '<li><a href="javascript:;">留言板</a></li>';
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
		<p><a href="message.php">在线留言 >></a></p>
		<p><a href="javascript:;">联系我们 >></a></p>
		<p><a href="reply.php">留言回复 >></a></p>
		</div>
	  </div>
	  <div class="centre"></div>
	   <div class="right">
	   <pre>联系我们：</pre>
	   <p><img src="images/message/call.png">
	      <span>微信公众号：<span id="wechat"></span></span>
	   </p>
	   <p><img src="images/message/qq.png">
	      <span>qq：<span id="qq"></span></span>
	   </p>
	   <p><img src="images/message/weibo.png">
	      <span>微博：<span id="weibo"></span></span>
	   </p>
	   
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
