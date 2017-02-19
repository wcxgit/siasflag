var	totalPage,curPage;
		/*从第一页开始*/
		$(function(){
			getContext(1);
		});
		/*分页显示*/
		function getContext(page){
			$('#list').empty(); 
			var name = $('#name').val();
			$.ajax({
				type:'GET',
				url:'../../management/php/showMessage.php?id=11&page='+page+'&name='+name,
				success:function (data) {
					var json = JSON.parse(data);
					var list = json.list;
					totalPage = json.totalPage;
					curPage =json.curPage;
					var dataStr = '';
					$.each(list, function(index,array){
						dataStr += '<tr bgcolor="#FFFFFF" align="center" class="az"><td>'+array['name']+'</td><td>'+array['message']+'</td><td class="ad">'+array['time']+'</td><td class="ad"><a href="javascript:;" onclick="getAsk('+array['id']+');">查看回复</a></td></tr>';
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
					pageBar+='<tr><td width="50%" class="dd">共<a href="#">'+totalPage+'</a> 页 | 第<a href="#">'+curPage+'</a> 页</td>';
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

				function getAsk(id){
					$.ajax({
						type:"get",
						url:"../../management/php/showMessage.php?id=12&num="+id,
						async:true,
						success:function(data){
							var json = JSON.parse(data);
							var list = json.list;
							if(json.msg == "无回复内容！"){
								alert(json.msg);
							}else{
								$.each(list, function(i,arr) {
									alert(arr['ask']);
									
								});
							}
						},
						error:function(msg){
							alert(msg.status);
						}
					});
				}
			