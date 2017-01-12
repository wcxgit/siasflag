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
			.$row['name'].
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
								'.$row['name'].'
							</a>
						</li>';
	}
}


mysql_close($con);
?>