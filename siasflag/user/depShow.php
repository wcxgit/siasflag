<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>荣誉展示</title>
    <link rel="stylesheet" type="text/css" href="css/depShow.css">
</head>

<body>
<a name="top"></a>
<div id="header">
     <h1><a href="index.html"><img src="images/logo.png"></a></h1>
	 <ul>
	      <?php 
				if(!$_SESSION["Passed"]){  
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
           <li><a href="come.php">加入我们</a></li>
		   <li><a href="message.php">留言板</a></li>
	   </ul>
</div>
<div id="con">
    <div class="show">
        <dl>
	       <dt><img src="images/zhengshu.jpg"></dt>
		   <dd><a href="file detail.html">标题:文件一</br>日期：2016-12-30</a></dd>
	    </dl>
		<dl>
	       <dt><img src="images/zhengshu.jpg"></dt>
		   <dd><a href="file detail.html">标题:文件一</br>日期：2016-12-30</a></dd>
	    </dl>
		 <dl>
	       <dt><img src="images/zhengshu.jpg"></dt>
		   <dd><a href="file detail.html">标题:文件一</br>日期：2016-12-30</a></dd>
	    </dl>
		<dl>
	       <dt><img src="images/zhengshu.jpg"></dt>
		   <dd><a href="file detail.html">标题:文件一</br>日期：2016-12-30</a></dd>
	    </dl>

	 </div>
     <div id="page">
             <ul>
                 <li><a href="#">< </a></li>
                 <li><a href="#">1</a></li>
                 <li><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#">4</a></li>
                 <li><a href="#">5</a></li>
                 <li><a href="#">6</a></li>
                 <li><a href="#">></a></li>
           </ul>
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