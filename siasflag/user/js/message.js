/*获取需要填充的数据*/
$(function(){
	var name = $('#username').val();
	$.ajax({
		type:'POST',
		url:'php/application.php',
		data:{
			"username":name,
			"id":1	
		},
		success:function(data){
			var json = JSON.parse(data);
			$('#mail').val(json.mail);
			$('#phone').val(json.tel);
		},
		error:function(msg){
			alert(msg.status);
		}
	});
});
/*清空*/
function reset(){
	$('#title').val('');
	$('#context').val('');
}
/*提交数据*/
function submit(){
	var name = $('#username').val();
	var mail = $('#mail').val();
	var tel = $('#phone').val();
	var title = $('#title').val();
	var context = $('#context').val();
	$.ajax({
		type:'POST',
		url:'php/application.php',
		data:{
			"id":3,
			"name":name,
			"mail":mail,
			"tel":tel,
			"title":title,
			"context":context
		},
		success:function(data){
			alert(data);
		},
		error:function(msg){
			alert(msg.status);
		}
	});
}
function msg(){
	alert('暂未开放此功能！');
}
function log(){
	alert('请先登录！');
}