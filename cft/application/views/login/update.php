<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?= __PUBLIC__?>css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?= site_url('admin/admin/show_list')?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?= site_url('admin/admin/update_do?pageno='.$news['id'])?>" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>文章标题</td>
                    <td><input type="text" name="title" value="<?= $news['news_title']?>" /></td>
                </tr>
                <tr>
                    <td>文章作者</td>
                    <td>
                        <input type="text" name="anther" value="<?= $news['news_anthor']?>" /></td>
                    </td>
                </tr>
                <tr>
                    <td>文章内容</td>
                    <td>
                        <textarea type="text" name="content" value="<?= $news['news_detail']?>"><?= $news['news_detail']?></textarea>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>文章图片</td>
                    <td><input type="file" name="file" value="<?= $news['img']?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>