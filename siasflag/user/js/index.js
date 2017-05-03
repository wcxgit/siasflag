$(function() {
	$('#silder').imgSilder({
		s_width: '980', //容器宽度
		s_height: 390, //容器高度
		is_showTit: true, // 是否显示图片标题 false :不显示，true :显示
		s_times: 3000, //设置滚动时间
		css_link: 'css/index.css'
	});

});

function getTitleTime(listTitle, listTime) {
	location.href = 'file detail.php?listTitle=' + listTitle + '&listTime=' + listTime;
}

//填充校园活动
$.ajax({
	method: 'get',
	url: 'user/php/getFiles.php?id=1&r=' + Math.random(),
	success: function(data) {
		var json = JSON.parse(data);
		var list = json.list;
		var li = '';
		$.each(list, function(index, array) {
			if(array['url'] == '../user/file detail.php') {
				/*li += "<li><a href='javascript: ;' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'><img src='user/images/file_01.png'><p>&nbsp;&nbsp;标题：<span class='title'>" + array['title'] + "</span>&nbsp;&nbsp;&nbsp;</p><span >日期：<span class='time'>" + array['time'] + "</span></span></a></li>";*/

				li += "<li><a href='javascript:;' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'>" + array['title'] + "</a><span>" + array['time'] + "</span></li>";

			} else {
				li += "<li><a href='" + array['url'] + "' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'>" + array['title'] + "</a><span>" + array['time'] + "</span></li>";
			}
		});
		$('#xiaoyuan').html(li);
	},
	error: function(data) {
		alert(data.status);
	}
});
/*填充队内纪事*/
$.ajax({
	method: 'get',
	url: 'user/php/getFiles.php?id=2&r=' + Math.random(),
	success: function(data) {

		var json = JSON.parse(data);
		var list = json.list;
		li = '';
		$.each(list, function(index, array) {
			if(array['url'] == '../user/file detail.php') {
				li += "<li><a href='javascript:;' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'>" + array['title'] + "</a><span>" + array['time'] + "</span></li>";
			}else {
				li += "<li><a href='" + array['url'] + "' onclick='getTitleTime(\"" + array['title'] + "\",\"" + array['time'] + "\");'>" + array['title'] + "</a><span>" + array['time'] + "</span></li>";
			}
		});
		$('#duinei').html(li);

	},
	error: function(data) {

		alert(data.status);
	}
});

function msg() {
	alert('暂未开放此功能！');
}

function log() {
	alert('请先登录！');
}

function getTitleTime(listTitle, listTime) {
	location.href = 'user/file detail.php?listTitle=' + listTitle + '&listTime=' + listTime;
}