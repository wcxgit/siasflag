var total,curPage,totalPage,rank,value;
		/*获取数据*/
		function getData(page,rank){
			$.ajax({
				type: "post",
				url: "../php/teamList.php",
				async: true,
				data: {
					'rank': rank,
					'pageNum':page
				},
				success: function(data) {
					var json = JSON.parse(data);
					var list = json.list;
					var rank = json.rank;
					totalPage = json.totalPage;
					curPage = json.curPage;
					$('#rank').html(rank);
					$('#list').empty();
					var table="";

					$.each(list,function(index,array){
						
						table+='<tr  align="center" class="az"><td class="name">'+array["username"]+'</td><td class="time">'+array["time"]+'</td><td><a href="javascript:;" onclick="del('+array["id"]+',this);">删除</a></td></tr>';
					});
					$('#list').append(table);
				},
				complete:function(){
					getPageBar();
				},
				error: function(jqXHR) {
					alert(jqXHR.status);
				}
			});
		}
		/*获取分页条*/
		function getPageBar(){
			//当前页大于总页
			if(curPage>totalPage){
				curPage = totalPage;
			}
			//当前页小于1
			if(curPage<1){
				curPage=1;
			}
			pageStr = '<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="6"><img src="../img/spacer.gif" width="1" height="1" /></td></tr><tr><td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="50%" class="dd">共 <span>'+totalPage+'</span> 页 | 第 <span>'+curPage+'</span> 页</td>';
			//当前页是首页
			if(curPage == 1){
				pageStr+='<td width="49%" align="right" class="ee">[<span>首页</span> |<span>上一页</span> |';
			}else{
				pageStr+='<td width="49%" align="right" class="ee">[<a href="javascript:;" onclick="jump(1)">首页</a> |<a href="javascript:;" onclick="jump(curPage-1)">上一页</a> |';
			}
			//当前页是尾页
			if(curPage == totalPage){
				pageStr+='<span>下一页</span> |<span>末页</span>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0"><tr><td width="1%"><input name="text" type="text" size="1" /></td><td width="87%"><input name="Submit" type="submit" value=" " class="cc"/></td></tr></table>';
			}else{
				pageStr+='<a href="javascript:;" onclick="jump(parseInt(curPage)+1)">下一页</a> |<a href="javascript:;" onclick="jump(totalPage)">末页</a>] 转至：</td><td width="1%"><table width="20" border="1" cellspacing="0" cellpadding="0"><tr><td width="1%"><input type="text" size="1" id="turnP"/></td><td width="87%"><input type="button" value=" " class="cc" onclick="turnPage();"/></td></tr></table>';
			}
			$('#pageBar').html(pageStr);

		}

		/*翻页*/
		function jump(p){
			value = $('.active').text();
			rank = value.substr(0,4);
			if(p){
				getData(p,rank);
			}
		}

		/*跳转页面*/
		function turnPage(){
			var turnP = $('#turnP').val();
			getData(turnP);
		}

		/*初始化分页条*/
		$(function(){
			value = $('.active').text();
			rank = value.substr(0,4);
			getData(1,rank);
		});
		
		/*点击删除*/
		function del(id,t){
 			var flag = confirm('确定要删除此数据？');
			if(flag){
				$.ajax({
					type:'GET',
					url:'../php/deleteTable.php?id='+id,
					success:function(data){
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