<?php
include 'conn.php';
$rank = $_POST['rank'];
	$page = $_POST['pageNum'];//当前页
	mysql_query('set names utf8');
	//查询数据总条数
	$sql = "select * from team where rank ='$rank' ";
	$result = mysql_query($sql,$con);
	if(!$result){
		echo "查询出错:".mysql_error();
		exit();
	}
	
	$total = mysql_num_rows($result);//数据总数
	$pageSize = 15;//每页显示条数
	$totalPage = ceil($total/$pageSize);//总页数
	$startPage = ($page-1)*$pageSize;//起始页

	$sqlPage = "select * from team where rank={$rank} order by name desc  limit {$startPage},{$pageSize} ";
	$pageSql = mysql_query($sqlPage);
	if(!$pageSql){
		echo "分页查询失败：".mysql_error();
		exit();
	} 
	/*封装数据*/
	$arr['total'] = $total;
	$arr['totalPage']= $totalPage;
	$arr['curPage'] = $page;//当前页
	$arr['rank'] = $rank;
	$arr['list'] = "";
	while ($row = mysql_fetch_assoc($pageSql)) {
		$arr['list'][] = array(
			'username'=>$row['name'],
			'time'=>$row['create_time'],
			'id'=>$row['id']
			);
	}
	echo json_encode($arr);
	?>