<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>关于我们</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ext/city-picker.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ext/swiper.jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/weui.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="<?= __PUBLIC__?>css/weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= __PUBLIC__?>css/common.css"/>
	<link rel="stylesheet" type="text/css" href="<?= __PUBLIC__?>css/swiper.css"/>
	<link rel="stylesheet" type="text/css" href="<?= __PUBLIC__?>css/style.css"/>
</head>
<body>

<div class="page-about page">
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
			        	<img src="img/about-banner.jpg"/>
			        </div>
			    </div>
			</div>		
		</div>
		
		<!--关于我们-->
		<div class="about">
			<!--标题-->
			<div class="public-title rtv">
				关于鑫晟辉
				<span></span>
			</div>
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
