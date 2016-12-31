<!doctype html>
<?php session_start(); ?>
<html lang="en">
	<!--修改管理员信息-->
<head>
	<meta charset="UTF-8" />
	<title></title>
	<link rel="stylesheet" href="../css/edit.css" />
	<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
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
				       			echo  "<td class='left1'>欢迎你，<span>".$_SESSION["user"]."</span></td>";
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
	<fieldset>
		<legend>修改管理员信息</legend>
		<label for="name">用户名：</label><input type="text" id="name"/><br />
		<label for="pwd">密&nbsp;&nbsp;&nbsp;码：</label><input type="password" id="pwd"/><br /><br />
		<button id="reset">重置</button>
		<button id="submit">确认修改</button>
	</fieldset>
	
</body>
</html>