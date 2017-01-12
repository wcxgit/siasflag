<?php
/*首页文件列表的获取*/
error_reporting(0);
include 'DBconnect.php';
//获取校园活动
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

mysql_close($con);
?>