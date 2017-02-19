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
				url:'../php/showMessage.php?id=7&page='+page,
				success:function (data) {
					var json = JSON.parse(data);
					var context = json.context;
					var time = json.time;
					var list = json.list;
					var sql = json.sql;
					totalPage = json.totalPage;
					curPage =json.curPage;
					var dataStr = '';
					var id = json.id;
					dataStr = '';
					$.each(list, function(index,array){
						dataStr += '<tr bgcolor="#FFFFFF" align="center" class="az"><td>'+array['name']+'</td><td class="ad">'+array['time']+'</td><td class="ad"><a href="showContent.php?id='+array['id']+'">查看详情</a> | <a href="javascript:;" onclick="del('+array['id']+',this)">删除</a></td></tr>';
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
						pageBar+='<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jump(1);">首页</a>|<a href="javascript:;" onclick="jump('+(parseInt(curPage)-1)+')">上一页</a> ';
					}
					//当前页为尾页
					if(curPage == totalPage){
						pageBar+='| <span>下一页</span> | <span>末页</span>]</td>'
					}else{
						pageBar+='| <a href="javascript:;" onclick="jump('+(parseInt(curPage)+1)+')">下一页</a> | <a href="javascript:;" onclick="jump('+totalPage+')">末页</a>]</td>';
					}
					
					$('#pageBar').html(pageBar);
				}
				/*页面跳转*/
				function jump(page){
					getContext(page);
				}
				function jumps(page){
					getSerch(page);
				}
				
				/*按姓名查找*/
				function getSerch(page){
					
					$('#list').empty();
			$('#pageBar').empty();
					var serch = $('#serch').val();
					$.ajax({
						type:'GET',
						url:'../php/showMessage.php?id=8&serch='+serch+'&page='+page,
						success:function(data){
							var dataStr = '';
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
									dataStr += '<tr bgcolor="#FFFFFF" align="center" class="az"><td>'+array['name']+'</td><td class="ad">'+array['time']+'</td><td class="ad"><a href="showContent.php?id='+array['id']+'">查看详情</a> | <a href="javascript:;" onclick="del('+array['id']+',this)">删除</a></td></tr>';
								});
							}
							
							
							$('#list').append(dataStr);
						},
						error:function(msg){
							alert(msg.status);
						},
						complete:function(){
							getPageBars();
						}

					});

				}
				
				function getPageBars(){
					
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
						pageBar+='<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jumps(1);">首页</a>|<a href="javascript:;" onclick="jumps('+(parseInt(curPage)-1)+')">上一页</a> ';
					}
					//当前页为尾页
					if(curPage == totalPage){
						pageBar+='| <span>下一页</span> | <span>末页</span>]</td>'
					}else{
						pageBar+='| <a href="javascript:;" onclick="jumps('+(parseInt(curPage)+1)+')">下一页</a> | <a href="javascript:;" onclick="jumps('+totalPage+')">末页</a>]</td>';
					}
					
					$('#pageBar').html(pageBar);
				}

				/*删除*/
				function del(id,t) {
					var flag = confirm('确定要删除此数据吗？')
					if(flag){
						$.ajax({
							type:'GET',
							url:'../php/showMessage.php?id=9&num='+id,
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
			