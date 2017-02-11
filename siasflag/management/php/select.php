<?php
/*管理人员权限设置*/
error_reporting(0);
header("Content-Type:html/text;charset=utf-8");
$con = mysql_connect("localhost", "root", "root");
mysql_select_db("siasflag", $con);
mysql_query("set names utf8");
$id = $_GET["id"];
$del = $_GET['del'];
if ($id == 1) {
	$sql = "select id,username,creat_time from user where flag = 1";
	$result = mysql_query($sql, $con);
	if (!$result) {
		echo '查询失败'.mysql_error();
	}
	$arr['list'] = '';
	while($row = mysql_fetch_array($result)){
		
		$arr['list'][] = array(
			'name' => $row['username'],
			'creat_time' => $row['creat_time'],
			'id' => $row['id']
			);
	}
	echo json_encode($arr);
}elseif($id == 2){

	$sql = "delete from user where id = '{$del}'";
	$result = mysql_query($sql);
	if(!$result){
		echo '删除出错：'.mysql_error();
		exit();
	}
	echo "删除成功！";
} else {
	echo "未查询";
}
mysql_close($con);
?>