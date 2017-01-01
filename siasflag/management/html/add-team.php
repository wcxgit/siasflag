<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>添加在队人员</title>
		<link rel="stylesheet" rev="stylesheet" href="../css/add administrator.css" type="text/css" media="all" />
		<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			
			function submit() {
					$.ajax({
						method: "POST",
						url: "./php/addTeam.php",
						data: {
							"username": $('#name').val(),
							"rank": $('#rank').val()
						},
						success:function(data){
							$('#msg').html(data);
						},
						error: function(jqXHR) {
							alert(jqXHR.status);
						}
					});
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
			<fieldset>
				<legend>添加在队人员</legend>
				<table width="95%" border="0" cellpadding="2" cellspacing="0" align="center">
					<tr>
						<td height="50"></td>
					</tr>
					<form action="../php/addTeam.php" method="post" enctype="multipart/form-data">
						<!-- <tr>
							<td align="right" width="20px">姓名：</td>
							<td width="16%" class="aa"><input style="width:200px" type="text" size="40" id="name" name="username" class="input" required onblur="chkusername()" /><span class="red"> *</span></td>
						</tr> -->
						<tr>
							<td align="right" width="5%">级别：<input style="width:200px" type="text" size="40" id="rank" name="rank" class="input" required="required"/><span class="red"> *</span></td>
							<td width="16%" class="aa"></td>
						</tr>
						<tr>
							<td width="19%" align="right">上传照片: <input type="file" name="img[]" class="input" multiple="multiple" /></td><span id="msg"></span>
						</tr>
						<tr width="19%" align="right">
						<td>注意：单个文件要小于2M,最大上传数量为20</td></tr>
						<tr>
							<td colspan="2" align="right" height="100px">
								<input type="submit"  value="添加" class="button" onclick="submit();" />
								<input type="reset" value="重置" class="button" />
							</td>
						</tr>
					</form>

				</table>
			</fieldset>
	</body>

</html>