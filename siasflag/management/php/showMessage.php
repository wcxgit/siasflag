<?php 
include 'conn.php';
mysql_query('set names utf8');
/*显示留言信息*/

$id = $_GET['id'];
if($id == 1){//获取所有留言信息
	 	$curPage = $_GET['page'];//当前页数
	 	$pageSize = 15;//每页显示条数
	 	/*获取记录总数*/
	 	$sqlTotal = "select * from message";
	 	$result = mysql_query($sqlTotal);
	 $total = mysql_num_rows($result);//记录总数
	 $totalPage = ceil($total/$pageSize);//总页数
	 $startPage = ($curPage-1)*15;//分页查询起始页

	 /*分页查询*/
	 $pageSql = "select * from message where isNull(flag) order by time desc limit {$startPage},{$pageSize}";
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
	 		'time' => $row['time'],
	 		'id'=>$row['id'],
	 		'title'=>$row['title']
	 		);
	 }
	 echo json_encode($arr);
	}elseif($id == 2){//获取所搜索的留言信息
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
		 		'id'=>$row['id'],
		 		'title'=>$row['title']
		 		);
		 }
		 if ($arr['list']=="") {
		 	$arr['msg'] = '无留言！';
		 	echo json_encode($arr);
		 }else{
		 	echo json_encode($arr);
		 }

		}elseif($id==3){//删除指定的留言信息
			$num = $_GET['num'];//所要删除的留言信息在数据库中对应的id
			$sqlDel = "delete  from message where id={$num}";
			$result = mysql_query($sqlDel);
			if(!$result){
				echo '删除失败!'.mysql_error();
				exit();
			}
			echo '删除成功！';
		}elseif($id == 4){//查询详情
			$num = $_GET['num'];
			$sql= "select message from message where id = {$num}";
			$result = mysql_query($sql);
			if(!$result){
				echo '查询失败：'.mysql_error();
				exit();
			}
			$message = mysql_result($result,0);
			echo $message;
		}elseif($id == 5){//回复留言
			$num = $_GET['num'];//所回复的留言对应的id
			$ask = $_GET['message'];
			$time = date('Y-m-d');
			$sql = "insert message (ask,time,flag) values ('{$ask}','{$time}',{$num})";
			$result = mysql_query($sql);
			if(!$result){
				echo '回复失败：'.mysql_error();
				exit();
			}else{
				echo '回复成功!';
			}
		}elseif($id == 6){//显示回复留言的信息
			$sql = "select * from message where flag !=''";
			$result = mysql_query();
			if(!$result){
				echo "查询失败：".mysql_error();
			}
			$arr['list'] = '';
			while($row = mysql_fetch_assoc($result)){
				$arr['list'][] = array(
					'title' => $row['title'],
					'ask' => $row['ask']
					);
			}
			echo json_encode($arr);
		}



		?>	

