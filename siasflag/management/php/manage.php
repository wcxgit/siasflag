<?php
header('content-type:text/html;charset=utf-8');
include 'conn.php';
mysql_query('set names utf8');
$name = $_POST['username'];
$id = $_POST['id'];

if ($id == 1) {
	$sql = "select * from user where username = '$name'";
	$result = mysql_query($sql, $con);
	if (!is_array(mysql_fetch_array($result))) {
		echo '无法找到该用户，请核查用户名！';
	} else {
		$sql = "select flag from user where username = '$name'";
		$result = mysql_query($sql, $con);
		while($row = mysql_fetch_array($result)){
		if ($row['flag']==2) {
			echo "该用户已被封存！";
		} else {
			$sql = "update user set flag = 2 where username = '$name'";
			$result = mysql_query($sql, $con);
			if (!$result) {
				echo "封存账号失败：" . mysql_errno();
			} else {
				echo "封存账号成功";
			}
		}

	}
}

} elseif ($id == 2) {
	$sql = "select * from user where username = '$name'";
	$result = mysql_query($sql, $con);
	if (!is_array(mysql_fetch_array($result))) {
		echo '无法找到该用户，请核查用户名！';
	} else {
		$sql = "select flag from user where username = '$name'";
		$result = mysql_query($sql, $con);
		while($row = mysql_fetch_array($result)){

			if ($row['flag'] == 0) {
				echo "该用户没有被封存！";
			} else {
				$sql = "update user set flag = 0 where username = '$name'";
				$result = mysql_query($sql, $con);
				if (!$result) {
					echo "解冻账号失败：" . mysql_error();
				} else {
					echo "解冻账号成功";
				}
			}
		}
	}
}
?>