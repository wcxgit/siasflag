<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改</title>
<link rel="stylesheet" rev="stylesheet" href="../css/alter.css" type="text/css"/>
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
	  </div></br>
   <form action="" method="post" name="message" onsubmit="return validatef1()">
           <label>
		      <p>
                <span>用户名</span>
                <input type="text" name="username" class="input"/> 
                </p><br />
			  <p>
                <span>密码</span>
                <input type="text" name="password" class="input"/>
	          </p><br />
             <p>
                <span>电子邮箱</span>
                <input type="text" name="email" class="input"/>
	      </p>
          </br>
          <p>
                <input type="reset" name="reset" value="重置" class="btn" />
                <input type="submit" name="Submit" value="提交" class="btn" />
          </p></label>
          </form>

</body>
</html>
