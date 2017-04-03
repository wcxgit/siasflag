
$('#user').focus();
			//输入框获取焦点时，清空输入框后的内容
			function hideUser() {
				$('#err_username').html('');
				$('#rig_username').html('');
			}

			function hideTel() {
				$('#err_tel').html('');
				$('#rig_tel').html('');
			}

			/*function hideMail() {
				$('#err_mail').html('');
				$('#rig_mail').html('');
			}*/

			function hidePwd() {
				$('#err_pwd').html('');
				$('#rig_pwd').html('');
			}

			function hideRePwd() {
				$('#err_repwd').html('');
				$('#rig_repwd').html('');
			}

			//检验用户名填写长度
			function chkusername() {
				var username = $('#user').val();
				$.ajax({
					type:"POST",
					url:"php/register.php",
					data:{
						'id':2,
						"username":username
					},
					success:function(data){
						if(data == "用户名已被注册!"){
							/*$("#err_username").html(data);*/
							alert(data);
						}
						return false;
					}
				});
				if(username.length == 0) {
					document.getElementById("err_username").innerHTML = "用户名不能为空！";
					document.getElementById("err_username").style.color = "#FF0";
					return false;
				} 

				return true;

			}

			//检验密码长度
			function chkpwd() {
				var pwd = $.trim($('#pwd').val()).toString();
				if(pwd.length == 0) {
					$('#err_pwd').html("密码不能为空！");
					$('#err_pwd').color = "#FF0";
					return false;
				} else if(pwd.length > 15 || pwd.length < 6) {
					$('#err_pwd').html("密码过短或过长!");
					$("#err_pwd").color = "#FF0";
					return false;
				}
				$('#err_pwd').html("");
				return true;
			}

			//验证电话是否合法
			function chktel() {
				var tel = $('#tel').val();
				$.ajax ({
					type:"POST",
					url:"php/register.php",
					data:{
						'id':1,
						"tel":tel
					},
					success:function(data){
						if(data == "电话号码已被注册!") {
							alert(data);
						}
						return false;
					}
				});
				if(tel == '' || !(/^1[34578]\d{9}$/.test(tel))) {
					$('#err_tel').html("格式错误！");
					return false;
				}
				return true;
			}
			//验证邮箱是否合法
			/*function chkmail() {
				var mail = $.trim($('#mail').val());
				var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
				if(mail == '') {
					$('#err_mail').html('邮箱不能为空！');
					return false;
				} else if(!(isEmail.test(mail))) {
					$('#err_mail').html('格式错误！');
					return false;
				}
				$.ajax({
					type:"POST",
					url:"php/register.php",
					data:{
						"mail":mail
					},
					success:function(data){
						if(data == "邮箱已被注册!"){
							alert(data);
						}
						return false;
					}
				});
				return true;
			}*/
			//检验两次密码是否一致
			function chkrepwd() {
				var pwd = $('#pwd').val();
				var repwd = $('#repwd').val();
				if(pwd == ""){
					$('#err_pwd').html("密码不能为空！");
					return false;
				}

				if(pwd != repwd) {
					document.getElementById("err_repwd").innerHTML = "两次密码输入不一致，请重新输入！";
					document.getElementById("err_repwd").style.color = "#FF0";

					$('#pwd').focus();
					return false;
				}

				return true;

			}
			//点击重置按钮
			function reset() {
				$('#user').val('');
				$('#tel').val('');
/*				$('#mail').val('');
*/				$('#pwd').val('');
				$('#repwd').val('');
			}

			//点击“立即注册”图片的时候检验各必填项是否都填写正确并获取填写项内容并输出，之后提交注册表单
			function submit() {
				/*alert(chkusername());
				alert(chktel());
				alert(chkpwd());
				alert(chkrepwd());*/
				if(chkusername() && chktel() /*&& chkmail()*/ && chkpwd() && chkrepwd()) {
					var user = $('#user').val();
					var tel = $('#tel').val();
					/*var mail = $('#mail').val();*/
					var pwd = $('#pwd').val();
					var repwd = $('#repwd').val();
					var sex = $('input[type=radio]:checked').val();
					$.ajax({
						url: "php/register.php",
						type: "POST",
						data: {
							'id':3,
							"username": user,
							"tel": tel,
						/*	"mail": mail,*/
							"pwd": pwd,
							"repwd": repwd,
							"sex":sex
						},
						error: function(jqXHR) {
							alert(jqXHR.status);
						},
						complete:function(){
							alert('注册成功,点击确定跳转到主页！');
							window.location.href="../../index.php";

						}
					});
				}else{
					alert('请核查信息是否正确，完整！');
				}
			}