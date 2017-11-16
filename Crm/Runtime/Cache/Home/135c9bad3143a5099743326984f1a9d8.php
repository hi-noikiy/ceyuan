<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>大鹏新区环境卫生监管</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">

	<style type="text/css">
		* { margin: 0; padding: 0; list-style-type: none; }
		html, body, .wrap-bg { height: 100% }
		.wrap-bg { background: url(/Crm/Home/Public/images/bg.jpg); }
		.wrap { padding: 0 0.6rem; }
		.logo { padding: 1.7rem 0; }
		.logo img {
		    height: 2.5rem;display: block; margin: 0 auto;
		}
		.btn-wrap .radio-item.active { color: #fff; background: url(/Crm/Home/Public/images/select.png) no-repeat 95% 0.32rem #b8d959;background-size: 0.67rem 0.67rem; }
		.btn-wrap .radio-item, .btn-wrap .btn-submit {
		    display: block;
		    background: #fff;
		    border-radius: 80px;
		    margin-bottom: 0.47rem;
		    font-size: 0.42rem;
		    height: 1.33rem;
		    line-height: 1.33rem;
		    padding: 0 20px;
		    color: #505050;
		}
		.btn-wrap .radio-item input, .btn-wrap .btn-submit input { display: none; }
		.btn-wrap .btn-submit { display: block; margin-top: 1rem; background-color: #53bdf2; text-align: center; color: #fff; }
	</style>
</head>
<body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo ($shareinfo["appid"]); ?>',
    timestamp: '<?php echo ($shareinfo["timestamp"]); ?>',
    nonceStr: '<?php echo ($shareinfo["nonceStr"]); ?>',
    signature: '<?php echo ($shareinfo["signature"]); ?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
	  'onMenuShareTimeline',
	  'onMenuShareAppMessage'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
	
	wx.onMenuShareTimeline({
    title: '行走大鹏”环境卫生检查', // 分享标题
    link: 'http://ceyuan1.baimuv.com/Home/Xuanze', // 分享链接
    imgUrl: 'http://ceyuan1.baimuv.com/upload/chengguan.jpg', // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数

    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
	
	
wx.onMenuShareAppMessage({
    title: '行走大鹏”环境卫生检查登陆入口', // 分享标题
    desc: '', // 分享描述
    link: 'http://ceyuan1.baimuv.com/Home/Xuanze', // 分享链接
    imgUrl: 'http://ceyuan1.baimuv.com/upload/chengguan.jpg', // 分享图标
    type: '', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        // 用户确认分享后执行的回调函数

    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});	
	
  });
</script>
<div class="wrap-bg">
	<div class="wrap">
		<section class="logo">
			<img src="/Crm/Home/Public/images/logo.png">
		</section>
		<section class="btn-wrap">
			<section>
				<label class="radio-item active"><input type="radio" name="select">我是监管单位</label>
				<label class="radio-item"><input type="radio" name="select">我是清洁单位</label>
			</section>
			<label class="btn-submit" for="sure"><input id="sure" type="button">确定选择身份</label>
		</section>
	</div>
</div>

<script type="text/javascript" >

	window.onload = function() {
		setFontszie();
	}
	window.onresize = function() {
		setFontszie();
	}
	var setFontszie = function () {
		var html = document.getElementsByTagName('html')[0];

		if (window.innerWidth/10 > 54) {
			html.style.fontSize = 54 + 'px';
		}else if(window.innerWidth/10 < 32) {
			html.style.fontSize = 32 + 'px';
		}else {
			html.style.fontSize = window.innerWidth/10 + 'px';
		}
	}

	var ele = document.getElementsByClassName('radio-item');
	for (var i=0; i<ele.length; i++) {
		ele[i].onclick = function (e) {
			addClass(this, 'active');
			var o = siblings(this);
			for (var j=0; j<o.length; j++) {	
				removeClass(o[j], 'active');
			}
		}
	}

	function addClass(obj, cls) {  
	    if (!this.hasClass(obj, cls)) obj.className += " " + cls;  
	}  
	  
	function removeClass(obj, cls) {  
	    if (hasClass(obj, cls)) {  
	        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');  
	        obj.className = obj.className.replace(reg, ' ');  
	    }  
	}
	function siblings(o){
		var a=[];
		var p=o.previousSibling; 
		while(p){
			if(p.nodeType===1){ 
			a.push(p); 
		} 
			p=p.previousSibling
		} 
		a.reverse() 
		var n=o.nextSibling;
		while(n){
			if(n.nodeType===1){ 
				a.push(n); 
			}
			n=n.nextSibling; 
		} 
		return a
	} 
	function hasClass(obj, cls) {  
	    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));  
	}

	var ele = document.getElementsByClassName('btn-submit')[0];
	var labelEle = document.getElementsByClassName('radio-item');
	ele.onclick = function (e) {

		if (hasClass(labelEle[0], 'active')) {
			var url="/Home/Index/index"
			window.location.href = url;
		}else {
			var url="/Home/Qingjie/index"
			window.location.href = url;
		}
	}

</script>
</body>
</html>