<!--加入我们开关-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
error_reporting(0);?>

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<title>开关设置</title>

		<link href="../css/add video.css" rel="stylesheet" type="text/css"/>
		<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">function submit() {
	var off = $('input[type=radio]:checked').val();
	$.ajax({
		type: "post",
		url: "../php/switch.php",
		async: true,
		data: {
			'of': off
		},
		success: function(data) {
			console.log(data);
		},
		error: function(jqXHR) {
			console.log(jqXHR.status);
		}
	});

}</script>
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

											<td rowspan="2" width="25%">
												<img src="../img/ico02.gif" width="35" height="35"/>
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

		</div>
		</br>

		<fieldset>

			<legend>
				开关设置
			</legend>

			<table width="90%" border="0" cellpadding="2" cellspacing="0" align="center">

				<tr>
					<td height="20"></td>
				</tr>

				<tr height="40">
					<!--<td width="16%" class="aa">视频名称：<input type="text" name="vedioNmae" /><span class="red"> *</span></td>

					<td width="16%" class="aa">视频链接：<input type="text" name="vedioUrl"><span class="red"> *</span></td>-->
					<td width="16%" class="aa">是否开启加入我们功能？ <?php
					if ($_SESSION['on-off']) {
						echo '<input type="radio" name="of" value="off" >关闭
<input type="radio" name="of" value="on" checked>开启';
					} else {
						echo '<input type="radio" name="of" value="off" checked>关闭
<input type="radio" name="of" value="on">开启';
					}
						?></td>
				</tr>

				<tr>

					<td colspan="2" height="40px">
						<input class="bc" type="button" name="Submit" value="保存" class="button" onclick="submit();" />
					</td>

				</tr>

			</table>

		</fieldset>

	</body>

</html>

