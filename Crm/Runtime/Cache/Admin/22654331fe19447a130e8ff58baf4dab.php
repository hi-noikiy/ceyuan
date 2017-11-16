<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Crm/Admin/Public/js/Commonaxja.js"></script>    
</head>
<body>
<!--引入公共head-->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/index.php/Admin/Index">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo (session('username')); ?></a></li>
                <li><a href="/index.php/Admin/Admin/edit/id/">修改密码</a></li>
                <li><a href="/index.php/Admin/Admin/logout/">退出</a></li>
            </ul>
        </div>
    </div>
</div>
 


<div class="container clearfix">


<!--引入公共sidebar-->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/Admin/User/Index"><i class="icon-font">&#xe014;</i>用户管理</a></li>
                        <li><a href="/index.php/Admin/authority/Index"><i class="icon-font">&#xe006;</i>权限管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe00E;</i>数据管理</a></li>
                        <li><a href="/index.php/Admin/Notice/Index"><i class="icon-font">&#xe058;</i>发布公告</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe04f;</i>聊天管理</a></li> 
                        <li><a href="/index.php/Admin/Record/Index"><i class="icon-font">&#xe03b;</i>日志记录</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">

                        <li><a href="/index.php/Admin/Hospital/Index"><i class="icon-font">&#xe026;</i>医院列表</a></li>
                        <li><a href="/index.php/Admin/Department/Index"><i class="icon-font">&#xe05A;</i>部门列表</a></li>
 						<li><a href="/index.php/Admin/Doctor/Index"><i class="icon-font">&#xe014;</i>医生列表</a></li>
                        <li><a href="/index.php/Admin/System/Index"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="/index.php/Admin/System/Mail"><i class="icon-font">&#xe004;</i>邮件设置</a></li>
                        <li><a href="/index.php/Admin/System/Safe"><i class="icon-font">&#xe057;</i>安全设置</a></li>

                    </ul>
                </li>                
                
                

            </ul>
        </div>
    </div> 

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">系统设置</a><span class="crumb-step">&gt;</span><span>基本设置</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                    
                        <tbody>
                        
                            <tr>
                                <th><i class="require-red">*</i>系统名称：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" size="50" value="" type="text">
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <th><i class="require-red">*</i>描述信息：</th>
                                <td>
                                    <input class="common-text required" id="name" name="desc" size="50" value="" type="text">
                                </td>
                            </tr>                            
                            
                            
                              <tr>
                                <th><i class="require-red">*</i>注册开关：</th>
                                <td>
                                  <select id="sex" name="sex">
                                  		<option value="">请选择</option>
                                     	<option value="1" selected="selected">开启注册</option>   
                                        <option value="2">关闭注册</option>                               		
                                  </select>
                                  (默认开启,但是注册成功后需要管理员审核.)
                                </td>
                            </tr> 
                            
                            
                              <tr>
                                <th><i class="require-red">*</i>登陆日志：</th>
                                <td>
                                  <select id="sex" name="sex">
                                  		<option value="">请选择</option>
                                     	<option value="1" selected="selected">开启记录</option>   
                                        <option value="2">关闭记录</option>                               		
                                  </select>
                                  (默认开启,统计每位用户的登录记录.)
                                </td>
                            </tr>   
                            
                            
                              <tr>
                                <th><i class="require-red">*</i>硬件验证：</th>
                                <td>
                                  <select id="sex" name="sex">
                                  		<option value="">请选择</option>
                                     	<option value="1" selected="selected">开启功能</option>   
                                        <option value="2">关闭功能</option>                               		
                                  </select>
                                  (默认开启,每位员工只能通过已经绑定的MAC地址对应的电脑进行登录.)
                                </td>
                            </tr> 
                            

                                                    
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="保存" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                   
                        
                        </table>
                        
                </form>

               
            </div>
            
        </div>
        

    </div>
    <!--/main-->
</div>
</body>
</html>