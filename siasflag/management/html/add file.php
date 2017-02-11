<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>添加文件</title>
		<link href="../css/add file.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="30" >
						<table  width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="62">
									<table align="right" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td rowspan="2" width="25%">
												<img src="../img/ico02.gif" width="35" height="35" />
											</td>
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
												<a href="../php/loginout.php">
													[退出]
												</a></td>
										</tr>
									</table></td>
							</tr>
						</table></td>
				</tr>
			</table>
		</div></br>
		<form action="../php/fileUpdate.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>
					文件添加
				</legend>
				<table width="90%" border="0" cellpadding="2" cellspacing="0" align="center">
					<tr>
						<td height="20"></td>
					</tr>
					<tr height="40">
						<td width="16%" class="aa">文件类型：
							<select name="sel[]">
								<option value="1">校内活动</option>
								<option value="2">队内纪事</option>
							</select>
						</td>
					</tr>
					<tr height="40">
						<td width="16%" class="aa">添加文件：
							<input type="file" name="file[]" multiple="multiple">
						</td>
					</tr>
					<tr>
						<td colspan="2" height="40px">
							<input class="bc" type="submit" name="Submit" value="添加" class="button"/>
							<input type="reset" name="Submit2" value="重置" class="button" />
						</td>
					</tr>
				</table>
			</fieldset>
		</form>

	</body>
</html>
