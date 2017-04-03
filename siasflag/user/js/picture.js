var curPage = 1;
var total, pageSize, totalPage;
var rank = "";
var value = "";
function getDate(page,rank){
	$.ajax({
		type: 'get',
		url: 'php/getFiles.php?id=9&r=' + Math.random() + '&pageNum=' + page+'&rank='+rank,
		async: true,
		success: function(data) {
			var json = JSON.parse(data);
			$('.yq').empty();
			var list = json.list;
			total = json.total; //总记录数
			pageSize = json.pageSize; //每页显示条数
			curPage = page; //当前页
			totalPage = json.totalPage; //总页数
			var li = ""; //用于存储查询出的数据
			
			$.each(list, function(index,array) {
				li += '<div class="cell_1"><a href="'+array["photo"]+'"><img src="'+array["photo"]+
				'" width="200" ></a><p><span>姓名:</span>'+array["name"]+'</p></div>';
			});
			$('.yq').append(li);
		},
		complete: function() { //数据加载完成后生成分页条
			getPageBar();
		},
		error: function(msg) {
			alert(msg.status);
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
	pageStr = "<li><span>共" + total + "条</span></li><li><span>第" + curPage + "页/共" + totalPage +
	 "页</span></li>";
	//当前页是第一页
	if(curPage == 1) {
		pageStr += "<li><span>首页</span></li><li><span>上一页</span></li>";
	} else {
		pageStr += "<li><a href='javascript:;'  class='page' onclick='jump(1);'>首页</a></li><li>"+
		"<a href='javascript:;'  class='page' onclick='jump(curPage-1);'>上一页</a></li>";
	}
	//当前页是尾页
	if(curPage == totalPage) {
		pageStr += "<li><span>下一页</span></li><li><span>尾页</span></li>";
	} else {
		pageStr += "<li><a href='javascript:;'  class='page' onclick='jump(parseInt(curPage)+1);'>"+
	"下一页</a></li><li><a href='javascript:;'  class='page' onclick='jump(totalPage);'>尾页</a></li>";
	}
	$('#page ul').html(pageStr);
}

$(function() {
	value = $('.active').text();
	rank = value.substr(0, 4);
	getDate(1,rank); //起始第一页
});

function jump(ref) {
	value =$('.active').text();
	rank = value.substr(0, 4);
	if(ref) {
		getDate(ref,rank);
	}
}
function msg() {
	alert('暂未开放此功能！');
}

function log() {
	alert('请先登录！');
}