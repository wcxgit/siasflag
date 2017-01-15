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
	/*echo ' <div class="file">
	<ul id="files">';
		while($row = mysql_fetch_array($result)){
			echo ' <li><a href="../sias'.$row['url'].'"><img src="images/file_01.png"><p>&nbsp;&nbsp;标题：'.$row['title'].'&nbsp;&nbsp;&nbsp;</p><span>日期：'.$row['time'].'</span></a></li>';
		}
		echo '</ul></div>';
		echo '<div id="page">
		<ul>';
		echo '<ul>';*/
			/*if($p>1){
				echo '<li><a href="'$_SERVER["PHP_SELF"]'?'{$p-1}'"><</a></li>';
			}else{
				echo '<li><span><</span></li>';
			}*/
			/*<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">></a></li>*/
		/*echo '</ul>';
		echo '</ul></div>';


		echo '<ul>
		<li><a href="#"><</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#">6</a></li>
		<li><a href="#">></a></li>
	</ul></div>';*/




	/*$files = mysql_query($sql);
	if(!$files){
		echo "查询出错：".mysql_error();
	}
	while($row = mysql_fetch_array($files)){
		echo ' <li><a href="../sias'.$row['url'].'"><img src="images/file_01.png"><p>&nbsp;&nbsp;标题：'.$row['title'].'&nbsp;&nbsp;&nbsp;</p><span>日期：'.$row['time'].'</span></a></li>';
	}*/
}


mysql_close($con);
?>