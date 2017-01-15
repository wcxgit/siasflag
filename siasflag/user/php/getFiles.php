<?php
/*首页文件列表的获取*/
error_reporting(0);
include 'DBconnect.php';
$id = $_GET['id'];
//获取校园活动
if($id==1){
	$sql = "select * from file where flag=1";
	$xiaoyuan = mysql_query($sql,$con);
	if(!$xiaoyuan){
		echo '查询出错：'.mysql_error();
	}
	while($row = mysql_fetch_array($xiaoyuan)){
		echo '<li>
		<a href="../sias'.$row['url'].'">'
			.$row['title'].
			'</a><span>'.$row['time'].'</span>
		</li>';
	}
}
if($id == 2){
	$sql2= "select * from file where flag = 2";
	$duinei = mysql_query($sql2,$con);
	if(!$duinei){
		echo "查询出错：".mysql_error();
	}
	while($row=mysql_fetch_array($duinei)){
		echo '<li>
		<a href="../sias'.$row['url'].'">
			'.$row['title'].'
		</a>
	</li>';
}
}
if($id == 3){
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
}

if($id==4){
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

}


mysql_close($con);
?>