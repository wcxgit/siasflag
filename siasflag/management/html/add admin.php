<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加管理人员</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/add administrator.css" type="text/css" media="all" />
	<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		
		function reset(){
			$('.name').val('');
			$('.pwd').val('');
			$('.repwd').val('');
		}

		function clear(){
			$('.nameMsg').html('');
			$('.pwdMsg').html('');
			$('.rePwdMsg').html('');
		}
		
		function chkPwd() {
			var pwd = $('.pwd').val();
			if(pwd.length == 0) {
				$('.pwdMsg').html("密码不能为空");
				return false;
			} else if(pwd.length > 15) {
				$('.pwdMsg').html("密码过长！");
				return false;
			} else if(pwd.length < 6) {
				$('.pwdMsg').html("密码过短！");
				return false;
			}
			return true;
		}

		function chkRePwd() {
			var pwd = $('.pwd').val();
			var rePwd = $('.repwd').val();
			if(pwd != rePwd) {
				$('.rePwdMsg').html("两次密码不相同！");
				return false;
			}
			return true;
		}

		function sub() {
			if($('.name').val() == 0){
				$('.nameMsg').html('姓名不能为空！');
			}else if(chkPwd() && chkRePwd()) {
				var pwd = $('.pwd').val();
				var name = $('.name').val();
				$.ajax({
					method: "POST",
					url: "../php/addAdmin.php",
					data: {
						"username": name,
						"pwd": pwd,
					},
					success:function(data){
						$('.msg').html(data);
					},
					error:function(msg){
						alert(msg.status);
					}
				});
			}

		}
	</script>
</head>

<body>
	<div id="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="30">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="62">
								<table align="right" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td rowspan="2" width="25%"><img src="../img/ico02.gif" width="35" height="35" /></td>
										<?php
										if ($_SESSION["admin"]) {
											echo "<td class='left1'>欢迎你，<span>" . $_SESSION["admin"] . "</span></td>";
										}elseif($_SESSION['super']){
											echo "<td class='left1'>欢迎你，<span>" . $_SESSION["super"] . "</span></td>";
										}
										?>
									</tr>
									<tr>
										<td width="55%" height="22" class="left2">
											<a href="../php/loginout.php">[退出]</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</br>
<form>
	<fieldset>
		<legend>添加管理人员</legend>
		<table width="95%" border="0" cellpadding="2" cellspacing="0" align="center">
			<tr>
				<td height="50"></td>
			</tr>
			<tr>
				<td align="right" width="20px">姓名：</td>
				<td width="16%" class="aa"><input class="name" style="width:200px" type="text" size="40" name="username" class="input" required="" onfocus="clear();"/><span class="red"> *<span class="nameMsg" style="color: red;"></span></span></td>
				<tr>
					<td align="right" width="5%">密码：</td>
					<td width="16%" class="aa"><input class="pwd" style="width:200px" type="password" size="40" name="pwd" class="input" onblur="chkPwd()" onfocus="clear();" required="" /><span class="red"> *<span class="pwdMsg" style="color: red;"></span></span></td>
				</tr>
				<tr>
					<td align="right" width="5%">密码确认：</td>
					<td width="16%" class="aa"><input class="repwd" style="width:200px" type="password" size="40" name="repwd" class="input" onblur="chkRePwd()"  onfocus="clear();" required /><span class="red"> *<span class="rePwdMsg" style="color: red;"></span></span></td>
				</tr>
				<tr>
					<td class="msg" align="center" ></td>
				</tr>
			</form>
		</tr>
		<tr>
			<td colspan="2" align="right" height="100px">
				<input type="button" name="Submit" value="添加" class="button" onclick="sub();" />
				<input type="button" name="Submit2" value="重置" class="button" onclick="reset();" />
			</td>
		</tr>
	</table>
</fieldset>
</form>
</body>

</html>