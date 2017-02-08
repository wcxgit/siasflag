function submit(){
				$.ajax({
					type:"POST",
					url:"php/login.php",
					async:true,
					data:{
						"username":$('input[name=username]').val(),
						"pwd":$('input[type=password]').val(),
						"flag":$('input[type=radio]:checked').val()
					},
					success:function(data){
						if(data == "用户登录"){
							window.location.href="index.php";
						}else if(data == "管理员登录" || data == "超级管理员"){
							window.location.href="../management/html/index.php";
						}else{
							$('#err').html(data);
						}
					},
					error:function(jqXHR){
						alert(jqXHR.status);
					}
				});
			}
			function reset(){
				$('input[type=text]').val("");
				$('input[type=password]').val("");
			}
			function hide(){
				$('#err').html("");
			}