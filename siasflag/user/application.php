<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>申请加入</title>
	<link rel="stylesheet" type="text/css" href="css/application.css">
	<script src="js/jquery.1.7.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var name = $('#username').html();
			//获取用户信息并填充到相应位置
			$.ajax({
				type:"POST",
				url:'php/application.php',
				data:{
					"username":name,
					"id":1
				},
				success:function(data){
					//解析json数据
					var json = JSON.parse(data);
					var sex = json.sex;
					var username = json.username;
					var tel = json.tel;
					$('#sex').val(sex);
					$('#name').val(username);
					$('#tel').val(tel);
				},
				error:function(data){
					alert(data.status);
				}
			});
		});
			//清空信息
			function reset(){
				$('input[type=text]').val('');
				$('textarea').val('');
			}
			//隐藏错误信息
			function hide(){
				$('#errAge').html('');
				$('#msg').html('');
			}
		
			//提交信息
			function submit(){
				var name = $('#name').val();
				var sex = $('#sex').val();
				var age = $('#age').val();
				var qq = $('#qq').val();
				var tel = $('#tel').val();
				var hospital = $('#hospital').val();
				var evaluate = $('#evaluate').val();
				var reason = $('#reason').val();
				if(name!=''&& sex!=''&&age!=''&&qq!=''&&tel!=''&&tel!=''&&hospital!=''&&evaluate!=''&&reason!=''){
					if(age>99){
						$('#errAge').html('请填写真实年龄！')
					}else{
						$.ajax({
							type:'post',
							url:'php/application.php',
							data:{
								"name":name,
								"sex":sex,
								"age":age,
								"qq":qq,
								"tel":tel,
								"hospital":hospital,
								"evaluate":evaluate,
								"reason":reason,
								"id":2
							},
							success:function(data){
								alert(data);
							},
							error:function(data){
								alert(data.status);
							}
						});
					}
					
				}else{
					$('#msg').html('信息填写不完整！');
				}
				
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
				<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：<span id='username'>".$_SESSION["user"]." </span></a></li>
				<li><a href='php/loginOut.php'>退出登录</li>
			</ul>";
		}
		?>	 </ul>
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
		<img src="images/message/message_1.png">
		<div class="left">
			<img src="images/message/message_3.png">
			<div class="line">
				<p><a href="come.html">申请须知 >></a></p>
				<p><a href="application.php">申请加入 >></a></p>
			</div>
		</div>
		<div class="centre"></div>
		<div class="right">
			<pre>申请表：</pre>
			<p><label for="">姓名：</label><input type="text" name="" id="name" value="" required="" onfocus="hide();"/>	</p>
			<p><label for="">性别：</label><input type="text" name="" id="sex" value="" readonly="" required="" onfocus="hide();"/></p>
			<p><label for="">年龄：</label><input type="text" name="" id="age" value="" required="" onfocus="hide();" /><span id="errAge" style="color: red" ></span></p>
			<p><label for="">QQ：</label><input type="text" name="" id="qq" value="" required="" onfocus="hide();"/></p>
			<p><label for="">手机号：</label><input type="text" name="" id="tel" value="" required="" onfocus="hide();"/></p>
			<p><label for="">兴趣、爱好：</label><textarea name="" rows="3" cols="50" id="hospital" required="" onfocus="hide();"></textarea></p>
			<p><label for="">自我评价：</label><textarea name="" rows="3" cols="50" id="evaluate" required="" onfocus="hide();"></textarea></p>
			<p><label for="">加入理由：</label><textarea name="" rows="3" cols="50" id="reason" required="" onfocus="hide();"></textarea></p>
			<p><span id="msg" style="color: red"></span></p>
			<p>
				<input type="reset" name="reset" value="重置" class="btn" onclick="reset();" />
				<input type="submit" name="Submit" value="提交" class="btn" onclick="submit();" />
			</p>
		</div>   
	</div>   
</div><div id="footer">
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
