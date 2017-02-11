<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link rel="stylesheet" type="text/css" href="css/message.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/message.js"></script>
</head>

<body>
<a name="top"></a>
<div id="header">
     <h1><a href="index.php"><img src="images/logo.png"></a></h1>
	 
	       <?php 
				if(!$_SESSION["user"]){  
		  			 echo "<ul style='margin-right: 35%;width: 364px;'><a href='index.php' style='color:red;font-size:24px;'>您没有访问权限！请登录后访问！</a></ul>";
			  }else{
					echo "<ul><ul>
		      				<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：".$_SESSION["user"]." </a></li>
		      				<li><a href='php/loginOut.php'>退出登录</li>
			  			</ul></ul>";
			  
     	?>
	 
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
	   <h3>郑州大学西亚斯国际学院国旗护卫队留言板</h3>
       <div class="left">
	    <img src="images/message/message_3.png">
	    <div class="line">
		<p><a href="javascript:;">在线留言 >></a></p>
		<p><a href="contact.php">联系我们 >></a></p>
		<p><a href="reply.php">留言回复 >></a></p>
		</div>
	  </div>
	   <div class="right">
	       <pre>请留言：</pre>
           <label>
		      <p style="margin-top: 20px">
                <span>姓名</span>
                <input type="text" id="username" class="input" value="<?php echo $_SESSION['user'];?>" readonly="" /> 
                </p><br />
			  <p>
                <span>电子邮箱</span>
                <input type="text" id="mail"  class="input"/>
	          </p><br />
             <p>
                <span>联系电话</span>
                <input type="text" id="phone" class="input"/>
	      </p>
	      <br>
	      <p>
                <span>标题</span>
                <input type="text" id="title" class="input"/> 
                </p><br />
			  <p><br />

		        <span>留言</span>
                <textarea name="txtSendContent" id="context" cols="50" rows="5" style="margin-bottom:15px"></textarea>
          </br>
          <p style="margin-top: 80px">
                <input type="reset" name="reset" value="重置" class="btn" onclick="reset();" />
                <input type="submit" name="Submit" value="提交" class="btn" onclick="submit();" />
          </p></label>


       </div>
</div>
<div id="footer">
	<div class="contact">
		电话：010-12348888　传真：010-88666666　客服电话：400-0809-560
		<br />
		西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号
	</div>
</div>
<?php } ?>
</body>
</html>
