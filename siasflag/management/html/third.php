<!--在队人员列表-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>人员列表</title>
    <link href="../css/team-list.css" rel="stylesheet" type="text/css" />
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="../js/teamList.js" type="text/javascript" charset="utf-8"></script>
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
                                    <td width="55%" height="22" class="left2"><a href="../php/loginout.php">[退出]</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div></br>
              <ul>
			<li >
				<a href="first.php">
					<span id="first"><?php echo date("Y")-3;?></span>级
				</a>
			</li>
			<li>
				<a href="second.php">
					<span id="second"> <?php echo date("Y")-2; ?> </span>级
				</a>
			</li>
			<li class="bg">
				<a href="javascript:;">
					<span id="third" class="active"><?php echo date("Y")-1;?></span>级
				</a>
			</li>
		</ul>
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
															<tr>
																<td height="22" colspan="4" align="center" class="ac"><span id="rank"></span>级在队人员列表</td>
															</tr>
															<tr align="center" bgcolor="#EEEEEE">
																<td width="10%">姓名</td>
																<td width="10%">创建时间</td>
																<td width="12%">操作</td>
															</tr>
															<tbody id="list">
																
															</tbody>
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
														<td height="33" id="pageBar">
														</td>
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
</body>
</html>
