<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>其它账号处理</title>
<link href="../css/manage.css" rel="stylesheet" type="text/css" />
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
					   <td class="left1">您好，<span>小明</span></td>
				   </tr>
				   <tr>
				       <td width="55%" height="22" class="left2"><a href="enter.html">[退出]</a></td>
				   </tr>
					</table>
				  </td>
				</tr>
			 </table>
		   </td>
		 </tr>
	  </table>
	  </div></br>
	   <form>
      <fieldset>
	   <legend>查找用户</legend>
	   <table width="95%" border="0" cellpadding="2" cellspacing="0" align="center">
	      <tr><td height="50"></td></tr>
	      <tr>
		    <td align="right" width="5%">用户名：</td>
			<td width="16%" class="aa"><input style="width:200px" type="text" size="40" name="username" class="input"  onblur="chkusername()" /><!--<span class="red"> *</span>（用户名不少于6位且不超过15个字符）--></td>
			<!--<td width="19%" align="right">密码:  <input type="password" name="pwd" class="input" onblur="chkpwd()" />
	<span class="bb">（密码不少于6位且不超过15位）</span></td>-->
		  </tr>
		  <tr>
		    <td colspan="2" align="right" height="100px">
			   <input type="button" name="Submit" value="封存账号" class="button" onclick="link();"/>
			   <input type="button" name="Submit2" value="解冻账号" class="button" onclick="window.history.go(-1);"/>
			</td>
		  </tr>
	   </table>
	 </fieldset>
  </form>
</body>
</html>

