<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
</head>
<style>
    div{
        width:800px;
        height:500px;
        border:2px solid #000;
        display:table-cell;
        vertical-align:middle;
        text-align: center;

    }
    input{

    }
</style>
<body>
<div>
    <form action="<?php echo site_url('/admin/admin/validation')?>" method="post" enctype="multipart/form-data">
        标题：<input type="text" name="title" value="<?php echo set_value('title')?>"/><br><br>
        文章：<input type="text" name="anther" value="<?php echo set_value('anther')?>" /><br><br>
        内容：<input type="text" name="content" value="<?php echo set_value('content')?>" /><br><br>
        <input type="file" name="file" value="<?php echo set_value('file')?>"/><br><br>
        <input type="submit" value="提交" />
    </form>
</div>
</body>
</html>
