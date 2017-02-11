<!--在队人员列表-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>人员列表</title>
    <link href="../css/team-list.css" rel="stylesheet" type="text/css" />
    <script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
		var total,curPage,totalPage;
		/*获取数据*/
		function getData(page){
			var rank = $('#third').html();
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
						
						table+='<tr bgcolor="#FFFFFF" align="center" class="az"><td>'+array["username"]+'</td><td>'+array["time"]+'</td><td><a href="javascript:;" onclick="del('+array["id"]+',this);">删除</a></td></tr>';
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
			if(p){
				getData(p);
			}
		}

		/*跳转页面*/
		function turnPage(){
			var turnP = $('#turnP').val();
			getData(turnP);
		}
		$(function(){
			getData(1);
		})

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
										if ($_SESSION["admin"]) {
											echo "<td class='left1'>欢迎你，<span>" . $_SESSION["admin"] . "</span></td>";
										}elseif($_SESSION['super']){
											echo "<td class='left1'>欢迎你，<span>" . $_SESSION["super"] . "</span></td>";
										}
										?>
                                </tr>
                                <tr>
                                    <td width="55%" height="22" class="left2"><a href="../php/loginout.php">[退出]</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div></br>
              <ul>
			<li >
				<a href="first.php">
					<span id="first"><?php echo date("Y")-3;?></span>级
				</a>
			</li>
			<li>
				<a href="second.php">
					<span id="second"> <?php echo date("Y")-2; ?> </span>级
				</a>
			</li>
			<li class="bg">
				<a href="javascript:;">
					<span id="third"><?php echo date("Y")-1;?></span>级
				</a>
			</li>
		</ul>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td>
											<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
												<tr>
													<td height="40">
														<br>
														<table id="item" width="95%" border="0" cellpadding="4" cellspacing="1" bgcolor="#66CC99" align="center">
															<tr>
																<td height="22" colspan="4" align="center" class="ac"><span id="rank"></span>级在队人员列表</td>
															</tr>
															<tr align="center" bgcolor="#EEEEEE">
																<td width="10%">姓名</td>
																<td width="10%">创建时间</td>
																<td width="12%">操作</td>
															</tr>
															<tbody id="list">
																
															</tbody>
														</table></td>
													</tr>
												</table>
												<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td height="6">
															<img src="../img/spacer.gif" width="1" height="1" />
														</td>
													</tr>
													<tr>
														<td height="33" id="pageBar">
														</td>
														<td></td>
														<td></td>
													</tr>
												</table></td>
											</tr>
										</table></td>
									</tr>
								</table></td>
							</tr>
						</table>
</body>
</html>
