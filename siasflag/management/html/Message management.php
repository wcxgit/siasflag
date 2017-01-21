<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
error_reporting(0);?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>留言列表</title>
	<link href="../css/Message management.css" rel="stylesheet" type="text/css" />
	<script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var	totalPage,curPage;
		/*从第一页开始*/
		$(function(){
			getContext(1);
		});
		/*分页显示*/
		function getContext(page){
			$('#list').empty(); 
			$.ajax({
				type:'GET',
				url:'../php/showMessage.php?id=1&page='+page,
				success:function (data) {
					//除去后面多余的花括号
					/*var len = data.length;
					var d = data.substring(0,len-3);*/

					var json = JSON.parse(data);
					var context = json.context;
					var time = json.time;
					var list = json.list;
					var sql = json.sql;
					totalPage = json.totalPage;
					curPage =json.curPage;
					var dataStr = '';
					var id = json.id;
					dataStr = '<tr><td height="22" colspan="4" align="center" class="ac">留言列表</td></tr><tr align="center" bgcolor="#EEEEEE"><td width="10%">昵称</td><td width="10%">标题</td><td width="12%">留言时间</td><td width="12%">操作</td></tr>';
					$.each(list, function(index,array){
						dataStr+='<tr bgcolor="#FFFFFF" align="center" class="az"><td><a href="#" onclick=""></a>'+array['name']+'</td><td class="ad">'+array['title']+'</td><td class="ad">'+array['time']+'</td> <td class="ad"><a href="javascript:;" onclick="del('+array['id']+',this)">删除</a>|<a href="Reply content.php?id='+array['id']+'">回复</a>|<a href="javascript:;" onclick="detail('+array['id']+');">详细</a></td></tr>';
					});
					$('#list').append(dataStr);
					
				},
				error:function(msg){
					alert(msg.status);
				},
				complete:function(){
					getPageBar();
					
				}
			});

		}
		/*获取分页条*/
		function getPageBar(){
			//当前页小于1
			if(curPage < 1){
				curpage = 1;
			}
					//当前页大于总页数
					if(curPage > totalPage){
						curPage = totalPage;
					}
					var pageBar = '';
					pageBar+='<tr><td width="50%" class="dd">共 <span>'+totalPage+'</span> 页 | 第 <span>'+curPage+'</span> 页</td>';
					//当前页为首页
					if(curPage == 1){
						pageBar +='<td width="49%" align="right" class="ee">[<span>首页</span> | <span>上一页</span> ';
					}else{
						pageBar+='<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jump(1);">首页</a> | <a href="javascript:;" onclick="jump('+(curPage-1)+');">上一页</a> ';
					}
					//当前页为尾页
					if(curPage == totalPage){
						pageBar+='| <span>下一页</span> | <span>末页</span>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0">'
					}else{
						pageBar+='| <a href="javascript:;" onclick="jump('+(parseInt(curPage)+1)+')">下一页</a> | <a href="javascript:;" onclick="jump('+totalPage+')">末页</a>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0">'
					}
					
					pageBar+='<tr><td width="1%"><input name="page" type="text" size="1" /></td><td width="87%"><input name="Submit" type="button" value=" " class="cc" onclick="turnPage()"/></td></tr></table></td><td></td><td></td></tr>';

					$('#pageBar').html(pageBar);
				}
				/*页面跳转*/
				function jump(page){
					getContext(page);
				}
				function jumpS(page){
					serch(page);
				}
				/*数字跳转*/
				function turnPage(){
					var text = $('input[name=page]').val();
					var flag = isNaN(text);
					if(!flag){
						if(text != ''){
							getContext(text);
						}
					}else{
						alert('请输入数字！');
					}

				}
				/*按姓名查找*/
				function serch(page){
					$('#list').empty();
					var serch = $('#serch').val();
					$.ajax({
						type:'GET',
						url:'../php/showMessage.php?id=2&serch='+serch+'&page='+page,
						success:function(data){
							
							var dataStr = '';
							dataStr = '<tr><td height="22" colspan="4" align="center" class="ac">留言列表</td></tr><tr align="center" bgcolor="#EEEEEE"><td width="10%">昵称</td><td width="10%">标题</td><td width="12%">留言时间</td><td width="12%">操作</td></tr>';
							
							var json = JSON.parse(data);
							if(json.msg == '无留言！'){
								alert(json.msg);
							}else{
								var context = json.context;
								var time = json.time;
								var list = json.list;
								totalPage = json.totalPage;
								curPage =json.curPage;
								$.each(list, function(index,array){
									dataStr+='<tr bgcolor="#FFFFFF" align="center" class="az"><td><a href="#" onclick=""></a>'+array['name']+'</td><td class="ad">'+array['title']+'</td><td class="ad">'+array['time']+'</td> <td class="ad"><a href="javascript:;" onclick="del('+array['id']+',this)">删除</a>|<a href="Reply content.php?id='+array['id']+'">回复</a>|<a href="javascript:;" onclick="detail('+array['id']+');">详细</a></td></tr>';
								});
							}
							
							
							$('#list').append(dataStr);
						},
						error:function(msg){
							alert(msg.status);
						},
						complete:function(){
							getPageBarS();
						}

					});

				}
				function turnPageS(){
					var text = $('input[name=page]').val();
					var flag = isNaN(text);
					if(!flag){
						if(text != ''){
							serch(text);
						}
					}else{
						alert('请输入数字！');
					}

				}
				function getPageBarS(){
					//当前页小于1
					if(curPage < 1){
						curpage = 1;
					}
					//当前页大于总页数
					if(curPage > totalPage){
						curPage = totalPage;
					}
					var pageBar = '';
					pageBar+='<tr><td width="50%" class="dd">共 <span>'+totalPage+'</span> 页 | 第 <span>'+curPage+'</span> 页</td>';
					//当前页为首页
					if(curPage == 1){
						pageBar +='<td width="49%" align="right" class="ee">[<span>首页</span> | <span>上一页</span> ';
					}else{
						pageBar+='<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jumpS(1);">首页</a> | <a href="javascript:;" onclick="jumpS('+(curPage-1)+');">上一页</a> ';
					}
					//当前页为尾页
					if(curPage == totalPage){
						pageBar+='| <span>下一页</span> | <span>末页</span>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0">'
					}else{
						pageBar+='| <a href="javascript:;" onclick="jumpS('+(parseInt(curPage)+1)+')">下一页</a> | <a href="javascript:;" onclick="jumpS('+totalPage+')">末页</a>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0">'
					}
					
					pageBar+='<tr><td width="1%"><input name="page" type="text" size="1" /></td><td width="87%"><input name="Submit" type="button" value=" " class="cc"  onclick="turnPageS()"/></td></tr></table></td><td></td><td></td></tr>';

					$('#pageBar').html(pageBar);
				}

				/*删除*/
				function del(id,t) {
					var flag = confirm('确定要删除此数据吗？')
					if(flag){
						$.ajax({
							type:'GET',
							url:'../php/showMessage.php?id=3&num='+id,
							success:function (data) {
								alert(data);
							},
							error:function(msg){
								alert(msg.status);
							},
							complete:function(){
								$(t).parent().parent().empty();
							}
						});
					}
					
				}
				/*查看详情*/
				function detail(id){
					$.ajax({
						type:'GET',
						url:'../php/showMessage.php?id=4&num='+id,
						success:function(data){
							alert(data);
						},
						error:function(msg){
							alert(msg.status);
						}
					});
				}
			</script>
		</head>

		<body>
			<div id="header">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="30" >
							<table  width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="62">
										<table align="right" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td rowspan="2" width="25%"><img src="../img/ico02.gif" width="35" height="35" /></td>
												<?php
												if ($_SESSION["Passed"]) {
													echo "<td class='left1'>欢迎你，<span>" . $_SESSION["user"] . "</span></td>";
												}
												?>
											</tr>
											<tr>
												<td width="55%" height="22" class="left2">	<a href="../php/loginout.php">[退出]</a></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div></br>
			<p>按用户名搜索留言：<input type="text" id="serch"> <input type="button" value="搜索" onclick="serch(1);"></p>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td height="40"><br>
												<table  width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#66CC99" align="center" id="list">

												</table>
											</td>
										</tr>
									</table>
									<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
											<td height="6"><img src="../img/spacer.gif" width="1" height="1" /></td>
										</tr>
										<tr>
											<td height="33">
												<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="pageBar">

												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>

