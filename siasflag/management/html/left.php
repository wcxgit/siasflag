<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>无标题文档</title>

<link href="../css/left.css" rel="stylesheet" type="text/css" />

</head>

<SCRIPT language=JavaScript>

function tupian(idt){

    var nametu="xiaotu"+idt;

    var tp = document.getElementById(nametu);

    tp.src="../img/ico05.gif";

	

	for(var i=1;i<30;i++)

	{

	  

	  var nametu2="xiaotu"+i;

	  if(i!=idt*1)

	  {

	    var tp2=document.getElementById('xiaotu'+i);

		if(tp2!=undefined)

	    {tp2.src="../img/ico06.gif";}

	  }

	}

}



function list(idstr){

	var name1="subtree"+idstr;

	var name2="img"+idstr;

	var objectobj=document.all(name1);

	var imgobj=document.all(name2);

	if(objectobj.style.display=="none"){

		for(i=1;i<10;i++){

			var name3="img"+i;

			var name="subtree"+i;

			var o=document.all(name);

			if(o!=undefined){

				o.style.display="none";

				var image=document.all(name3);

				//alert(image);

				image.src="../img/ico04.gif";

			}

		}

		objectobj.style.display="";

		imgobj.src="../img/ico03.gif";

	}

	else{

		objectobj.style.display="none";

		imgobj.src="../img/ico04.gif";

	}

}



</SCRIPT>



