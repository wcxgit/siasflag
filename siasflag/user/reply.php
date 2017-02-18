<!-- 留言信息回复 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
	error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>联系我们</title>
		<link rel="stylesheet" type="text/css" href="css/reply.css">
		<link rel="stylesheet" type="text/css" href="css/cell.css">
		<link rel="stylesheet" type="text/css" href="css/common.css">
		<script type="text/javascript">function msg() {
	alert('暂未开放此功能！');
}</script>
	</head>

	<body>
		<a name="top"></a>
		<div id="header">
			<h1>
			<a href="index.html">
				<img src="images/logo.png">
			</a></h1>
			<ul>
				<?php
				if (!$_SESSION["user"]) {
					echo "<ul>
<li>
<a href='login.html'>登录</a>
</li>
|
<li>
<a href='register.html'>注册</a>
</li>
</ul>";
				} else {
					echo "<ul>
<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：" . $_SESSION["user"] . " </a></li>
<li><a href='php/loginOut.php'>退出登录</li>
</ul>";
				}
				?>
			</ul>
		</div>
		<div id="nav">
			<ul>
				<li>
					<a href="../index.php">
						网站首页
					</a>
				</li>
				<li>
					<a href="about.php">
						部门介绍
					</a>
				</li>
				<li>
					<a href="depShow.php">
						荣誉展示
					</a>
				</li>
				<li>
					<a href="file.php">
						文件列表
					</a>
				</li>
				<li>
					<a href="picture.php">
						照片墙
					</a>
				</li>
				<?php
				if ($_SESSION['on-off']) {
					echo '<li>
<a href="come.php">加入我们</a>
</li>';
				} else {
					echo '<li>
<a href="javascript:;" onclick="msg();">加入我们</a>
</li>';
				}
				?>
				<?php
				if (!$_SESSION[user]) {
					echo '<li><a href="javascript:;">留言板</a></li>';
				} else {
					echo '<li><a href="message.php">留言板</a></li>';
				}
				?>
			</ul>
		</div>
		<div id="con">
			<img src="images/message/message_1.png">
			<div class="left">
				<img src="images/message/message_3.png">
				<div class="line">
					<p>
						<a href="message.php">
							在线留言 >>
						</a>
					</p>
					<p>
						<a href="contact.php">
							联系我们 >>
						</a>
					</p>
					<p>
						<a href="javascript:;">
							留言回复 >>
						</a>
					</p>
				</div>
			</div>
			<div class="right">
				<form>
					<p>
						按内容标题搜索留言：
						<input type="text">
						<input type="button" value="搜索">
					</p>
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
														<table  width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#cfcece" align="center">
															<tr>
																<td height="26" align="center" colspan="5" class="ac">回复列表</td>
															</tr>
															<tr align="center" bgcolor="#f3f2f2">
																<td width="10%">昵称</td>
																<td width="15%">内容</td>
																<td width="12%">留言时间</td>
																<td width="12%">操作</td>
															</tr>
															<tr bgcolor="#FFFFFF" align="center" class="az">
																<td>
																	<a href="#" onclick=""></a>明明</td>
																<td>xxxx</td>
																<td class="ad">2016-12-01</td>
																<td class="ad">
																	<a href="Reply content.html">
																		查看详情
																	</a></td>
															</tr>

														</table></td>
												</tr>
											</table>
											<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
												<tr>
													<td height="6">
														<img src="images/message/spacer.gif" width="1" height="1" />
													</td>
												</tr>
												<tr>
													<td height="33">
														<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
															<tr>
																<td width="50%" class="dd">共
																	<a href="#">
																		5
																	</a> 页 | 第
																	<a href="#">
																		1
																	</a> 页</td>
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
																	</a>]</td>

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

			</div>
		</div>
		<div id="footer">
			<div class="contact">
				电话：010-12348888　传真：010-88666666　客服电话：400-0809-560
				<br />
				西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号
			</div>
		</div>
	</body>
</html>
