<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>添加视频</title>

<link href="../css/add video.css" rel="stylesheet" type="text/css" />

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
	   <legend>视频添加</legend>
	   <table width="90%" border="0" cellpadding="2" cellspacing="0" align="center">
	      <tr><td height="20"></td></tr>
	      <tr height="40">
	      	<td width="16%" class="aa">视频名称：<input type="text" name="vedioNmae" /><span class="red"> *</span></td>
		   <td width="16%" class="aa">视频链接：<input type="text" name="vedioUrl"><span class="red"> *</span></td></tr>
		  <tr>
		    <td colspan="2" height="40px">
			   <input class="bc" type="button" name="Submit" value="添加" class="button" onclick="link();"/>
			   <input type="button" name="Submit2" value="重置" class="button" onclick="window.history.go(-1);"/>
			</td>
		  </tr>
	   </table>
	 </fieldset>
  </form>

</body>
</html>

