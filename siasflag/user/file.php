<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>文件列表</title>
	<link rel="stylesheet" type="text/css" href="css/file.css">
	<script src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		var curPage = 1;
		var total,pageSize,totalPage;
//获取分页数据
function getDate(page){
	$.ajax({
		type:'get',
		url:'php/getFiles.php?id=3&r='+Math.random()+'&pageNum='+page,
		success:function(data){
			var json = JSON.parse(data);
			$('#files').empty();//清空内容区
			 total = json.total;//总记录数
			 pageSize = json.pageSize;//每页显示条数
			curPage = page;//当前页
			 totalPage = json.totalPage;//总页数
			var li = "";//用于存储查询出的数据
			var list = json.list;

			$.each(list,function(index,array){//遍历数据
				li+="<li><a href='../sias"+array['url']+"'><img src='images/file_01.png'><p>&nbsp;&nbsp;标题："+array['title']+"&nbsp;&nbsp;&nbsp;</p><span>日期："+array['time']+"</span></a></li>";
			});
			
			$('#files').append(li);
		},
		complete:function(){//数据加载完成后生成分页条
			getPageBar();
		},
		error:function(data){
			alert(data.status);
		}
	});
}

//获取分页条
function getPageBar(){
	var pageStr = "";//存储页码条
	//当前页码大于总页码
	if(curPage>totalPage){
		curPage = totalPage;
	}
	//当前页码小于1
	if(curPage<1){
		curPage=1;
	}

	pageStr="<li><span>共"+total+"条</span></li><li><span>第"+curPage+"页/共"+totalPage+"页</span></li>";
	//当前页是第一页
	if(curPage == 1){
		pageStr+="<li><span>首页</span></li><li><span>上一页</span></li>";
	}else{
		pageStr+="<li><a href='javascript:;'  class='page' onclick='jump(1);'>首页</a></li><li><a href='javascript:;'  class='page' onclick='jump(curPage-1);'>上一页</a></li>";
	}
	//当前页是尾页
	if(curPage == totalPage){
		pageStr+="<li><span>下一页</span></li><li><span>尾页</span></li>";
	}else{
		pageStr+="<li><a href='javascript:;'  class='page' onclick='jump(parseInt(curPage)+1);'>下一页</a></li><li><a href='javascript:;'  class='page' onclick='jump(totalPage);'>尾页</a></li>";
	}
	$('#page ul').html(pageStr);
}

$(function(){
	getDate(1);//起始第一页
});
function jump(ref){
	if(ref){
		getDate(ref);
	}
}
</script>
</head>

<body>
	<a name="top"></a>
	<div id="header">
		<h1><a href="index.html"><img src="images/logo.png"></a></h1>
		<ul>
			<?php 
			if(!$_SESSION["user"]){  
				echo "<ul>
				<li>
					<a href='login.html'>登录</a>
				</li>
				|
				<li>
					<a href='register.html'>注册</a>
				</li>
			</ul>";
		}else{
			echo "<ul>
			<li><a href='javascript:;' style='color:#048ac7;'>欢迎你：".$_SESSION["user"]." </a></li>
			<li><a href='php/loginOut.php'>退出登录</li>
		</ul>";
	}
	?>
</ul>
</div>
<div id="nav">
	<ul>
		<li><a href="index.php">网站首页</a></li>
		<li><a href="about.php">部门介绍</a></li>
		<li><a href="depShow.php">荣誉展示</a></li>
		<li><a href="file.php">文件列表</a></li>
		<li><a href="picture.php">照片墙</a></li>
		<?php
		if ($_SESSION['on-off']) {
			echo '<li>
			<a href="come.php">加入我们</a>
		</li>';
	}else{
		echo '<li>
		<a href="javascript:;" onclick="msg();">加入我们</a>
	</li>';
}
?>
<?php
if(!$_SESSION[user]){
	echo '<li><a href="javascript:;">留言板</a></li>';
}else{
	echo  '<li><a href="message.php">留言板</a></li>';
}
?>
</ul>
</div>
<div id="con">
	<div class="file">
		<ul id="files">'
		</ul>
	</div>
	<div id="page">
		<ul>
		</ul>
	</div>
</div>
<div id="footer">
	<p>电话：010-12348888　传真：010-88666666　客服电话：400-0809-560<br />
		西亚斯国旗护卫队网站（新郑市）xxxx 版权所有 豫ICP备11112222号</p>
		<h3><a href="#top">top</a></h3>
		<div class="link">
			<a href="#">网站首页</a>
			<span>|</span>
			<a href="#">部门介绍</a>
			<span>|</span>
			<a href="#">荣誉展示</a>
			<span>|</span>
			<a href="#">文件列表</a>
			<span>|</span>
			<a href="#">照片墙</a>
			<span>|</span>
			<a href="#">在队人员</a>
			<span>|</span>
			<a href="#">留言板</a>
			<span>|</span>
			<a href="#">关于我们</a>
		</div>
	</div>
</body>
</html>
