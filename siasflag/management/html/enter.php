<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录页面</title>
<link rel="stylesheet" type="text/css" href="../css/enter.css">
<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script>
		function login(){
			$.ajax({
				type:"POST",
				url:"../php/login.php",
				async:true
				data:{
					"username":$('input[type=text]').val(),
					"pwd":$('input[type=password]').val()
				},
				success:function(data){
					
				},
				error:function(jqXHR){
					alert (jqXHR.status);
				}
			});
		}
</script>
</head>

<body>
<div id="header"></div>
<div id="connent">
<h1>后台系统管理</h1>
  <table border="0" cellpadding="10" cellspacing="13">
			       <tr><th>用户名:</th><th style="color:#ddde92"><input type="text" class="name" size="30"></th></tr>
				   <tr><th>密 码:</th><th style="color:#ddde92"><input type="password" class="name" size="30"></th></tr>	
				   <tr><th>验证码</th><th style="color:#ddde92"><input type="text" class="name" size="30"></th></tr>
			</table>
<ul>
    <li><a href="javascript:;" onclick="login()">登录</a></li>
	<li><a href="javascript:;">注册</a></li>
</ul>
</div>
</body>
</html>
