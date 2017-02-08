$(function() {
		$('#silder').imgSilder({
		s_width: '980', //容器宽度
		s_height: 390, //容器高度
		is_showTit: true, // 是否显示图片标题 false :不显示，true :显示
		s_times: 3000, //设置滚动时间
		css_link: 'css/index.css'
	});
		
	});
	

//填充校园活动
$.ajax({
	method:'get',
	url:'php/getFiles.php?id=1&r='+Math.random(),
	success:function(data){
		$('#xiaoyuan').html(data);
	},
	error:function(data){
		alert (data.status);
	}
});
/*填充队内纪事*/
$.ajax({
	method:'get',
	url:'php/getFiles.php?id=2&r='+Math.random(),
	success:function(data){
		$('#duinei').html(data);
	},
	error:function(data){
		alert (data.status);
	}
});
function msg(){
	alert('暂未开放此功能！');
}
function log(){
	alert('请先登录！');
}
