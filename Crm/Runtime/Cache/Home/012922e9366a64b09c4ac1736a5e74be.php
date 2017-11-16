<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/Crm/Home/Public/css/base.css">
    <script type="text/javascript" src="/Crm/Home/Public/js/ajax.js" ></script>
	<style>
	.wrap{background: #efeff4;}
	.feedBackList{background: #fff;margin-top: 0.92rem;padding-left: 0.928rem;font-size:0.928rem;color: #353535;font-size: 0.928rem;border-bottom: 1px solid #f1f1f1;position: relative;}
	.feedBackList li{padding: 0.71rem 0;border-bottom: 1px solid #f1f1f1;display: flex;display: -webkit-flex;}
	.feedBackList span{width: 6rem;}
	.feedBackList div{flex:1;-webkit-flex:1;padding-right: 10px;}
	.feedBackList div img{width: 10.14rem;height: 6.71rem;}
	.returnList{width: 21rem;height: 2.64rem;line-height: 2.64rem;margin: 1.78rem auto;background: #09bb07;color: #fff;font-size: 1.07rem;text-align: center;display: block;border-radius: 5px;}
	.feedBackList div{position: relative;}
	.feedBackList i{width: 4.82rem;height:1.78rem;line-height:1.78rem;display: block;position: absolute;right: 0.64rem;top: -0.2rem;text-align: center;background: #6ec63d;color: #fff;border-radius: 3px;font-size: 0.857rem;}
	.completeImg{width: 8.2rem;height: 5rem;position: absolute;right: 0.7rem;top: 1.78rem;}
	.feedCheck{width: 88%;margin: 0.89rem auto;overflow: hidden;}
	.feedCheck button{width: 47%;height: 3.07rem;display: block;float: left;text-align: center;line-height: 3.07rem;color: #fff;font-size: 1.07rem;border-radius: 1px;}
	.noCheck{margin-right: 3%;background: #f87f77;}
	.yesCheck{background: #09bb07;}
	.feedHistory{font-size: 1rem;color: #353535;margin: 1.6rem 0.71rem 0.89rem;}
	.completeImg{width: 8.2rem;height: 5rem;position: absolute;right: 0.7rem;top: 1.78rem;}

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
	<ul class="feedBackList">
     	<div id="id" style="display:none;"><?php echo ($troubleres["id"]); ?></div>
		<li><span>编号</span><div><?php echo ($troubleres["order"]); ?></div></li>
		<li><span>街道/办事处</span><div><?php echo ($troubleres["office"]); ?></div></li>
		<li><span>时间</span><div><?php echo ($troubleres["addtime"]); ?></div></li>
		<li><span>地点</span><div><?php echo ($troubleres["place"]); ?></div></li>
        <?php  $str=$troubleres['question']; $newstr = substr($str,0,strlen($str)-1); $hello = explode('#',$newstr); for($i=0;$i<count($hello);$i++){ ?>
		<li><span>问题<?php echo $i+1; ?></span><div><?php  echo $hello[$i]; ?></div></li>
        <?php
 } ?>
		<li><span>修改前图片</span><div><img src="<?php echo ($troubleres["firstimg"]); ?>"  onclick="imgClick(this)" /></div></li>
	</ul>
    
    
    <!---->
    <?php
 $dnum=count($troublelistres); for($i=0;$i<count($troublelistres);$i++){ ?>
	<ul class="feedBackList">
		<li><span>修改次数</span><div>第<?php  echo $dnum ;?>次  <?php if($i==0){ ?><i>最新修改</i><?php } ?></div></li>
		<li><span>修改时间</span><div><?php  echo $troublelistres[$i]['addtime']; ?></div></li>
		<li><span>修改后图片</span><div><img src="<?php  echo $troublelistres[$i]['upimg']; ?>" onclick="imgClick(this)" /></div></li>
		<li><span>补充说明</span><div><?php  echo $troublelistres[$i]['remark']; ?></div></li>
        <?php  if($i!=0){ ?>
        
        <li><span>拒绝原因</span><div><?php  echo $troublelistres[$i]['yuanyin']; ?></div></li>
        <img src="/Crm/Home/Public/images/notInPlace.png" class="completeImg" />

        <?php
 } else{ ?>
         
          <img src="/Crm/Home/Public/images/inspecting.png" class="completeImg" />
         <?php
 } ?>
	</ul>
    
    <?php  if($i==0){ ?>
   
    <div id="listid" style="display:none;"><?php  echo $troublelistres[$i]['id']; ?></div>
	
    <?php
 if($_COOKIE['username']!='qingjieindex'){ ?>
    <div class="feedCheck">
		<button class="noCheck"  >不通过</button>
		<button class="yesCheck" onClick="ok(1);">通过</button>
	</div>
    
    <?php
 } ?>
    
	<p class="feedHistory">
		整改历史记录
	</p>
    
   <?php  } ?>
<?php
$dnum--; } ?>
	<a href="/Home/Control/index" class="returnList">
		返回列表
	</a>
    
    
    <style type="text/css">
    	.mask {position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, .5);}
    	.mask-wrap {border-radius: 5px;text-align: center;height: 100%;display: flex;justify-content: center;align-items: center;}
    	.mask-content .title { position: relative; line-height: 30px; }
    	.mask-content .title span {     position: absolute;
    right: 5px;
    top: 10px;
    font-size: 25px;
    line-height: 0;}
    	.mask-content .content { padding: 5px 10px; }
    	.mask-content .content textarea {     /* margin: 10px; */
    width: 100%;
    box-sizing: border-box;
    min-height: 80px;
    margin: 0 auto;
    padding: 10px;
    background-color: #ddd;
    border-radius: 10px; }
    	.mask-content {    background: #fff;
    width: 80%;
    border-radius: 10px; }
    	.mask-bottom {     display: flex;
    height: 40px;
    line-height: 40px;
    border-top: 1px solid #ddd;}
    	.mask-bottom button {     width: 50%;
    border-right: 1px solid #ddd;}
    .mask-bottom button:active { background-color: #ddd }
    </style>

    <div id="mask1" class="mask" style="display: none">
	    <div class="mask-wrap">
	    	<div class="mask-content">
	    		<p class="title">该审核不通过<span class="close-modal">x</span></p>
	    		<p class="content"><textarea id="yy" placeholder="请简述整改不通过的原因"></textarea></p>
	    		<div class="mask-bottom">
	    			<button id="sure" onClick="ok(0);">确定</button>
	    			<button id="cancel" class="close-modal">取消</button>
	    		</div>
	    	</div>
	    </div>
    </div>
<script>
var url='/Home/Control/shenhechuli/';
function  ok(str){
	
	var id=document.getElementById('id').innerText;
	var  listid=document.getElementById('listid').innerText;
	
	if(id=='' || listid==''){
		
		alert('未获取到记录id');
		return;
		}
	if(str==0){
		cl=0;
		
		var yy=document.getElementById('yy').value;
		
		if(yy==''){
			alert('拒绝原因不得为空!');
			return;
			}
		var data='id='+id+'&listid='+listid+'&cl='+cl+'&yy='+yy;
		}
	else{
		cl=1;
		var data='id='+id+'&listid='+listid+'&cl='+cl;
		}
	
	
	ajaxrequest(url,data,'post',dealwith);
	
	}
	
function   dealwith(){
	
if(myxmlhttprequest.readyState==4)
{
 
var mes= myxmlhttprequest.responseText;

if(mes=='ok'){
	alert('修改成功!');
	var url='/Home/Control/index/';
	window.location.href=url;
	}
else{
	alert(mes);
	}
 
 
} 
	
	}	
	
	
	var cacelEle = document.querySelectorAll('.noCheck');
	var maskEle = document.querySelector('#mask1');
	for (var i=0; i < cacelEle.length; i++) {
		cacelEle[i].onclick = function(e) {

			maskEle.style.display = 'block';
		}
	}

	maskEle.onclick = function(e) {
		this.style.display = 'none';
	}
	var closeEle = document.getElementsByClassName('close-modal');
	for (var i=0; i<closeEle.length; i++) {
		closeEle[i].onclick = function(e) {
			maskEle.style.display = 'none';
		}
	}

	maskEle.getElementsByClassName('mask-content')[0].onclick = function(e) {
		e.stopPropagation();
	}
  
</script>    
       <style>
	.mask { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, .4); z-index: 999; transition: all .3s ease-out;}
	.mask-wrap { display: flex; display: -webkit-flex; align-items: center; height: 100%; padding: 0 10px; }
	.mask-content { width: 100%; }
	.close {width: 100%; margin: 37px auto 0 auto; }
	.close, .close img {  width: 45px;height: 45px; }
	.mask-content .img img { width: 100%; }
</style> 
<!-- 弹出框 -->
<div id="mask2" class="mask">
	<div class="mask-wrap" style="padding: 0">
		<div class="mask-content" style="background: transparent">
			<div class="img"><img src="" alt=""></div>
			<!-- <div class="close"><img src="/Crm/Home/Public/images/close.png" alt=""></div> -->
		</div>
	</div>
</div>   
 <script>
	var mask = document.querySelector('#mask2');
	function imgClick(ele) {
			this.radio = window.innerWidth/window.innerHeight;
			mask.style.display = 'block';
			mask.style.webkitTransform = 'scale(0)';
			var show = mask.querySelector('img');
			show.src = ele.src;
			if (show.width/show.height > radio) {
				if (show.width > window.innerWidth)
					show.style.width = window.innerWidth + 'px';
			}else {
				if (show.height > window.innerHeight)
				show.style.height = window.innerHeight + 'px';
			}
			setTimeout(function () {
				mask.style.webkitTransform = 'scale(1)';
			}, 300);

		closeModal();
	}

	function closeModal () {
		mask.onclick = function (e) {
			var _this = this;
			this.style.webkitTransform = 'scale(0)';
			setTimeout(function () {
				_this.style.display = 'none';
			}, 300);
		}
	}
</script>   
</body>
</html>