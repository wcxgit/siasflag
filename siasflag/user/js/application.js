$(function(){
	var name = $('#username').html();
			//获取用户信息并填充到相应位置
			$.ajax({
				type:"POST",
				url:'php/application.php',
				data:{
					"username":name,
					"id":1
				},
				success:function(data){
					//解析json数据
					var json = JSON.parse(data);
					var sex = json.sex;
					var username = json.username;
					var tel = json.tel;
					$('#sex').val(sex);
					$('#name').val(username);
					$('#tel').val(tel);
				},
				error:function(data){
					alert(data.status);
				}
			});
		});
			//清空信息
			function reset(){
				$('input[type=text]').val('');
				$('textarea').val('');
			}
			//隐藏错误信息
			function hide(){
				$('#errAge').html('');
				$('#msg').html('');
			}
			function msg(){
				alert('暂未开放此功能！');
			}
			function log(){
				alert('请想登录！');
			}
			//提交信息
			function submit(){
				var name = $('#name').val();
				var sex = $('#sex').val();
				var age = $('#age').val();
				var qq = $('#qq').val();
				var tel = $('#tel').val();
				var hospital = $('#hospital').val();
				var evaluate = $('#evaluate').val();
				var reason = $('#reason').val();
				if(name!=''&& sex!=''&&age!=''&&qq!=''&&tel!=''&&tel!=''&&hospital!=''&&evaluate!=''&&reason!=''){
					if(age>99){
						$('#errAge').html('请填写真实年龄！')
					}else{
						$.ajax({
							type:'post',
							url:'php/application.php',
							data:{
								"name":name,
								"sex":sex,
								"age":age,
								"qq":qq,
								"tel":tel,
								"hospital":hospital,
								"evaluate":evaluate,
								"reason":reason,
								"id":2
							},
							success:function(data){
								alert(data);
							},
							error:function(data){
								alert(data.status);
							}
						});
					}
					
				}else{
					$('#msg').html('信息填写不完整！');
				}
				
			}

			function msg(){
				alert('暂未开放此功能！');
			}
			function log(){
				alert('请先登录！');
			}