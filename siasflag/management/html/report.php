<!--通讯管理-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>通讯管理</title>
	<link href="../css/report.css" rel="stylesheet" type="text/css"/>
	<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
	$(function(){
$.ajax({
				type:'POST',
				url:"../php/report.php",
				data:{
					'id':2,
				},
				success:function(data){
					var json = JSON.parse(data);
					var list = json.list[0];
					var qq = list.qq;
					var weibo = list.weibo;
					var wechat = list.wechat;
					$('input[name=qq]').val(qq);
					$('input[name=weibo]').val(weibo);
					$('input[name=wechat]').val(wechat);
				},
				error:function(jqXHR){
					console.log(jqXHR.status);
				}
			});	
	});
		function hide(){
			$('#msg').html('');
		}
		function link(){
			var qq = $('input[name=qq]').val();
			var weibo = $('input[name=weibo]').val();
			var wechat = $('input[name=wechat]').val();
			if(qq == ''||weibo == ''||wechat ==  ''){
				$('#msg').html('数据填写不完整！');
			}else{
				$.ajax({
					type:"post",
					url:"../php/report.php",
					async:true,
					data:{
						'id':1,
						'qq':qq,
						'weibo':weibo,
						'wechat':wechat
					},
					success:function(data){
						$('#msg').html(data);
					},
					error:function(jqXHR){
						console.log(jqXHR.status);
					}
				});
			}

		}
	</script>
</head>
<body>
	<div id="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="30">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="62">
								<table align="right" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td rowspan="2" width="25%">
											<img src="../img/ico02.gif" width="35" height="35"/>
										</td>
										<?php
										if ($_SESSION["Passed"]) {
											echo "<td class='left1'>欢迎你，<span>" . $_SESSION["user"] . "</span></td>";
										}
										?>
									</tr>
									<tr>
										<td width="55%" height="22" class="left2">
											<a href="../php/loginout.php">
												[退出]
											</a></td>
										</tr>
									</table></td>
								</tr>
							</table></td>
						</tr>
					</table>
				</div>
			</br>
			<form>
				<fieldset>
					<legend>
						通讯管理
					</legend>
					<table width="90%" border="0" cellpadding="2" cellspacing="0" align="center">
						<tr>
							<td height="20"></td>
						</tr>

						<tr height="40">
							<td width="35%" class="aa">QQ群：
								<input type="text" name="qq" required="required" onblur="hide();"/>
								<span class="red"> *</span></td>
								<td width="40%" class="aa">官方微博：
									<input type="text" name="weibo" required="required" onblur="hide();">
									<span class="red"> *</span></td>
									<td width="100%" class="aa">微信公众号：
										<input type="text" name="wechat" required="required" onblur="hide();">
										<span class="red"> *</span></td>
									</tr>
									<tr>
										<td>
											<span id="msg">

											</span>
										</td>
										<td colspan="2" height="40px">
											<input class="bc" type="button" name="Submit" value="添加" class="button" onclick="link();"/>
											<input type="reset" name="Submit2" value="重置" class="button" />
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
					</body>

					</html>

