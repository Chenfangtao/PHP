<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>首页</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ext/city-picker.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ext/swiper.jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/weui.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="css/weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
	<link rel="stylesheet" type="text/css" href="css/swiper.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<div class="page-index page">
	<!--头部-->
	<header>
		<!--logo-->
		<div class="logo">
			<img src="img/logo.png"/>
			安徽鑫晟辉互联网科技有限公司
		</div>
		<!--导航菜单按钮-->
		<div class="nav-menu">
			<img src="img/nav.png"/>
		</div>
	</header>
	
	<div class="main">
	
		<!--banner图-->
		<div class="banner">
			<!--轮播图-->
			<div class="swiper-container">
			    <div class="swiper-wrapper">
			        <div class="swiper-slide">
			        	<img src="img/banner.jpg"/>
			        </div>
			        <div class="swiper-slide">
			        	<img src="img/banner.jpg"/>
			        </div>
			    </div>
			    <!-- 如果需要分页器 -->
			    <div class="swiper-pagination"></div>
			</div>		
		</div>
		
		<!--关于我们-->
		<div class="about">
			<div class="pic">
				<div><img src="img/english.png"/></div>
				<div><img src="img/sporter.jpg"/></div>
			</div>
			<div class="cont-text">
				<h2>安徽鑫晟辉互联网科技有限公司</h2>
				<p>
					安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技。
	
	安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技。
	
	安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技......
	
	安徽鑫晟辉互联网科技安徽鑫晟辉互联网科技。
				</p>
			</div>
			<!--查看更多-->
			<a class="look-more" href=""></a>
		</div>
		
		<!--新闻动态-->
		<div class="news">
			<!--标题-->
			<div class="title rtv">新闻动态 <span></span></div>
			<!--新闻列表-->
			<div class="news-list">
				<ul>
					<li>
						<a href="">
							<div class="pic">
								<img src="img/11.jpg"/>
							</div>
							<div class="text">
								<p class="time">2017.5.2</p>
								<p>微软Surface家族今晚或将添新丁</p>
							</div>							
						</a>
					</li>
					<li>
						<a href="">
							<div class="pic">
								<img src="img/11.jpg"/>
							</div>
							<div class="text">
								<p class="time">2017.5.2</p>
								<p>微软Surface家族今晚或将添新丁</p>
							</div>							
						</a>
					</li>
					<li>
						<a href="">
							<div class="pic">
								<img src="img/11.jpg"/>
							</div>
							<div class="text">
								<p class="time">2017.5.2</p>
								<p>微软Surface家族今晚或将添新丁</p>
							</div>							
						</a>
					</li>
					<li>
						<a href="">
							<div class="pic">
								<img src="img/11.jpg"/>
							</div>
							<div class="text">
								<p class="time">2017.5.2</p>
								<p>微软Surface家族今晚或将添新丁</p>
							</div>							
						</a>
					</li>
				</ul>
				
			</div>
			<!--查看更多-->
			<a class="look-more" href=""></a>
		</div>
	
		<!--返回顶部-->
		<img class="back-top" src="img/back-top.png"/>
		
	</div>

	<!--底部-->
	<footer class="index-foot">
		<!--二维码-->
		<div class="qrcode">
			<div><img src="img/03.jpg"/></div>
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
			<img src="img/logo.png"/>
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
	  //轮播图	
	  var mySwiper = new Swiper ('.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    
	    // 如果需要分页器
	    pagination: '.swiper-pagination'
	    
	  });
	  
		//当滚动条的位置处于距顶部500像素以下时，图片出现，否则消失
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
	
		//返回顶部
		$('.back-top').click(function () {
			$('html,body').animate({scrollTop:0},300);
		});
		
		//导航弹层
		$('.nav-menu').click(function(){
			$('.mask').animate({'left':0},300);
		});
		
		$(".close").click(function(){
			$('.mask').animate({"left":"100%"},300);
		});
	})
</script>	
	
</body>
</html>
