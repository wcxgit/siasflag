<?php
/*管理人员权限设置*/
error_reporting(0);
header("Content-Type:html/text;charset=utf-8");
$con = mysql_connect("localhost", "root", "root");
mysql_select_db("siasflag", $con);
mysql_query("set names utf-8");
$id = $_GET["id"];


$sql = "select username,creat_time from user where flag = 1";
	$result = mysql_query($sql, $con);
	echo $result;
	if (!$result) {
		echo mysql_error();
	}

if ($id == 1) {
	echo '<tr>
															<td height="22" colspan="4" align="center" class="ac">管理员列表</td>
														</tr>
														<tr align="center" bgcolor="#EEEEEE">
															<td width="10%">用户名</td>
															<td width="10%">创建时间</td>
															<td width="12%">操作</td>
														</tr>';
	while($row = mysql_fetch_array($result)){
		echo "<tr bgcolor='#FFFFFF' align='center' class='az'> 
					<td width='40%'>" . $row["username"] . "</td>
					<td width='40%'>" . $row["creat_time"] . "</td>
					<td width='20%'><a href='javascript:;'>修改</a>|<a href='javascript:;'>删除</a></td>
				</tr>";
	}
} elseif ($id == 2) {
	
	echo "	<tr>
					<td height='22' colspan='4' align='center' class='ac'>管理员列表</td>
				</tr>
				<tr align='center' bgcolor='#EEEEEE'>
					<td width='50%'>用户名</td>
					<td width='50%'>创建时间</td>
				</tr>";
	while ($row = mysql_fetch_array($result)) {
		echo "
				<tr bgcolor='#FFFFFF' align='center' class='az'> 
					<td width='50%'>" . $row["username"] . "</td>
					<td width='50%'>" . $row["creat_time"] . "</td>
				</tr>";
	}
} else {
	echo "未查询";
}
mysql_close($con);
?>