<?php
	include 'conn.php';
	$rank = $_POST['rank'];
	mysql_query('set names utf8');
	$sql = "select * from team where rank ='$rank' ";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo "查询出错:".mysql_error();
	}
	echo '<tr>
														<td height="22" colspan="4" align="center" class="ac">'.$rank.'级列表</td>
													</tr>
													<tr align="center" bgcolor="#EEEEEE">
														<td width="10%">用户名</td>
														<td width="10%">创建时间</td>
														<td width="12%">操作</td>
													</tr>';
	while($row = mysql_fetch_array($result)){
		echo '<tr bgcolor="#FFFFFF" align="center" class="az">
														
														<td>
															<a href="#" onclick=""></a>'.$row["name"].'</td>
														<td>'.$row["create_time"].'</td>
														<td class="ad">
															<a href="#">
																修改
															</a>｜
															<a href="#">
																删除
															</a></td>
													</tr>';
	}
	
	?>