<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="/Crm/Home/Public/css/base.css">
    <script src="/Crm/Home/Public/js/ajax.js"></script>
	<style>
		html{min-height: 100%;}
		.wrap{font-size:16px;width: 100%;min-height: 100%;background: url(/Crm/Home/Public/images/bg.jpg) no-repeat center center;background-size: 100% 100%;}
		.logo{width: 14rem;margin: 3.2rem auto 2.8rem;display: block;}
		.logo img{width: 100%;}
		.form{margin: 0 1.6rem;background: rgba(255,255,255,0.8);border-radius: 3px;}
		.text{position: relative; display: flex;display: -webkit-flex;padding: 0.53rem 0; height: 2.5rem;line-height: 2.5rem;border-bottom: 1px solid #c7e6f7;}
		.form span{position: absolute; left: 0; top: 0; display: block;height: 3.56rem; line-height: 3.56rem; width: 20%; text-align: center;font-size: 1.07rem;color: #505050;}
		.form input{font-size: 1.07rem;line-height: 1.07rem; width: 80%; margin-left: 20%; height: 2.5rem; }
		.text:last-child{border-bottom: none;}
		.login{margin: 1.7rem 1.6rem 1rem;height: 3.2rem;color:#fff;font-size:1.21rem;background: #53bdf2;border-radius: 6px;text-align: center;line-height: 3.2rem;}
	</style>

</head>
<body class="wrap">
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




	<a href="#" class="logo">
		<img src="/Crm/Home/Public/images/logo.png" alt="">
	</a>
	<div class="form">
		<div class="text">
			<span>账号</span><input type="text" id="username" placeholder="请输入账号" />
		</div>
		<div class="text">
			<span>密码</span><input type="password" id="password" placeholder="请输入密码" />
		</div>
	</div>
	<div class="login" onClick="checklogin()">
		登录
	</div>
    
    
    
    <script>
	//为Ajax验证登陆准备参数
	function  checklogin(){
		
		var username=document.getElementById('username').value;
		var password=document.getElementById('password').value;
		
		if(username=='' || password==''){
			alert('用户名或密码不得为空!');
			return;
			}
		
		var url='/Home/Index/Login/';
		
		var data='username='+username+'&password='+password;
		
		//ajax请求
		ajaxrequest(url,data,'post',reslogin);
		
		}
		
	//回调函数处理登陆结果
	function reslogin()
	{ 
	if(myxmlhttprequest.readyState==4)
	{
	var mes= myxmlhttprequest.responseText;
	var mes_obj=eval("("+mes+")");
	if(mes_obj['state']==0){
		var gotourl="/Home/Control/index";
		window.location.href=gotourl;
		}
	else{
		alert('用户名或密码不正确!!!');
		}	

	 
	} 
	}
		

	
	</script>
</body>
</html>