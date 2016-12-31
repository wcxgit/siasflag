<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>添加文本</title>

    <link href="../css/add video.css" rel="stylesheet" type="text/css"/>

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

                                    <td class="left1">您好，<span>小明</span></td>

                                </tr>

                                <tr>

                                    <td width="55%" height="22" class="left2"><a href="enter.html">[退出]</a></td>

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

<form>

    <fieldset>

        <legend>文本添加</legend>
        <tr>
        <textarea id="editor_id" name="content" style="width:700px;height:300px;">
&lt;strong&gt;HTML内容&lt;/strong&gt;
</textarea></tr></br>

        <tr>

            <td colspan="2" height="40px">

                <input class="bc" type="button" name="Submit" value="添加" class="button" onclick="link();"/>

                <input type="button" name="Submit2" value="重置" class="button" onclick="window.history.go(-1);"/>

            </td>

        </tr>
    </fieldset>

</form>

<script src="../kindeditor-4.1.10/kindeditor.js"></script>
<script src="../kindeditor-4.1.10/lang/zh_CN.js"></script>
<script>
    KindEditor.ready(function (K) {
        window.editor = K.create('#editor_id');
    });
</script>
</body>

</html>

