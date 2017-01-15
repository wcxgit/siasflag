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
			'time'=>$row['create_time']
			);
	}
	echo json_encode($arr);
	/*echo '<tr>
														<td height="22" colspan="4" align="center" class="ac">'.$rank.'级列表</td>
													</tr>
													<tr align="center" bgcolor="#EEEEEE">
														<td width="10%">用户名</td>
														<td width="10%">创建时间</td>
														<td width="12%">操作</td>
													</tr>';
	while($row = mysql_fetch_array($result)){
		echo '<tr bgcolor="#FFFFFF" align="center" class="az">
														
														<td>
															<a href="#" onclick=""></a>'.$row["name"].'</td>
														<td>'.$row["create_time"].'</td>
														<td class="ad">
															<a href="../html/alter.php">
																修改
															</a>｜
															<a href="#">
																删除
															</a></td>
													</tr>';
	}
	*/
	?>