<?php
include 'conn.php';
mysql_query('set names utf8');
/*显示留言信息*/

$id = $_GET['id'];
if ($id == 1) {//获取所有留言信息
	$curPage = $_GET['page'];
	//当前页数
	$pageSize = 15;
	//每页显示条数
	/*获取记录总数*/
	$sqlTotal = "select * from message";
	$result = mysql_query($sqlTotal);
	$total = mysql_num_rows($result);
	//记录总数
	$totalPage = ceil($total / $pageSize);
	//总页数
	$startPage = ($curPage - 1) * 15;
	//分页查询起始页

	/*分页查询*/
	$pageSql = "select * from message where isNull(flag) order by time desc limit {$startPage},{$pageSize}";
	$pageResult = mysql_query($pageSql);
	if (!$pageResult) {
		echo '分页查询失败：' . mysql_error();
		exit();
	}
	/*封装信息*/
	$arr['curPage'] = $curPage;
	$arr['totalPage'] = $totalPage;
	$arr['list'] = '';

	while ($row = mysql_fetch_array($pageResult)) {
		$arr['list'][] = array('name' => $row['name'], 'context' => $row['message'], 'time' => $row['time'], 'id' => $row['id'], 'title' => $row['title']);
	}
	echo json_encode($arr);
} elseif ($id == 2) {//获取所搜索的留言信息
	$curPage = $_GET['page'];
	//当前页数
	$pageSize = 15;
	//每页显示条数
	$msg = $_GET['serch'];
	//搜索的姓名
	$sql = "select * from message where name='{$msg}'";
	$result = mysql_query($sql);
	if (!$result) {
		echo "查询失败：" . mysql_error();
	}
	/*获取记录总数*/
	$total = mysql_num_rows($result);
	//记录总数
	$totalPage = ceil($total / $pageSize);
	//总页数
	$startPage = ($curPage - 1) * 15;
	//分页查询起始页
	/*分页查询*/
	$pageSql = "select * from message where name = '{$msg}' order by time desc limit {$startPage},{$pageSize}";
	$pageResult = mysql_query($pageSql);
	if (!$pageResult) {
		echo '分页查询失败：' . mysql_error();
		exit();
	}
	/*封装信息*/
	$arr['curPage'] = $curPage;
	$arr['totalPage'] = $totalPage;
	$arr['sql'] = $pageSql;
	$arr['list'] = "";
	while ($row = mysql_fetch_array($pageResult)) {
		$arr['list'][] = array('name' => $row['name'], 'message' => $row['message'], 'time' => $row['time'], 'id' => $row['id'], 'title' => $row['title']);
	}
	if ($arr['list'] == "") {
		$arr['msg'] = '无留言！';
		echo json_encode($arr);
	} else {
		echo json_encode($arr);
	}

} elseif ($id == 3) {//删除指定的留言信息
	$num = $_GET['num'];
	//所要删除的留言信息在数据库中对应的id
	$sqlDel = "delete  from message where id={$num}";
	$result = mysql_query($sqlDel);
	if (!$result) {
		echo '删除失败!' . mysql_error();
		exit();
	}
	echo '删除成功！';
} elseif ($id == 4) {//查询详情
	$num = $_GET['num'];
	$sql = "select message from message where id = {$num}";
	$result = mysql_query($sql);
	if (!$result) {
		echo '查询失败：' . mysql_error();
		exit();
	}
	$message = mysql_result($result, 0);
	echo $message;
} elseif ($id == 5) {//回复留言
	$num = $_GET['num'];
	//所回复的留言对应的id
	$name = $_GET['name'];
	//留言所对应的昵称
	$ask = $_GET['message'];
	$time = date('Y-m-d');
	$sql = "insert message (ask,time,flag,name) values ('{$ask}','{$time}',{$num},'{$name}')";
	$result = mysql_query($sql);
	if (!$result) {
		echo '回复失败：' . mysql_error();
		exit();
	} else {
		echo '回复成功!';
	}
} elseif ($id == 6) {//显示回复留言的信息
	$sql = "select * from message where flag !=''";
	$result = mysql_query();
	if (!$result) {
		echo "查询失败：" . mysql_error();
	}
	$arr['list'] = '';
	while ($row = mysql_fetch_assoc($result)) {
		$arr['list'][] = array('title' => $row['title'], 'ask' => $row['ask']);
	}
	echo json_encode($arr);
} elseif ($id == 7) {//显示申请表
	$curPage = $_GET['page'];
	//当前页数
	$pageSize = 15;
	//每页显示条数
	/*获取记录总数*/
	$sqlTotal = "select * from joinus";
	$result = mysql_query($sqlTotal);
	$total = mysql_num_rows($result);
	//记录总数
	$totalPage = ceil($total / $pageSize);
	//总页数
	$startPage = ($curPage - 1) * 15;
	//分页查询起始页

	/*分页查询*/
	$pageSql = "select * from joinus order by time desc limit {$startPage},{$pageSize}";
	$pageResult = mysql_query($pageSql);
	if (!$pageResult) {
		echo '分页查询失败：' . mysql_error();
		exit();
	}
	/*封装信息*/
	$arr['curPage'] = $curPage;
	$arr['totalPage'] = $totalPage;
	$arr['list'] = '';

	while ($row = mysql_fetch_array($pageResult)) {
		$arr['list'][] = array('name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'qq' => $row['qq'], 'tel' => $row['tel'], 'hospital' => $row['hospital'], 'evaluate' => $row['evaluate'], 'reason' => $row['reason'], 'time' => $row['time'], 'id' => $row['id']);
	}
	echo json_encode($arr);
} elseif ($id == 8) {//按姓名查找申请记录
	$curPage = $_GET['page'];
	//当前页数
	$pageSize = 15;
	//每页显示条数
	$msg = $_GET['serch'];
	//搜索的姓名
	$sql = "select * from joinus where name='{$msg}'";
	$result = mysql_query($sql);
	if (!$result) {
		echo "查询失败：" . mysql_error();
	}
	/*获取记录总数*/
	$total = mysql_num_rows($result);
	//记录总数
	$totalPage = ceil($total / $pageSize);
	//总页数
	$startPage = ($curPage - 1) * 15;
	//分页查询起始页
	/*分页查询*/
	$pageSql = "select * from joinus where name = '{$msg}' order by time desc limit {$startPage},{$pageSize}";
	$pageResult = mysql_query($pageSql);
	if (!$pageResult) {
		echo '分页查询失败：' . mysql_error();
		exit();
	}
	/*封装信息*/
	$arr['curPage'] = $curPage;
	$arr['totalPage'] = $totalPage;
	$arr['sql'] = $pageSql;
	$arr['list'] = "";
	while ($row = mysql_fetch_array($pageResult)) {
		$arr['list'][] = array('name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'qq' => $row['qq'], 'tel' => $row['tel'], 'hospital' => $row['hospital'], 'evaluate' => $row['evaluate'], 'reason' => $row['reason'], 'time' => $row['time'], 'id' => $row['id']);
	}
	if ($arr['list'] == "") {
		$arr['msg'] = '无留言！';
		echo json_encode($arr);
	} else {
		echo json_encode($arr);
	}
}elseif($id == 9){//删除申请信息
	$num = $_GET['num'];
	$sql = "delete from joinus where id = {$num}";
	$result = mysql_query($sql);
	if(!$result){
		echo "删除失败:".mysql_error();
		exit();
	}else{
		echo "删除成功！";
	}
}elseif($id == 10){//查看申请详情
	$msg = $_GET['msg'];
	$sql = "select * from joinus where id = {$msg}";
	$result = mysql_query($sql);
	if(!$result){
		echo "查询失败：".mysql_error();
		exit();
	}
	$arr['list'] = '';
	while($row = mysql_fetch_array($result)){
		$arr['list'][] = array(
			'name' => $row['name'], 'sex' => $row['sex'], 'age' => $row['age'], 'qq' => $row['qq'], 'tel' => $row['tel'], 'hospital' => $row['hospital'], 'evaluate' => $row['evaluate'], 'reason' => $row['reason'], 'time' => $row['time'], 'id' => $row['id']
		);
	}
	echo json_encode($arr);
}elseif($id == 11){//普通用户查看留言回复
	$curPage = $_GET['page'];
	//当前页数
	$pageSize = 15;
	//每页显示条数
	$name = $_GET['name'];
	$sql = "select * from message where name='{$name}' && flag is null";
	$result = mysql_query($sql);
	if (!$result) {
		echo "查询失败：" . mysql_error();
	}
	/*获取记录总数*/
	$total = mysql_num_rows($result);
	//记录总数
	$totalPage = ceil($total / $pageSize);
	//总页数
	$startPage = ($curPage - 1) * 15;
	//分页查询起始页
	/*分页查询*/
	$pageSql = "select * from message where name = '{$name}' && flag is null order by time desc limit {$startPage},{$pageSize}";
	$pageResult = mysql_query($pageSql);
	if (!$pageResult) {
		echo '分页查询失败：' . mysql_error();
		exit();
	}
	/*封装信息*/
	$arr['curPage'] = $curPage;
	$arr['totalPage'] = $totalPage;
	$arr['list'] = "";
	while ($row = mysql_fetch_array($pageResult)) {
		$arr['list'][] = array(
		'name' => $row['name'],
		'message'=>$row['message'],
		'id' => $row['id'],
		'time'=>$row['time'],
		
		);
	}
	if ($arr['list'] == "") {
		$arr['msg'] = '无留言！';
		echo json_encode($arr);
	} else {
		echo json_encode($arr);
	}
}elseif($id == 12){//普通用户查看留言回复的详细信息
	$num = $_GET['num'];
	$sql = "select ask from message where flag = {$num}";
	$result = mysql_query($sql);
	if(!$result){
		echo "查询失败：".mysql_error();
		exit();
	}
	$arr['list'] = '';
	while($row = mysql_fetch_array($result)){
		$arr['list'][] = array(
			'ask'=>$row['ask']
		);
	}
	if($arr['list'] == ''){
		$arr['msg'] = '无回复内容！';
		echo json_encode($arr);
	}else{
		echo json_encode($arr);
	}
	
}
?>

