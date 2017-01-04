<!--在队人员列表-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>人员列表</title>
		<link href="../css/team-list.css" rel="stylesheet" type="text/css" />
		<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
		$(function(){
			var rank = $('#first').html();
		$.ajax({
			type: "post",
			url: "../php/teamList.php",
			async: true,
			data: {
				'rank': rank
			},
			success: function(data) {
				$('#item').html(data);
			},
			error: function(jqXHR) {
				alert(jqXHR.status);
			}
		});
		})
		
	</script>
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
											if ($_SESSION["Passed"]) {
												echo "<td class='left1'>欢迎你，<span>" . $_SESSION["user"] . "</span></td>";
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
		<ul>
			<li class="bg">
				<a href="javascript:;">
					<span id="first"><?php echo date("Y")-3;?></span>级
				</a>
			</li>
			<li>
				<a href="second.php">
					<span id="second"> <?php echo date("Y")-2; ?> </span>级
				</a>
			</li>
			<li>
				<a href="third.php">
					<span id="third"><?php echo date("Y")-1;?></span>级
				</a>
			</li>
		</ul>
		<form>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td height="40">
												<br>
												<table id="item" width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#66CC99" align="center">

												</table></td>
										</tr>
									</table>
									<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td height="6">
												<img src="../img/spacer.gif" width="1" height="1" />
											</td>
										</tr>
										<tr>
											<td height="33">
												<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td width="50%" class="dd">共 <span>5</span> 页 | 第 <span>1</span> 页</td>
														<td width="49%" align="right" class="ee">[
															<a href="#">
																首页
															</a> |
															<a href="#">
																上一页
															</a> |
															<a href="#">
																下一页
															</a> |
															<a href="#">
																末页
															</a>] 转至：</td>
														<td width="1%">
															<table width="20" border="1" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="1%">
																		<input name="text" type="text" size="1" />
																	</td>
																	<td width="87%">
																		<input name="Submit" type="submit" value=" " class="cc"/>
																	</td>
																</tr>
															</table></td>
														<td></td>
														<td></td>
													</tr>
												</table></td>
										</tr>
									</table></td>
							</tr>
						</table></td>
				</tr>
			</table>
		</form>
	</body>
</html>
