<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
error_reporting(0); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言回复</title>
    <link href="../css/Reply content.css" rel="stylesheet" type="text/css"/>
    <script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function link(){
           var id = $('#num').val();   //获取需要回复的留言id
           var name = $("#name").val();
           var message = $('#text').val();
           $.ajax({
            type:'GET',
            url:'../php/showMessage.php?id=5&num='+id+'&message='+message+'&name='+name,
            success:function(data){
                alert(data);
            },
            error:function (msg) {
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
                <td height="30">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="62">
                                <table align="right" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td rowspan="2" width="25%"><img src="../img/ico02.gif" width="35" height="35"/>
                                        </td>
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
    </div>
</br>
<input type="text" id="num" hidden="" value="<?php echo $_GET['id']; ?>">
<input type="text" id="name" hidden="" value="<?php echo$_GET['name'];?>">
<table border="0" width="60%" cellpadding="0" cellspacing="0" align="center">
    <tr bgcolor="#66CC99" align="center" height="40">
        <td class="aa">回复内容</td>
        <tr>
            <tr>
                <td><textarea id="text" style="width: 99%;
                  height: 265px;"></textarea></td>
                  <tr>
                    <tr>
                        <td colspan="2" height="40px" class="ad" align="right" width="50%">
                            <input type="button" name="Submit" value="回复" class="button" onclick="link();"/>
                            <a href="javascript:;"><input type="button" name="Submit2" value="返回" class="button"
                             onclick="window.history.go(-1);"/></a>
                         </td>
                     </tr>
                 </table>
             </body>
             </html>
