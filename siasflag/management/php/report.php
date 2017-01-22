<?php
/*通讯管理*/
include 'conn.php';
mysql_query('set names utf8');
$id = $_POST['id'];
	if($id == 1){//添加通讯
		$qq = $_POST['qq'];
		$weibo = $_POST['weibo'];
		$wechat = $_POST['wechat'];

		$sql = "update report set qq = '{$qq}',weibo = '{$weibo}',wechat = '{$wechat}'";
		$result = mysql_query($sql,$con);
		if(!$result){
			echo "添加失败：".mysql_error();
		}else{
			echo '添加成功!';
		}
	}elseif ($id == 2) {//查询通讯方式	
		$sql = "select * from report";
		$result = mysql_query($sql);
		if(!$result){
			echo '查询失败！'.mysql_error();
		}
		$arr['list'] = '';
		while($row = mysql_fetch_array($result)){
			$arr['list'][] = array(
				'qq'=>$row['qq'],
				'weibo'=>$row['weibo'],
				'wechat'=>$row['wechat']
				);
		}
		echo json_encode($arr);

	}
	
	
	
	?>