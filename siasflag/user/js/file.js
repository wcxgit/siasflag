var curPage = 1;
var total, pageSize, totalPage;
//获取分页数据
function getDate(page) {
	$.ajax({
		type: 'get',
		url: 'php/getFiles.php?id=3&r=' + Math.random() + '&pageNum=' + page,
		success: function(data) {
			var json = JSON.parse(data);
			$('#files').empty(); //清空内容区
			total = json.total; //总记录数
			pageSize = json.pageSize; //每页显示条数
			curPage = page; //当前页
			totalPage = json.totalPage; //总页数
			var li = ""; //用于存储查询出的数据
			var list = json.list;

			$.each(list, function(index, array) { //遍历数据
				if(array['url'] == 'user/file detail.php') {
					li += "<li><a href='javascript:;' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'><img src='images/file_01.png'><p>&nbsp;&nbsp;标题：<span class='title'>" + array['title'] + "</span>&nbsp;&nbsp;&nbsp;</p><span >日期：<span class='time'>" + array['time'] + "</span></span></a></li>";
				} else {
					li += "<li><a href='" + array['url'] + "' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'><img src='images/file_01.png'><p>&nbsp;&nbsp;标题：<span class='title'>" + array['title'] + "</span>&nbsp;&nbsp;&nbsp;</p><span >日期：<span class='time'>" + array['time'] + "</span></span></a></li>";
				}
			});
			/*			onclick="getTitleTime('"+array['title']+"');"
			 */
			$('#files').append(li);
		},
		complete: function() { //数据加载完成后生成分页条
			getPageBar();
		},
		error: function(data) {
			alert(data.status);
		}
	});
}

//获取分页条
function getPageBar() {
	var pageStr = ""; //存储页码条
	//当前页码大于总页码
	if(curPage > totalPage) {
		curPage = totalPage;
	}
	//当前页码小于1
	if(curPage < 1) {
		curPage = 1;
	}

	pageStr = "<li><span>共" + total + "条</span></li><li><span>第" + curPage + "页/共" + totalPage + "页</span></li>";
	//当前页是第一页
	if(curPage == 1) {
		pageStr += "<li><span>首页</span></li><li><span>上一页</span></li>";
	} else {
		pageStr += "<li><a href='javascript:;'  class='page' onclick='jump(1);'>首页</a></li><li><a href='javascript:;'  class='page' onclick='jump(curPage-1);'>上一页</a></li>";
	}
	//当前页是尾页
	if(curPage == totalPage) {
		pageStr += "<li><span>下一页</span></li><li><span>尾页</span></li>";
	} else {
		pageStr += "<li><a href='javascript:;'  class='page' onclick='jump(parseInt(curPage)+1);'>下一页</a></li><li><a href='javascript:;'  class='page' onclick='jump(totalPage);'>尾页</a></li>";
	}
	$('#page ul').html(pageStr);
}

$(function() {
	getDate(1); //起始第一页
});

function jump(ref) {
	if(ref) {
		getDate(ref);
	}
}

//获取链接的标题和时间
function getTitleTime(listTitle, listTime) {
	location.href = 'file detail.php?listTitle=' + listTitle + '&listTime=' + listTime;
	/*$('#con').empty();*/
	/*$.ajax({
		type:'GET',
		url:'file detail.php?listTitle='+listTitle+'&listTime='+listTime,
		
		success:function(data){
			$('#con').html(data[0]);
			
		},
		error:function(data){
			alert(data.status);
		},
		complete:function(){

		}
		
	});*/
}

function msg() {
	alert('暂未开放此功能！');
}

function log() {
	alert('请先登录！');
}