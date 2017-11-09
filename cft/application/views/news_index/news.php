<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>新闻动态</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="<?php echo __PUBLIC__?>js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo __PUBLIC__?>js/ext/city-picker.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo __PUBLIC__?>js/ext/swiper.jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo __PUBLIC__?>js/weui.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo __PUBLIC__?>css/weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo __PUBLIC__?>css/common.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo __PUBLIC__?>css/swiper.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo __PUBLIC__?>css/style.css"/>
</head>
<body>

<div class="page-news page">
	<!--头部-->
	<header>
		<!--logo-->
		<div class="logo">
			<img src="<?php echo __PUBLIC__?>img/logo.png"/>
			安徽鑫晟辉互联网科技有限公司
		</div>
		<!--导航菜单按钮-->
		<div class="nav-menu">
			<img src="<?php echo __PUBLIC__?>img/nav.png"/>
		</div>
	</header>
	
	<div class="main">

        <div class="scroll-box">
            <!--banner图-->
            <div class="banner">
                <!--轮播图-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo __PUBLIC__?>img/news-banner.jpg"/>
                        </div>
                    </div>
                </div>
            </div>

            <!--新闻动态-->
            <div class="news-active">
                <!--标题-->
                <div class="public-title rtv">
                    新闻动态
                    <span></span>
                </div>

                <!--动态列表-->
                <?php foreach($news as $v):?>
                    <div class="active-list">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('news/news_detail').'?pageno='.$v['id']?>">
                                    <div class="pic">
                                        <img src="<?= __PUBLIC__.$v['img']?>" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h3><?php echo $v['news_title']?></h3>
                                        <p><?php echo $v['news_detail']?></p>
                                        <span class="time"><?php echo date('Y-m-d H:i:s',$v['news_time'])?></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="loading">--------------------------加载中-------------------------------</div>
        </div>
	
	</div>

	<!--底部-->
	<footer>
		<!--Copyright-->
		<p class="copyright">
			<span>Copyright © 2017 www.ahlewei.com 鑫晟辉  版权所有</span>
			<a href="">皖ICP备14009301号</a>
		</p>
	</footer>
  
</div>

<!--导航弹层-->
<div class="mask">
	<div class="nav-menu">
		<div class="logo">
			<img src="<?php echo __PUBLIC__?>img/logo.png"/>
			<p>安徽鑫晟辉互联网科技有限公司</p>
		</div>
		
		<div class="nav-item">
			<ul>
				<li><a class="on" href="">首页</a></li>
				<li><a href="">关于我们</a></li>
				<li><a href="">鑫晟辉商城</a></li>
				<li><a href="">新闻动态</a></li>
				<li><a href="">三级分销</a></li>
			</ul>
		</div>
	</div>
	<div class="close"></div>
</div>
	
<script type="text/javascript">

	$(function (){
		var page = 2;
		var status = true;
		$('.main').scroll(function () {
           /* console.log($(this).scrollTop());
            console.log($(this).height());
            console.log($('.scroll-box').height());*/
            if (!status)
            {
                return false;
            }

            if ($(this).scrollTop() + $(this).height() >= $('.scroll-box').height())
            {
                status = false;
                $.post("<?php echo site_url('news/get_news_list')?>", {"page": page}, function (res) {
                    console.log(res);
                    if (res.status == 'success')
                    {
                        console.log(res.news_list);
                        $('.news-active').append(res.news_list);
                        page++;
//                        console.log(page);
                        status = true;

                        if (res.news_list.length == 0)
                        {
                            $('.loading').hide();
                        }
                    }
                }, 'json');
            }
        })

	})

</script>
</body>
</html>
