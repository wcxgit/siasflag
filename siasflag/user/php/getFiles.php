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
	$sql = "select * from file";
	$files = mysql_query($sql);
	if(!$files){
		echo "查询出错：".mysql_error();
	}
	while($row = mysql_fetch_array($files)){
		echo ' <li><a href="../sias'.$row['url'].'"><img src="images/file_01.png"><p>&nbsp;&nbsp;标题：'.$row['title'].'&nbsp;&nbsp;&nbsp;</p><span>日期：'.$row['time'].'</span></a></li>';
	}
}


mysql_close($con);
?>