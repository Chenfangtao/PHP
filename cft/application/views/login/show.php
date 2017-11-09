<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="<?= __PUBLIC__?>css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?= site_url('admin/admin/add_list')?>">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    文章 <select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <?php foreach($news as $a):?>
                            <option value=""><?= $a['news_anthor']?></option>
                        <?php endforeach;?>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>文章标题</td>
                        <td>文章作者</td>
                        <td>文章内容</td>
                        <td>图片</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                <?php foreach($news['news_list'] as $v):?>
                    <tr id="product4">
                        <td><?= $v['id']?></td>
                        <td><a href=""><?= $v['news_title']?></a></td>
                        <td><?= $v['news_anthor']?></td>
                        <td><?= $v['news_detail']?></td>
                        <td><img src="<?= __PUBLIC__.$v['img']?>" height="60" width="60"></td>
                        <td><?= date('Y-m-d H:i:s', $v['news_time'])?></td>
                        <td><a href="<?= site_url('admin/admin/update').'?pageno='.$v['id']?>" >修改</a></td>
                        <td><a href="<?= site_url('admin/admin/del_news').'?pageno='.$v['id']?>" onclick="confirm('确定删除么？')" >删除</a></td>
                    </tr>
                <?php endforeach;?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php
                            for ($i=0; $i<$news['pagecount']; $i++):?>
                           <a href="<?= site_url('admin/admin/show_list?pageno='.($i+1))?>"><?= $i+1 ?></a>
                            <?php endfor; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>