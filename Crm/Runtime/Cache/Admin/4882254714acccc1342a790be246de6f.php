<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
<title>站长登录 -后台管理</title> 
<script src="/Crm/Admin/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="/Crm/Admin/Public/css/starry.css" type="text/css">

     
<script type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
});
</script>
 
<meta name="GENERATOR" content="MSHTML 11.00.9600.17496"></head> 
<body scroll="no" style="overflow-x:hidden;overflow-y:hidden">
<div class="top_div"></div>




	<div class="login">
<div style="width: 165px; height: 96px; position: absolute;z-index: 5;">
<div class="tou"></div>
<div class="left_hand" id="left_hand" style="left: 150px; top: -38px;"></div>
<div class="right_hand" id="right_hand" style="right: -64px; top: -38px;"></div></div>
<form name="Login" action="/Admin/Login/Login" method="post">  
<p style="padding: 30px 0px 10px; position: relative;z-index:9"><span class="u_logo"></span>
                <input type="hidden" name="ActionStatus" value="login">
                <input onfocus="this.select()" name="username" class="ipt" type="text" placeholder="请输入用户名" value="">
    </p>
<p style="position: relative;z-index:10"><span class="p_logo"></span>
<input onfocus="this.select()" class="ipt" id="password" type="password" name="password" placeholder="请输入密码" value="">
  </p>

<div style="height: 50px; line-height: 50px; margin-top: 20px; ">
<p><input type="submit" name="bt" value="立即登录" class="btn btn-dl"></p>

<div class="morebg">
<ul class="more">
<!--<li style="top:0; left:0"><a href="##"><input class="btn btn-zc" type="button"  value="注册用户"></a></li>
<li style="top:0; right:0"><a href="/Admin/Login/index/action/sendmail"><input class="btn btn-mm" type="button" value="忘记密码"></a></li>-->
</ul>
</div>


</div></form></div> 

    











  



</body>

</html>