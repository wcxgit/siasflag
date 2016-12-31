<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>添加管理人员</title>
		<link rel="stylesheet" rev="stylesheet" href="../css/add administrator.css" type="text/css" media="all" />
		<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			var name = $('input[name=username]').val();
			var pwd = $('input[name=pwd]').val();
			var rePwd = $('input[name=repwd]').val();

			function chkPwd() {
				if(pwd.length == 0) {
					console.write("密码不能为空");
					return false;
				} else if(pwd.length > 15) {
					console.log("密码过长！");
					return false;
				} else if(pwd.length < 6) {
					console.log("密码过短！");
					return false;
				}
				return true;
			}

			function chkRePwd() {
				if(pwd != rePwd) {
					console.log("两次密码不相同！");
					return false;
				}
				return true;

			}
			function chkusername() {
				if(name.length == 0) {
					console.write("用户名不能为空！")
					return false;
				}
				return true;
			}

			function submit() {
				if(chkusername() && chkpwd() && chkrepwd()) {
					$.ajax({
						method: "POST",
						url: "./php/addTeam.php",
						data: {
							"username": name,
							"pwd": pwd,
						}
					});
				}
				return;
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
				       if($_SESSION["Passed"]){
				       		echo "<td class='left1'>欢迎你，<span>".$_SESSION["user"]."</span></td>";
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
						<td width="16%" class="aa"><input style="width:200px" type="text" size="40" name="username" class="input" onblur="chkusername()" /><span class="red"> *</span></td>
						<tr>
							<td align="right" width="5%">密码：</td>
							<td width="16%" class="aa"><input style="width:200px" type="password" size="40" name="pwd" class="input" onblur="chkPwd()" /><span class="red"> *</span></td>
						</tr>
						<tr>
							<td align="right" width="5%">密码确认：</td>
							<td width="16%" class="aa"><input style="width:200px" type="password" size="40" name="repwd" class="input" onblur="chkRePwd()" /><span class="red"> *</span></td>
						</tr>
							<tr>
								<td width="19%" align="right">上传照片: <input type="file" name="pwd" class="input" /></td>
							</tr>
						</form>
					</tr>
					<tr>
						<td colspan="2" align="right" height="100px">
							<input type="button" name="Submit" value="添加" class="button" onclick="submit();" />
							<input type="button" name="Submit2" value="重置" class="button" onclick="window.history.go(-1);" />
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>

</html>