<body>
	<?php
		if($_SESSION["supper"]){
		?>

   <table border="0" cellpadding="0" cellspacing="0" width="198">

      <tr>

	    <td>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%">

		    <tr>

			  <td width="207" height="55" background="../img/nav01.gif"><span>基本设置</span> </td>

			</tr>

		  </table>

		  <table border="0"  width="100%" cellpadding="0" cellspacing="0" class="left-table1">

		     <tr>

			   <td height="29">

			      <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				     <tr>

				        <td width="8%"><img name="img8" id="img8" src="../img/ico04.gif" width="8" height="11" /></td>

						<td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('8');" >人员管理</a></td>

					 </tr>               

				  </table>

			   </td>

			 </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree8" style="DISPLAY: none" width="80%" align="right" class="left-table2">

			 <tr>

		       <td width="9%" height="20"><img id="xiaotu20" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="administrator list.php" target="mainFrame"  onClick="tupian('20');">管理人员列表</a></td>

			</tr>
			  <tr>

				  <td width="9%" height="20"><img id="xiaotu223" src="../img/ico06.gif" width="8" height="12" /></td>

				  <td width="91%"><a href="add administrator.php" target="mainFrame"  onClick="tupian('23');">添加管理人员</a></td>

			  </tr>
			  <tr>

				  <td width="9%" height="20"><img id="xiaotu21" src="../img/ico06.gif" width="8" height="12" /></td>

				  <td width="91%"><a href="team-list.php" target="mainFrame"  onClick="tupian('21');">在队人员列表</a></td>

			  <tr>
			<tr>

			  <td width="9%" height="20"><img id="xiaotu22" src="../img/ico06.gif" width="8" height="12" /></td>

			  <td width="91%"><a href="add administrator.php" target="mainFrame"  onClick="tupian('22');">添加在队人员</a></td>

			<tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		    <tr>

			  <td height="29">
			    <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				   <tr>

				     <td width="8%"><img name="img7" id="img7" src="../img/ico04.gif" width="8" height="11" /></td>

					 <td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('7');" >文件管理</a></td>

				   </tr>

				</table>

			  </td>

		   </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree7" style="DISPLAY: none" width="80%" align="right" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu17" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="add video.php" target="mainFrame" class="left3" onClick="tupian('17');">视频上传</a></td>

			 </tr>

			 <tr>

			   <td width="9%" height="20"><img id="xiaotu18" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="add file.php" target="mainFrame" class="left3" onClick="tupian('18');">文件上传</a></td>

			 </tr>
			  <tr>

				  <td width="9%" height="20"><img id="xiaotu19" src="../img/ico06.gif" width="8" height="12" /></td>

				  <td width="91%"><a href="add-text.php" target="mainFrame" class="left3" onClick="tupian('19');">文档编辑</a></td>

			  </tr>

		  </table>

		  

		    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		    <tr>

			  <td height="29">

			    <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				   <tr>

				     <td width="8%"><img name="img6" id="img6" src="../img/ico04.gif" width="8" height="11" /></td>

					 <td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('6');" >账号管理</a></td>

				   </tr>

				</table>

			  </td>

		   </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree6" style="DISPLAY: none" width="80%" align="right" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu14" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="manage.php" target="mainFrame" class="left3" onClick="tupian('14');">查找账号</a></td>

			 </tr>

			<!-- <tr>

			   <td width="9%" height="20"><img id="xiaotu15" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="manage.php" target="mainFrame" class="left3" onClick="tupian('15');">其它账号处理</a></td>

			 </tr>
-->
		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		     <tr>

			    <td height="29">

				  <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				     <tr>

					   <td width="8%"><img name="img5" id="img5" src="../img/ico04.gif" width="8" height="11" /></td>

					   <td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('5');" >留言管理</a></td>

					 </tr>

				  </table>

				</td>

			 </tr>

		  </table>

		  <table id="subtree5" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu1" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%" class="left3" ><a href="Message management.php" target="mainFrame" onClick="tupian('1');">留言列表</a></td>

			 </tr>

		  </table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

				<tr>

					<td height="29">

						<table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

							<tr>

								<td width="8%"><img name="img4" id="img4" src="../img/ico04.gif" width="8" height="11" /></td>

								<td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('4');" >通讯管理</a></td>

							</tr>

						</table>

					</td>

				</tr>

			</table>

			<table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

				<tr>

					<td width="9%" height="20"><img id="xiaotu4" src="../img/ico06.gif" width="8" height="12" /></td>

					<td width="91%" class="left3" ><a href="report.php" target="mainFrame" onClick="tupian('4');">通讯设置</a></td>

				</tr>

			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

				<tr>

					<td height="29">

						<table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

							<tr>

								<td width="8%"><img name="img3" id="img3" src="../img/ico04.gif" width="8" height="11" /></td>

								<td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('3');" >开关管理</a></td>

							</tr>

						</table>

					</td>

				</tr>

			</table>

			<table id="subtree3" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

				<tr>

					<td width="9%" height="20"><img id="xiaotu3" src="../img/ico06.gif" width="8" height="12" /></td>

					<td width="91%" class="left3" ><a href="on-off.php" target="mainFrame" onClick="tupian('3');">开关设置</a></td>

				</tr>

			</table>

		</td>

	  </tr>

   </table>
<?php
}else{
	?>
	 <table border="0" cellpadding="0" cellspacing="0" width="198">

      <tr>

	    <td>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%">

		    <tr>

			  <td width="207" height="55" background="../img/nav01.gif"><span>基本设置</span> </td>

			</tr>

		  </table>

		  <table border="0"  width="100%" cellpadding="0" cellspacing="0" class="left-table1">

		     <tr>

			   <td height="29">

			      <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				     <tr>

				        <td width="8%"><img name="img8" id="img8" src="../img/ico04.gif" width="8" height="11" /></td>

						<td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('8');" >人员管理</a></td>

					 </tr>               

				  </table>

			   </td>

			 </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree8" style="DISPLAY: none" width="80%" align="right" class="left-table2">

			 <tr>

		       <td width="9%" height="20"><img id="xiaotu20" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="administrator list.php" target="mainFrame"  onClick="tupian('20');">管理人员列表</a></td>

			</tr>
			  
			  <tr>

				  <td width="9%" height="20"><img id="xiaotu21" src="../img/ico06.gif" width="8" height="12" /></td>

				  <td width="91%"><a href="team-list.html" target="mainFrame"  onClick="tupian('21');">在队人员列表</a></td>

			  <tr>
			<tr>

			  <td width="9%" height="20"><img id="xiaotu22" src="../img/ico06.gif" width="8" height="12" /></td>

			  <td width="91%"><a href="add-team.php" target="mainFrame"  onClick="tupian('22');">添加在队人员</a></td>

			<tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		    <tr>

			  <td height="29">
			    <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				   <tr>

				     <td width="8%"><img name="img7" id="img7" src="../img/ico04.gif" width="8" height="11" /></td>

					 <td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('7');" >文件管理</a></td>

				   </tr>

				</table>

			  </td>

		   </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree7" style="DISPLAY: none" width="80%" align="right" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu17" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="add video.php" target="mainFrame" class="left3" onClick="tupian('17');">视频上传</a></td>

			 </tr>

			 <tr>

			   <td width="9%" height="20"><img id="xiaotu18" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="add file.php" target="mainFrame" class="left3" onClick="tupian('18');">文件上传</a></td>

			 </tr>
			  <tr>

				  <td width="9%" height="20"><img id="xiaotu19" src="../img/ico06.gif" width="8" height="12" /></td>

				  <td width="91%"><a href="add-text.php" target="mainFrame" class="left3" onClick="tupian('19');">文档编辑</a></td>

			  </tr>

		  </table>

		  

		    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		    <tr>

			  <td height="29">

			    <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				   <tr>

				     <td width="8%"><img name="img6" id="img6" src="../img/ico04.gif" width="8" height="11" /></td>

					 <td width="92%" class="left3"><a href="javascript:" target="mainFrame" onClick="list('6');" >账号管理</a></td>

				   </tr>

				</table>

			  </td>

		   </tr>

		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" id="subtree6" style="DISPLAY: none" width="80%" align="right" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu14" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="manage.php" target="mainFrame" class="left3" onClick="tupian('14');">查找账号</a></td>

			 </tr>

			<!-- <tr>

			   <td width="9%" height="20"><img id="xiaotu15" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%"><a href="manage.php" target="mainFrame" class="left3" onClick="tupian('15');">其它账号处理</a></td>

			 </tr>
-->
		  </table>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

		     <tr>

			    <td height="29">

				  <table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

				     <tr>

					   <td width="8%"><img name="img5" id="img5" src="../img/ico04.gif" width="8" height="11" /></td>

					   <td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('5');" >留言管理</a></td>

					 </tr>

				  </table>

				</td>

			 </tr>

		  </table>

		  <table id="subtree5" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

		     <tr>

			   <td width="9%" height="20"><img id="xiaotu1" src="../img/ico06.gif" width="8" height="12" /></td>

			   <td width="91%" class="left3" ><a href="Message management.php" target="mainFrame" onClick="tupian('1');">留言列表</a></td>

			 </tr>

		  </table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

				<tr>

					<td height="29">

						<table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

							<tr>

								<td width="8%"><img name="img4" id="img4" src="../img/ico04.gif" width="8" height="11" /></td>

								<td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('4');" >通讯管理</a></td>

							</tr>

						</table>

					</td>

				</tr>

			</table>

			<table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

				<tr>

					<td width="9%" height="20"><img id="xiaotu4" src="../img/ico06.gif" width="8" height="12" /></td>

					<td width="91%" class="left3" ><a href="report.php" target="mainFrame" onClick="tupian('4');">通讯设置</a></td>

				</tr>

			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="left-table1">

				<tr>

					<td height="29">

						<table border="0" cellpadding="0" cellspacing="0" width="85%" align="right">

							<tr>

								<td width="8%"><img name="img3" id="img3" src="../img/ico04.gif" width="8" height="11" /></td>

								<td width="92%"  class="left3"><a href="javascript:" target="mainFrame" onClick="list('3');" >开关管理</a></td>

							</tr>

						</table>

					</td>

				</tr>

			</table>

			<table id="subtree3" style="DISPLAY: none" width="80%" border="0" align="right" cellpadding="0" cellspacing="0" class="left-table2">

				<tr>

					<td width="9%" height="20"><img id="xiaotu3" src="../img/ico06.gif" width="8" height="12" /></td>

					<td width="91%" class="left3" ><a href="on-off.php" target="mainFrame" onClick="tupian('3');">开关设置</a></td>

				</tr>

			</table>

		</td>

	  </tr>

   </table>
	<?php
	}
		?>


</body>

</html>

