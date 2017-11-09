window.$m = {
	/**
	 * 内部业务逻辑
	 * @param function fn
	 */
	"ready" : function(fn){
		fn && fn();
	},
	
	/**
	 * Ajax请求
	 * @param string url 
	 * @param object json 
	 * @param function sucFn 
	 * @param function errFn
	 * @param int delay
	 */
	"ajax" : function(url, json, sucFn, loadType, delay){
		loadType = loadType === false ? false : true;
		if (loadType) $.showLoading();
		$.ajax({
			type: 'post',
			url: url ,
			dataType: 'json',
			data: json,
			timeout : 5000,
			success: function(res){
				setTimeout(function(){
					if (loadType) $.hideLoading();
					setTimeout(function(){sucFn(res)}, delay === 0 ? 0 : 200);
				}, delay === 0 ? 0 : 200)
			},
			error: function(xml, status, err){
				if (!loadType) return;
				setTimeout(function(){
					if (loadType) $.hideLoading();
					$.alert('请求失败: ' + err);
				}, 200)
			}
		});
	},
	
	/**
	 * 表单检测
	 * @param object o 
	 * @return boolean result
	 */
	"checkForm" : function (o) {
		var result = true;
		var obj = o ? o.find('.required') : $('.required');
		obj.each(function(){
			var v = $(this).val();
			var formMsg = $(this).attr('form-msg');
			var formMsg = formMsg ? formMsg : '请输入' + $(this).attr('placeholder');
			
			if ($.trim(v) == '') {
				$.toast(formMsg, 'text');
				result = false;
				return false;
			}
		});
		
		return result;
	},
	
	/**
	 * 页面加载
	 */
	"loadPage" : function(){
		var hash = location.hash;
		var url = defaultPage;

		if (hash != '#/') {
			url = hash.indexOf('#') === 0 ? hash.substr(1) : defaultPage;
		}

		$.showLoading();

		$.ajax({
			type: 'get',
			url: url ,
			dataType: 'html',
			timeout : 5000,
			success: function(res){
				var prevPage = $('.app-page.slideIn');
				var currentPage = $('.app-page:not(.slideIn)');
				prevPage.removeClass('slideIn')
				currentPage.show();
				
				setTimeout(function(){
					$.hideLoading();
				}, 200)
				
				setTimeout(function(){
					prevPage.css('z-index', 1);
					currentPage.html(res).css('z-index', 2).addClass('slideIn');
				}, 400);
				
				// 修复Android输入框聚焦另一视图露出
				setTimeout(function(){
					$('.app-page:not(.slideIn)').hide();
				}, 600)
			},
			error: function(xml, status, err){
				$('.app-page:visible').html('');
				
				setTimeout(function(){
					$.hideLoading();
					$.alert('请求失败: '+ err);
				}, 200)
			}
		});
	},
	
	/**
	 * 格式化时间戳
	 * @param int timestamp 
	 * @param string type 
	 * @param string sign 
	 * @return boolean result
	 */
	"timeFormat" : function(timestamp, type, sign){
		var type = type ? type : 'hms';
		var sign = sign ? sign : '.';

		timestamp = parseInt(timestamp + '000');
		var date = new Date(timestamp);
		var Y = date.getFullYear() + sign;
		var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + sign;
		var D = (date.getDate() < 10 ? '0' + date.getDate() : date.getDate()) + ' ';

		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();

		var result = '';

		if (type == 'hms') {
			if (h < 10) { h = '0' + h;}
			if (m < 10) { m = '0' + m;}
			if (s < 10) { s = '0' + s;}

			h += ':';
			m += ':'
			result = Y+M+D+h+m+s;
		} else {
			result = Y+M+D;
		}
		
		return result;
	},

	/**
	 * 内部跳转
	 */
	"redirect" : function(url){
		window.location.href = '#' + url;
	},
	
	/**
	 * 设置链接
	 */
	"setLink" : function(){
		$('body').delegate('*[data-link]', 'click', function(){
			var link = $(this).attr('data-link');
			if (link != '' && typeof(link) != 'undefined') {
				$m.redirect(link);
			};
			
			return false;
		})
	},
	
	/**
	 * 验证码倒计时
	 * @param object o 按钮对象
	 * @param int t 秒数
	 * @param object 输入框
	 */
	"countDown" : function(oBtn, t, oInput){
		var txt = oBtn.html();
		var btn = oBtn.get(0);
		var oInput = oInput ? oInput : $('input[name=phone]');
		
		if ($.trim(oInput.val()) == '') {
			$.toast('请输入手机号码', 'text');
			return false;
		}

		btn.init = function(){
			btn.lock = 0;
			oBtn.removeClass('weui_btn_disabled').html(btn.txt);
			clearInterval(btn.timer);
		}

		if (t == 0) btn.init();
		if (!btn.txt) btn.txt = txt;
		if (btn.lock || t == 0) return;
		
		btn.lock = 1;
		t = t ? t : 60;
		oBtn.addClass('weui_btn_disabled').html(t + '秒');
		
		btn.timer = setInterval(function(){
			t--;
			oBtn.html(t + '秒');
			if (t == 0) btn.init();
		}, 1000);

		return oInput.val();
	},
	
	/**
	 * 金额格式化
	 * @param object o
	 */
	"numFormat" : function (o){
		o.val( o.val().replace(/[^\d.]/g,"") );
		o.val( o.val().replace(/^\./g,""));
		o.val( o.val().replace(/\.{2,}/g,"."));
		o.val( o.val().replace(".","$#$").replace(/\./g,"").replace("$#$","."));
		o.val( o.val().replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3'));
	}
}

// 注册函数
juicer.register('timeFormat', $m.timeFormat);

$(function() { 
	$('body').append(
		'<div class="app-page slideIn"></div><div class="app-page"></div>'
	);
	
	$m.setLink();
	$m.loadPage();
	FastClick.attach(document.body);

	$(window).on('hashchange', function () {
		history.replaceState('hasHash', '', '');
		$m.loadPage();
	});
});