<?php
/*首页文件列表的获取*/
error_reporting(0);
include 'DBconnect.php';
$id = $_GET['id'];
//获取校园活动
if($id==1){
	$sql = "select * from file where flag=1 order by time desc limit 0,14";
	$xiaoyuan = mysql_query($sql,$con);
	if(!$xiaoyuan){
		echo '查询出错：'.mysql_error();
	}
	$arr['list'] = '';
	
	while($row = mysql_fetch_array($xiaoyuan)){
		$arr['list'][] = array(
			'url'=>$row['url'],
			'title'=>$row['title'],
			'time'=>$row['time']
		);
	}	
	echo json_encode($arr);
}elseif($id == 2){//获取队内纪事
	$sql2= "select * from file where flag = 2 order by time desc limit 0,6";
	$duinei = mysql_query($sql2,$con);
	if(!$duinei){
		echo "查询出错：".mysql_error();
	}
	$arr['list'] = '';
	while($row=mysql_fetch_array($duinei)){
		$arr['list'][] = array(
			'url'=>$row['url'],
			'title'=>$row['title'],
			'time'=>$row['time']
		);
		
		
}
	echo json_encode($arr);
}elseif($id == 3){//分页获取全部内容
	$page = $_GET['pageNum'];//起始页

	//获取数据总数
	$sqlTotal = "select * from file";

	$total = mysql_num_rows(mysql_query($sqlTotal));

	$pageSize = 15;//每页显示条数
	$pageStart = ($page-1)*$pageSize;//页起始位置
	$totalPage = ceil($total/$pageSize);//总页数

	//封装数据
	$arr['total'] = $total;
	$arr['pageSize'] = $pageSize;
	$arr['totalPage'] = $totalPage;
	//查询分页
	$sql = "select * from file order by time desc limit {$pageStart},{$pageSize}";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询失败：'.mysql_error();
	}
	while($row = mysql_fetch_array($result)){
		$arr['list'][] = array(
			'url'=>$row['url'],
			'title'=>$row['title'],
			'time'=>$row['time']
			);
	}
	echo json_encode($arr);
}elseif($id==4){//点击链接获取file detail内容
	$title = $_GET['listTitle'];//点击文件的标题
	$time = $_GET['listTime'];//点击文件的创建时间
	$sql = "select text from file where title='{$title}'&&time='{$time}'";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询文档失败：'.mysql_error();
		exit();
	}
	$row = mysql_fetch_row($result);
	if(!$row){
		echo '出错啦：'.mysql_error();
		exit();
	}
	echo $row[0];

}elseif($id == 5){//获取联系我们内容
	$sql = "select * from report";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询失败：'.mysql_error();
		exit();
	}
	$arr['list'] = '';
	while ( $row = mysql_fetch_array($result)) {
		$arr['list'][] = array(
			'qq'=>$row['qq'],
			'weibo'=>$row['weibo'],
			'wechat'=>$row['wechat']
			);
	}
	echo json_encode($arr);
}elseif($id == 6){//获取视频内容
	$page = $_GET['pageNum'];//起始页
	//获取数据总数
	$sqlTotal = "select * from media";
	$total = mysql_num_rows(mysql_query($sqlTotal));
	$pageSize = 15;//每页显示条数
	$pageStart = ($page-1)*$pageSize;//页起始位置
	$totalPage = ceil($total/$pageSize);//总页数
	//封装数据
	$arr['total'] = $total;
	$arr['pageSize'] = $pageSize;
	$arr['totalPage'] = $totalPage;
	//查询分页
	$sql = "select * from media order by time desc limit {$pageStart},{$pageSize}";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询失败：'.mysql_error();
	}
	while($row = mysql_fetch_array($result)){
		$arr['list'][] = array(
			'url'=>$row['url'],
			'title'=>$row['title'],
			'time'=>$row['time']
			);
	}
	echo json_encode($arr);

}elseif($id == 7){
	$sql = "select * from file where flag = 3";
	$result = mysql_query($sql);
	if(!$result){
		echo "查询出错：".mysql_error();
		exit();
	}
	$row = mysql_fetch_array($result);
	echo $row['text'];
}elseif($id == 8){
	$sql = "select * from file where flag = 3";
	$result = mysql_query($sql);
	if(!$result){
		echo "查询失败：".mysql_error();
		exit();
	}
	$row = mysql_fetch_array($result);
	echo $row['text'];
}elseif($id == 9){//获取照片墙数据
	$page = $_GET['pageNum'];//起始页
	$rank = $_GET['rank'];//级别
	//获取数据总数
	$sqlTotal = "select * from team where rank = {$rank}";

	$total = mysql_num_rows(mysql_query($sqlTotal));

	$pageSize = 6;//每页显示条数
	$pageStart = ($page-1)*$pageSize;//页起始位置
	$totalPage = ceil($total/$pageSize);//总页数

	//封装数据
	$arr['total'] = $total;
	$arr['pageSize'] = $pageSize;
	$arr['totalPage'] = $totalPage;
	//查询分页
	$sql = "select * from team where rank = {$rank} order by name desc limit {$pageStart},{$pageSize}";
	$result = mysql_query($sql);
	if(!$result){
		echo '查询失败：'.mysql_error();
	}
	while($row = mysql_fetch_array($result)){
		$arr['list'][] = array(
			'photo'=>$row['photo'],
			'name'=>$row['name']
			);
	}
	echo json_encode($arr);
}



mysql_close($con);
?>