<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看申请内容</title>
<link href="../css/view content.css" rel="stylesheet" type="text/css"/>
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
<div class="content">
<pre>申请表：</pre>
	   			<form action="">
				<p><label for="">姓名：</label><input type="text" name="" id="" value="" /></p>
				<p><label for="">性别：</label><input type="text" name="" id="" value="" /></p>
				<p><label for="">年龄：</label><input type="text" name="" id="" value="" /></p>
				<p><label for="">QQ：</label><input type="text" name="" id="" value="" /></p>
				<p><label for="">手机号：</label><input type="text" name="" id="" value="" /></p>
				<p><label for="">兴趣、爱好：</label><textarea name="" rows="3" cols="50"></textarea></p>
				<p><label for="">自我评价：</label><textarea name="" rows="3" cols="50"></textarea></p>
				<p><label for="">加入理由：</label><textarea name="" rows="3" cols="50"></textarea></p>
			</form>
			</div>
			</body>

</html>

