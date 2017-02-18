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
<div class="right">
	  <form>
      <p style="margin-left: 56px;">按姓名搜索申请记录：<input type="text"> <input type="button" value="搜索"></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
		 <tr>
		   <td>
		     <table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			     <td>
				   <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
					  <td height="40"><br>
		                <table  width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#cfcece" align="center">
			               <tr>
				             <td height="26" align="center" colspan="5" class="ac">申请列表</td>
				           </tr>
				           <tr align="center" bgcolor="#f3f2f2">
				             <td width="10%">姓名</td>
				             <td width="12%">申请时间</td>
							 <td width="12%">操作</td>
				           </tr>
				           <tr bgcolor="#FFFFFF" align="center" class="az">
				             <td><a href="#" onclick=""></a>明明</td>
				             <td class="ad">2016-12-01</td>
							 <td class="ad"><a href="showContent.php">查看详情</a> | <a href="javascript:;">删除</a></td>
				           </tr>
				           
						   </table>
						 </td>
					  </tr>
				   </table>
				   <table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				      <tr>
					    <td height="6"><img src="images/message/spacer.gif" width="1" height="1" /></td>
					  </tr>
					  <tr>
					    <td height="33">
						  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						     <tr>
							   <td width="50%" class="dd">共 <a href="#">5</a> 页 | 第 <a href="#">1</a> 页</td>
							   <td width="49%" align="right" class="ee">[<a href="#">首页</a> | <a href="#">上一页</a> | <a href="#">下一页</a> | <a href="#">末页</a>]</td>
							  
							   <td></td>
							   <td></td>
							 </tr>
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


       </div>
			</body>

</html>

