var total, curPage, totalPage, rank, value;
/*获取数据*/
function getData(page, rank) {
	$.ajax({
		type: "post",
		url: "../../management/php/teamList.php",
		async: true,
		data: {
			'rank': rank,
			'pageNum': page
		},
		success: function(data) {
			var json = JSON.parse(data);
			var list = json.list;
			var rank = json.rank;
			totalPage = json.totalPage;
			curPage = json.curPage;
			$('#rank').html(rank);
			$('#list').empty();
			var table = "";

			$.each(list, function(index, array) {

				table += '<tr bgcolor="#FFFFFF" align="center" class="az"><td>'+array['username']+'</td><td class="ad"><a href="'+array['img']+'" >查看</a></td></tr>';
			});
			$('#list').append(table);
		},
		complete: function() {
			getPageBar();
		},
		error: function(jqXHR) {
			alert(jqXHR.status);
		}
	});
}
/*获取分页条*/
function getPageBar() {
	//当前页大于总页
	if(curPage > totalPage) {
		curPage = totalPage;
	}
	//当前页小于1
	if(curPage < 1) {
		curPage = 1;
	}
	pageStr = '<td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="50%" class="dd">共<a href="javascript:;">'+totalPage+'</a> 页 | 第<a href="javascript:;">'+curPage+'</a> 页</td>';
	//当前页是首页
	if(curPage == 1) {
		pageStr += '<td width="49%" align="right" class="ee">[<span>首页</span> |<span>上一页</span> |';
	} else {
		pageStr += '<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jump(1)">首页</a> |<a href="javascript:;" onclick="jump(curPage-1)">上一页</a> |';
	}
	//当前页是尾页
	if(curPage == totalPage) {
		
		/*<a href="#">下一页</a> |<a href="#">末页</a>]</td><td></td><td></td></tr></table>*/
		
		pageStr += '<span>下一页</span> |<span>末页</span>]</td></tr></table>';
	} else {
		pageStr += '<a href="javascript:;" onclick="jump(parseInt(curPage)+1)">下一页</a> |<a href="javascript:;" onclick="jump(totalPage)">末页</a>]</tr></table></td>';
	}
	$('#pageBar').html(pageStr);

}

/*翻页*/
function jump(p) {
	value = $('.active').text();
	rank = value.substr(0, 4);
	if(p) {
		getData(p, rank);
	}
}

/*跳转页面*/
function turnPage() {
	var turnP = $('#turnP').val();
	getData(turnP);
}

/*初始化分页条*/
$(function() {
	value = $('.active').text();
	rank = value.substr(0, 4);
	getData(1, rank);
});

/*点击删除*/
/*function del(id, t) {
	var flag = confirm('确定要删除此数据？');
	if(flag) {
		$.ajax({
			type: 'GET',
			url: '../php/deleteTable.php?id=' + id,
			success: function(data) {
				alert(data);
			},
			error: function(msg) {
				alert(msg.status);
			},
			complete: function() {
				$(t).parent().parent().empty();
			}
		});
	}

}*/

function msg() {
	alert('暂未开放此功能！');
}

function log() {
	alert('请先登录！');
}