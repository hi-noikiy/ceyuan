<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no,email=no,adress=no">
	<title></title>
    <script type="text/javascript" src="/Crm/Home/Public/js/ajax.js" ></script>
    <script type="text/javascript" src="/Crm/Home/Public/js/lazyload.js" ></script>
	<link rel="stylesheet" href="/Crm/Home/Public/css/base.css">
	<style>
	.filter{width: 100%;border-bottom: 1px solid #e0e0e0;color: #353535;overflow: hidden;background: #fafafa;}
	.filter li{width: 50%;height: 2.5rem;float: left;border-right: 1px solid #d1d1d1;box-sizing: border-box;font-size: 0.93rem;display: flex;display: -webkit-flex;justify-content: center;-webkit-justify-content: center;align-items: center;-webkit-align-items: center;position: relative;}
	.filter li:last-child{border-right: none;}
	.filter li i{display: block;position: relative;}
	.filter li i:before,.filter li i:after{width: 0;height: 0;border-style: solid;content: "";display: block;position: absolute;}
	.filter li i:before{border-color:transparent transparent #bcbec1 transparent;border-width:5px 5px 7px 5px;left: 5px;top: -12px;}
	.filter li i:after{border-color:#bcbec1 transparent transparent transparent;border-width:7px 5px 5px 5px;left: 5px;top: 2px;}
	.filter span{}
	.filter select{width: 100%;min-height:100%;position: absolute;left: 0;top: 0;text-align: center;opacity: 0;}
	.filter select option{height: 100%;}
	.tabs{width: 100%;display: -webkit-flex;display: flex;border-bottom:1px solid #dcdcdc;background: #fafafa; font-size: 0;}
	.tabs li{-webkit-flex:1;flex:1;width: 33.33%; border-right:1px solid #dcdcdc;height: 3rem;line-height: 3rem;text-align: center;font-size: 0.93rem;}
	.tabs li:last-child{border-right: none;}
	.tabs li.active{background: #eaeaea;}
	.orderWrap{padding: 0 0.57rem;margin-bottom: 5rem;display: none;}
	.order{border:1px solid #e4e4e4;margin-top: 1.14rem;border-radius: 5px;color: #353535;font-size: 0.857rem;padding: 0 0 1rem 0;position: relative;}
	.orderTitle{height: 2.5rem;/*display: flex;display: -webkit-flex;*/text-align: center;color: #fff;text-align: center;line-height: 2.5rem;}
	.kui .orderTitle{background: #93c9f8;}
	.nan .orderTitle{background: #9ddb5b;}
	.da .orderTitle{background: #facb3b;}
	.orderTitle li{flex:1;-webkit-flex:1; display: inline-block; width: 33.3%;}
	.orderTime{margin: 0.71rem 0.89rem;}
	.orderImg{display: flex;display: -webkit-flex; margin: 0 0.89rem;}
	.show_img {width: 9.14rem;height: 6.07rem; overflow: hidden;}
	.orderImg img{border-radius: 2px;}
	.orderImg a{margin:4.8rem 0 0 1.21rem;color: #139dff;}
	/*审核中*/
	.examine{margin: 0 0.89rem 0.71rem;overflow: hidden;}
	.examine li{width: 48%;margin-right: 4%;float: left;}
	.examine li span{margin-bottom: 0.57rem;display: block;}
	.examine li:last-child{margin-right: 0;}
	.examine li img{width: 100%;}
	/*已整改
*/
	.completeImg{width: 8.2rem;height: 5rem;position: absolute;right: 0.7rem;top: 1.78rem;}
	.lookDetail{width: 3.57rem;height: 1.07rem;margin: 0 auto 0.5rem;display: block;color: #139dff;position: relative;}
	.lookDetail:after{width: 10px;height: 10px;border:1px solid #139dff;border-top: none;border-right: none;transform: rotate(-45deg);-webkit-transform: rotate(-45deg);content: "";display: block;position: absolute;left: 50%;bottom:-0.8rem;margin-left: -5px;}
	.feedback{width: 100%;height: 3.03rem;background: #f16157;color:#fff;text-align: center;line-height: 3.03rem;font-size: 1.07rem;position: fixed;left: 0;bottom: 0;display: block;}
	.feedbackPop{width: 100%;height: 100%;position: fixed;left: 0;top: 0;z-index: 2;background: #666;transform:scale(0);opacity: 0;transition:all 0.5s;display: -webkit-flex;display: flex;justify-content: center;-webkit-justify-content:center;align-items: center;-webkit-align-items:center;flex-wrap: wrap;-webkit-flex-wrap: wrap;align-content:center;-webkit-align-content: center;}
	.feedbackPop img{width: 100%;min-height: 14rem;max-height:21rem;}
	.feedbackPop i{width: 3.21rem;height: 3.21rem;display: block;background: url(/Crm/Home/Public/images/close.png) no-repeat center center;background-size: cover;margin: 2rem auto;}
	.feedbackPopMove{transform:scale(1);opacity: 1;}
	
    
    
    /*Empty*/
		.empty-wrap {
		    width: 80%;
		    margin: 0 auto;
		    padding-top: 100px;
		}
		.empty-wrap .img { text-align: center; }
		.empty-wrap .img img { width: 100px;margin:0 auto; }
		.empty-wrap p {
			text-align: center;
			margin-top: 20px;
			color: #4a4a4a;
			font-size: 16px;
		}
		.empty-btn {
			position: fixed;
			bottom: 0;
			text-align: center;
			width: 100%;
			height: 45px;
			line-height: 45px;
			background-color: #f16157;
			color: #fff;
		}

    
    
    
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

<ul class="filter">
	<li>
		<span>办事处</span>
		<select name="work" onchange="cleanpage();run();" id="office">
			<option value="全部" selected = "selected">全部</option>
			<?php if(is_array($officeres)): $i = 0; $__LIST__ = $officeres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		<i></i>
	</li>
	<li>
		<span>时间顺序</span>
		<select name="time" id="time" onchange="cleanpage();run();">
        	<option value="倒序">倒序</option>
			<option value="顺序">顺序</option>

		</select>
		<i></i>
	</li>
</ul>
<ul class="tabs" >
	<li data-num="0" name="tabs" class="active">待整改</li>
	<li data-num="1" name="tabs">审核中</li>
	<li data-num="2" name="tabs">已整改
</li>
</ul>



<!--待整改-->
<div class="orderWrap" id="daifankui" style="display:block;">
	

</div>


<!--审核中-->
<div class="orderWrap" id="shenhezhong">

	

</div>

<!--已经完成-->
<div class="orderWrap" id="yiwancheng">

	

</div>

<div class="empty-wrap" id="empty" style="display:none;">
		<div class="img"><img src="/Crm/Home/Public/images/empty.png" alt=""></div>
		<p>暂无数据</p>
	</div>

<?php
 if($_COOKIE['username']!='qingjieindex'){ ?>

<a href="/Home/Control/add" class="feedback">
	问题反馈
</a>

<?php
 } ?>


<div class="feedbackPop">
	<img src="" />
	<i></i>
</div>
<div id="page" style="display:none;"></div>

<style>
	.mask { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, .4); z-index: 999; transition: all .3s ease-out;}
	.mask-wrap { display: flex; display: -webkit-flex; align-items: center; height: 100%; }
	.mask-content { width: 100%; }
	.close {width: 100%; margin: 37px auto 0 auto; }
	.close, .close img {  width: 45px;height: 45px; }
	.mask-content .img img { margin: 0 auto; }
</style>

<!-- 弹出框 -->
<div class="mask">
	<div class="mask-wrap">
		<div class="mask-content">
			<div class="img"><img src="" alt=""></div>
			<!-- <div class="close"><img src="/Crm/Home/Public/images/close.png" alt=""></div> -->
		</div>
	</div>
</div>
<script type="text/javascript">
	var filter = document.querySelector(".filter"),
		filterSelect = filter.querySelectorAll("select"),
		filterLen = filterSelect.length;
	for(var i = 0;i < filterLen; i++){
		filterSelect[i].addEventListener("change",function(){
			console.log(this.selectedIndex)
			var str = this.value;
			var span = this.parentNode.querySelector("span");
			span.innerHTML = str;
		},false)
	}
	var orderImg = document.querySelectorAll(".orderImg img,.examine img");
	var feedbackPop = document.querySelector(".feedbackPop");
	var feedbackPopImg = document.querySelector(".feedbackPop img");
	var closeFeedback = document.querySelector(".feedbackPop i");
	var imgLen = orderImg.length;
	for(var i = 0;i < imgLen; i++){
		orderImg[i].addEventListener("click",function(){
			var src = this.src;
			feedbackPopImg.src= src;
			feedbackPop.classList.add('feedbackPopMove');
		},false)
	}
	closeFeedback.addEventListener("click",function(){
		feedbackPop.classList.remove('feedbackPopMove');
	},false)
	//审核流程切换
	var tabs = document.querySelector(".tabs");
	var tabsList = document.querySelectorAll(".tabs li");
	var orderWrap = document.querySelectorAll(".orderWrap");
	var orderLen = orderWrap.length;
	tabs.addEventListener("click",function(e){
		var target = e.target;
		var num = target.dataset.num;
		for(var i = 0;i < orderLen; i++){
			orderWrap[i].style.display = "none";
			tabsList[i].classList.remove('active');
		}
		target.classList.add('active');
		orderWrap[num].style.display = "block";
		cleanpage();
		run();
	},false)


</script>
<script>


//获取页面的参数
function getcanshu(){
//获取选择的office
var obj = document.getElementById('office');		
var index = obj.selectedIndex; 
var office = obj.options[index].value; 
//获取选择的排序时间
var obj = document.getElementById('time');		
var index = obj.selectedIndex; 
var time = obj.options[index].value; 

//获取选择的tabs
var tabs = document.getElementsByName('tabs');
var tab;
for(i=0;i<tabs.length;i++){
	if(tabs[i].className=='active'){
		tab=tabs[i].innerText;
		}
	}
//获取当前页码
var page =document.getElementById('page').innerText;
if(page==''){
page=1;	
	}
var data = new Array();
    data["office"] = office;
    data["time"]   = time;
    data["tab"]    = tab;
    data["page"]   = page;	

return data;
}


//创建一个处理ajax数据的函数
function dealwith(){
if(myxmlhttprequest.readyState==4)
{
var mes= myxmlhttprequest.responseText;





var mes_obj=eval("("+mes+")");


//获取选择的tabs
var tabs = document.getElementsByName('tabs');
//获取page
var page =document.getElementById('page').innerText;
if(page==''){
	page=1;
	}
	

if(mes=='[]'  && page==1){
	  document.getElementById('empty').style.display='block';
	}	
	
	
var tab;
for(i=0;i<tabs.length;i++){
	if(tabs[i].className=='active'){
		tab=tabs[i].innerText;
		}
	}
//根据选择的tab插入数据
if(tab=='待整改'){
	var daifankui=document.getElementById('daifankui');
	if(page==1){
		daifankui.innerHTML='';
		}
	for(i=0;i<mes_obj.length;i++){
		
		daifankui.innerHTML+='<div class="order kui"><ul class="orderTitle"><li>编号：<span style="color: #fff">'+mes_obj[i]['order']+'</span></li><li>办事处：<span>'+mes_obj[i]['office']+'</span></li><li>整改次数：<span>'+mes_obj[i]['cishu']+'</span></li></ul><p class="orderTime">时间：<span>'+mes_obj[i]['addtime']+'</span></p><div class="orderImg">整改前图片：<div class="show_img"><img src="'+mes_obj[i]['firstimg']+'" onclick="imgClick(this);" /></div><a href="/Home/Control/daifankuixq/id/'+mes_obj[i]['id']+'">查看详情</a></div></div>';
		
		}
	
	}

if(tab=='审核中'){
	var shenhezhong=document.getElementById('shenhezhong');
	if(page==1){
		shenhezhong.innerHTML='';
		}
	for(i=0;i<mes_obj.length;i++){
		
		shenhezhong.innerHTML+='<div class="order nan"><ul class="orderTitle"><li>编号：<span style="color: #fff">'+mes_obj[i]['order']+'</span></li><li>办事处：<span>'+mes_obj[i]['office']+'</span></li><li>整改次数：<span>'+mes_obj[i]['cishu']+'</span></li></ul><p class="orderTime">时间：<span>'+mes_obj[i]['addtime']+'</span></p><ul class="examine"><li><span>整改前图片：</span><div class="show_img" ><img src="'+mes_obj[i]['firstimg']+'" onclick="imgClick(this);" /></div></li><li><span>整改后图片：</span><div class="show_img"><img src="'+mes_obj[i]['lastimg']+'" onclick="imgClick(this);" /></div></li></ul><a href="/Home/Control/daishenhexq/id/'+mes_obj[i]['id']+'" class="lookDetail">查看详情</a></div>';
		
		}
	
	}
	

if(tab=='已整改'){
	var yiwancheng=document.getElementById('yiwancheng');
	if(page==1){
		yiwancheng.innerHTML='';
		}
	for(i=0;i<mes_obj.length;i++){
		
		yiwancheng.innerHTML+='<div class="order da"><ul class="orderTitle"><li>编号：<span style="color: #fff">'+mes_obj[i]['order']+'</span></li><li>办事处：<span>'+mes_obj[i]['office']+'</span></li><li>整改次数：<span>'+mes_obj[i]['cishu']+'</span></li></ul><p class="orderTime">时间：<span>'+mes_obj[i]['addtime']+'</span></p><ul class="examine"><li><span>整改前图片：</span><div class="show_img"><img src="'+mes_obj[i]['firstimg']+'"  onclick="imgClick(this);"/></div></li><li><span>整改后图片：</span><div class="show_img"><img src="'+mes_obj[i]['lastimg']+'" onclick="imgClick(this);" /></div></li></ul><a href="/Home/Control/yiwanchengxq/id/'+mes_obj[i]['id']+' "class="lookDetail">查看详情</a><img src="/Crm/Home/Public/images/complete.png" class="completeImg" /></div>';
		
		}
	
	}	

//alert(mes_obj.length);
}
	
	}



run();

function run(){

var data=getcanshu();

if(data['office']==''){
	
	alert('所有选项不得为空!');
	}

data='office='+data['office']+'&time='+data['time']+'&tab='+data['tab']+'&page='+data['page'];

var url='/Home/Control/index/';

//ajax发送
ajaxrequest(url,data,'post',dealwith);
}




//到达页面底部触发
 window.onscroll = function(){
　　if(getScrollTop() + getWindowHeight() == getScrollHeight()){
　　//增加page值　
	var page =document.getElementById('page').innerText;
	if(page==''){
		page=1;
		}
	document.getElementById('page').innerText=Number(page)+1;	
	run();
　　}
};


//防止溢出重置
function  cleanpage(){
	document.getElementById('empty').style.display='none';
	document.getElementById('page').innerText='';	
	var tab=getcanshu();

	if(tab=='待整改'){
		var daifankui=document.getElementById('daifankui');
		daifankui.innerHTML='';
		}
	
	if(tab=='审核中'){
		var shenhezhong=document.getElementById('shenhezhong');
		shenhezhong.innerHTML='';
		}
	if(tab=='已整改'){
		var yiwancheng=document.getElementById('yiwancheng');
		yiwancheng.innerHTML='';
		}
		}
</script>

<script>
	var mask = document.getElementsByClassName('mask')[0];
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