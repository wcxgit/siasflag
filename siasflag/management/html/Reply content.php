<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <?php session_start();
    error_reporting(0); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言回复</title>
    <link href="../css/Reply content.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../kindeditor-4.1.10/themes/simple/simple.css">
    <script src="../../user/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var id = $('#num').val();//获取需要回复的留言id
        alert (id);
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
                                                if ($_SESSION["Passed"]) {
                                                    echo "<td class='left1'>欢迎你，<span>" . $_SESSION["user"] . "</span></td>";
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
<input type="text" id="num"  value="<?php echo $_GET['id']; ?>">
<table border="0" width="60%" cellpadding="0" cellspacing="0" align="center">
    <tr bgcolor="#66CC99" align="center" height="40">
        <td class="aa">回复内容</td>
    <tr>
    <tr>
        <td><textarea id="editor_id" name="content" style="width: 100%;height:300px;">
</textarea></td>
    <tr>
    <tr>
        <td colspan="2" height="40px" class="ad" align="right" width="50%">
            <input type="button" name="Submit" value="回复" class="button" onclick="link();"/>
            <a href="Message management.html"><input type="button" name="Submit2" value="返回" class="button"
                                                     onclick="window.history.go(-1);"/></a>
        </td>
    </tr>
</table>
<script src="../kindeditor-4.1.10/kindeditor.js"></script>
<script src="../kindeditor-4.1.10/lang/zh_CN.js"></script>
<script>
   /* KindEditor.ready(function (K) {
        window.editor = K.create('#editor_id', {
            themeType : 'simple'
        });
    });*/
</script>
</body>
</html>
