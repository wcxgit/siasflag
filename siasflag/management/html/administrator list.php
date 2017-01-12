<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>人员列表</title>
		<link href="../css/administrator list.css" rel="stylesheet" type="text/css" />
		<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$.ajax({
				type:"get",
				url:"../php/select.php?id=1&r=" + Math.random(),
				success:function(data){
					$('#super').html(data);
				},
				error:function(jqXHR){
					console.log(jqXHR.status);
				}
			});
			$.ajax({
				type: "get",
				url: "../php/select.php?id=2&r=" + Math.random(),
				async: true,
				success: function(data) {
					$('#item').html(data);
				},
				error: function(jqXHR) {
					alert(jqXHR.status);
				}
			});

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
				       		if($_SESSION["admin"]){
				       			echo  "<td class='left1'>欢迎你，<span>".$_SESSION["admin"]."</span></td>";
				       		}elseif($_SESSION['super']){
				       			echo  "<td class='left1'>欢迎你，<span>".$_SESSION["super"]."</span></td>";
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
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
										<br>
										<tr>
											<td height="40"><br>
												<?php
				           		if($_SESSION["super"]){
				           	?>
													<table id="super" width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#66CC99" align="center">
														<tr>
															<td height="22" colspan="4" align="center" class="ac">管理员列表</td>
														</tr>
														<tr align="center" bgcolor="#EEEEEE">
															<td width="10%">用户名</td>
															<td width="10%">创建时间</td>
															<td width="12%">操作</td>
														</tr>

														
													</table>
													<?php
				           }else{
				           	?>
														
														<table width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#66CC99" align="center" id="item">
															
														</table>
														<?php
				           	}
				           	?>
									</table>
									</td>
									</tr>
						</table>
						</td>
						</tr>
			</table>
			</td>
			</tr>
			</table>
		</form>
	</body>

</html>