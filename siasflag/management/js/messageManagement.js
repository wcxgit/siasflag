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
						dataStr+='<tr bgcolor="#FFFFFF" align="center" ><td class="ab"><a href="#" onclick=""></a>'+array['name']+'</td><td class="ab">'+array['title']+'</td><td class="ab">'+array['time']+'</td> <td class="ab"><a href="javascript:;" onclick="del('+array['id']+',this)">删除</a>|<a href="Reply content.php?id='+array['id']+'&name='+array['name']+'">回复</a>|<a href="javascript:;" onclick="detail('+array['id']+');">详细</a></td></tr>';
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
						pageBar +='<td width="44%" align="right" class="ee">[<span>首页</span> | <span>上一页</span> ';
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
					
					/*pageBar+='<tr><td width="1%"><input name="page" type="text" size="1" /></td><td width="87%"><input name="Submit" type="button" value=" " class="cc"  onclick="turnPageS()"/></td></tr></table></td><td></td><td></td></tr>';*/

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