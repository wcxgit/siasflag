<?php 
	/*删除表格指定行*/
	include 'conn.php';
	$id = $_GET['id'];
	$sql = "delete from team where id={$id}";
	$result = mysql_query($sql);
	if(!$result){
		echo '删除失败:'.mysql_error();
		exit();
	}
	echo "删除成功！";

 ?>