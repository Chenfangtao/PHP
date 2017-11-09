<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>首页</title>
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

<div class="page-index page">
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
			        	<img src="<?php echo __PUBLIC__?>img/banner.jpg"/>
			        </div>
			        <div class="swiper-slide">
			        	<img src="<?php echo __PUBLIC__?>img/banner.jpg"/>
			        </div>
			    </div>
			    <!-- 如果需要分页器 -->
			    <div class="swiper-pagination"></div>
			</div>		
		</div>
		
		<!--关于我们-->
		<div class="about">
			<div class="pic">
				<div><img src="<?php echo __PUBLIC__?>img/english.png"/></div>
				<div><img src="<?php echo __PUBLIC__?>img/sporter.jpg"/></div>
			</div>
			<div class="cont-text">
				<h2>安徽鑫晟辉互联网科技有限公司</h2>
				<p>
					辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技......
                    安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技。
				</p>
			</div>
			<!--查看更多-->
			<a class="look-more" href="<?= site_url('news/news_about')?>"></a>
		</div>
		
		<!--新闻动态-->
		<div class="news">
			<!--标题-->
			<div class="title rtv">新闻动态 <span></span></div>
			<!--新闻列表-->
			<div class="news-list">
				<ul>
                    <?php foreach($news as $v):?>
                        <li>
                            <a href="<?php echo site_url('news/news_list')?>">
                                <div class="pic">
                                    <img src="<?php echo __PUBLIC__.$v['img']?>"/>
                                </div>
                                <div class="text">
                                    <p class="time"><?php echo date('Y-m-d H:i:s',$v['news_time'])?></p>
                                    <p><?php echo $v['news_title']?></p>
                                </div>
                            </a>
                        </li>
                    <?php endforeach;?>
				</ul>
                <div id="hide">----------------------加载更多-----------------------</div>
			</div>
			<!--查看更多-->
			<a class="look-more" href="<?php echo site_url('news/news_list')?>">查看更多</a>
		</div>
	
		<!--返回顶部-->
		<img class="back-top" src="<?php echo __PUBLIC__?>img/back-top.png"/>
        </div>
	</div>

	<!--底部-->
	<footer class="index-foot">
		<!--二维码-->
		<div class="qrcode">
			<div class="image"><img src="<?php echo __PUBLIC__?>img/03.jpg"/></div>
			<p>扫一扫关注鑫晟辉公众号</p>
		</div>
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
				<li><a href="<?= site_url('news/news_about')?>">关于我们</a></li>
				<li><a href="">鑫晟辉商城</a></li>
				<li><a href="">新闻动态</a></li>
				<li><a href="<?= site_url('news/news_distribution')?>">三级分销</a></li>
			</ul>
		</div>

	</div>
	<div class="close"></div>
</div>
	
<script type="text/javascript">
	$(function (){
        $(window).scroll(function () {
            var top = $(document).scrollTop();
            if (top < 500)
            {
                $('.back-top').fadeOut(200);
            }
            if (top >= 500)
            {
                $('.back-top').fadeIn(200);
            }
        });





//       打开导航
        $('.nav-menu').click(function(){
            $('.mask').animate({'left':0},300);
        });
//      关闭导航
        $(".mask").click(function(){
            $('.mask').animate({"left":"100%"},300);
        });

//      滑动加载
        var page = 2;
        var status = 1;
	   $('.main').scroll(function(){
         /*  console.log($(this).scrollTop());
           console.log($(this).height());
           console.log($('.scroll-box').height());*/
            if (status != 1)
            {
                return false;
            }

           if ($(this).scrollTop() + $(this).height() >= $('.scroll-box').height())
           {
               status = 2;
                $.post("<?php echo site_url('news/get_news_liebiao')?>", {'page':page}, function(res){
                    if (res.status == 'success')
                    {
                        $('.news-list ul').append(res.news_list);
                        page++;
                        status = 1;
                    }
                        $('#hide').hide();
                },'json')
           }
       })
	})
</script>	
	
</body>
</html>
