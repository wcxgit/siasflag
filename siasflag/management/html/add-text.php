<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  session_start();
	error_reporting(0);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<title>添加文本</title>

		<link href="../css/add video.css" rel="stylesheet" type="text/css"/>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript">
			function getValue(){
				var val = $('.sel option:selected').val();
				if(val == 3){
					$.ajax({
						type:"get",
						url:"../../user/php/getFiles.php?id=8",
						async:true,
						success:function(data){
							$('#editor_id').html(data);
						},
						error:function(msg){
							alert(msg.status);
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
											if ($_SESSION["admin"]) {
												echo "<td class='left1'>欢迎你，<span>" . $_SESSION["admin"] . "</span></td>";
											} elseif ($_SESSION['super']) {
												echo "<td class='left1'>欢迎你，<span>" . $_SESSION["super"] . "</span></td>";
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

		<form action="../php/fileUpdate.php" method="post" id="upload">

			<fieldset>
				<legend>
					文本添加
				</legend>

				<tr>
					<label for="name">文本标题：</label>
					<input id="name" type="text" name="title" required style="margin-bottom: 20px;">
					<select class="sel" name="sel[]" onclick="getValue();">
						<option value="1">校内活动</option>
						<option value="2">队内纪事</option>
						<option value="3">申请须知</option>
					</select>
				</tr>
				<br>
				<tr>
					<textarea id="editor_id" name="text" style="width:700px;height:300px;">
							
						</textarea>
				</tr>
				</br>
				<tr>
					<td colspan="2" height="40px">
						<input class="bc" type="submit" name="Submit" value="添加" class="button" />
						<input type="reset" name="Submit2" value="重置" class="button" />
						(提交快捷键: Ctrl + Enter) </td>
				</tr>
			</fieldset>

		</form>

		<script src="../kindeditor-4.1.10/kindeditor.js"></script>
		<script src="../kindeditor-4.1.10/lang/zh_CN.js"></script>
		<script src="../kindeditor-4.1.10/plugins/code/prettify.js" type="text/javascript" charset="utf-8"></script>
		<script>KindEditor.ready(function(K) {
	window.editor = K.create('#editor_id', {
		autoHeightMode: true,
		cssPath: '../kindeditor-4.1.10/plugins/code/prettify.css',
		uploadJson: '../php/kindeditor/upload_json.php',
		fileManagerJson: '../php/kindeditor/file_manager_json.php',
		allowFileManager: true,
		afterCreate: function() {
			var self = this;
			this.loadPlugin('autoheight');
			K.ctrl(document, 13, function() {
				self.sync();
				K('#upload').submit();
			});
			K.ctrl(self.edit.doc, 13, function() {
				self.sync();
				K('#upload').submit();
			});
			/*K.ajax('../php/kindeditor/upload_json.php', function(data) {
			console.log(data);
			}, 'POST', {
			'content': document.getElementById('editor_id').value,

			});*/
		}
	});
	prettyPrint();

});</script>
	</body>

</html>

