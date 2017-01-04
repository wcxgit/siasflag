<?php
/*管理人员权限设置*/
error_reporting(0);
header("Content-Type:html/text;charset=utf-8");
$con = mysql_connect("localhost", "root", "root");
mysql_select_db("siasflag", $con);
mysql_query("set names utf-8");
$id = $_GET["id"];
if ($id == 1) {

} elseif ($id == 2) {
	$sql = "select username,creat_time from user where flag = 1";
	$result = mysql_query($sql, $con);
	echo $result;
	if (!$result) {
		echo mysql_error();
	}
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