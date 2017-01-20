<?php 
include 'conn.php';
mysql_query('set names utf8');
/*显示留言信息*/

$id = $_GET['id'];
if($id == 1){
	 	$curPage = $_GET['page'];//当前页数
	 	$pageSize = 15;//每页显示条数
	 	/*获取记录总数*/
	 	$sqlTotal = "select * from message";
	 	$result = mysql_query($sqlTotal);
	 $total = mysql_num_rows($result);//记录总数
	 $totalPage = ceil($total/$pageSize);//总页数
	 $startPage = ($curPage-1)*15;//分页查询起始页

	 /*分页查询*/
	 $pageSql = "select * from message order by time desc limit {$startPage},{$pageSize}";
	 $pageResult = mysql_query($pageSql);
	 if(!$pageResult){
	 	echo '分页查询失败：'.mysql_error();
	 	exit();
	 }
	 /*封装信息*/
	 $arr['curPage'] = $curPage;
	 $arr['totalPage'] = $totalPage;
	 $arr['list'] = '';
	 while($row = mysql_fetch_array($pageResult)){
	 	$arr['list'][] = array(
	 		'name'=> $row['name'],
	 		'context' => $row['message'],
	 		'time' => $row['time']
	 		);
	 }
	 echo json_encode($arr);
	}elseif($id == 2){
		$curPage = $_GET['page'];//当前页数
	 	$pageSize = 15;//每页显示条数
		$msg = $_GET['serch'];//搜索的姓名
		$sql = "select * from message where name='{$msg}'";
		$result = mysql_query($sql);
		if(!$result){
			echo "查询失败：".mysql_error();
		}
		/*获取记录总数*/
		$total = mysql_num_rows($result);//记录总数
		 $totalPage = ceil($total/$pageSize);//总页数
		 $startPage = ($curPage-1)*15;//分页查询起始页
		 /*分页查询*/
		 $pageSql = "select * from message where name = '{$msg}' order by time desc limit {$startPage},{$pageSize}";
		 $pageResult = mysql_query($pageSql);
		 if(!$pageResult){
		 	echo '分页查询失败：'.mysql_error();
		 	exit();
		 }
		 /*封装信息*/
		 $arr['curPage'] = $curPage;
		 $arr['totalPage'] = $totalPage;
		 $arr['sql'] = $pageSql;
		 $arr['list'] = "";
		 while($row = mysql_fetch_array($pageResult)){
		 	$arr['list'][] = array(
		 		'name'=>$row['name'],
		 		'message'=>$row['message'],
		 		'time'=>$row['time'],
		 		'id'=>$row['id']
		 		);
		 }
		 if ($arr['list']=="") {
		 	$arr['msg'] = '无留言！';
		 	echo json_encode($arr);
		 }else{
		 	echo json_encode($arr);
		 }

		}



		?>	

