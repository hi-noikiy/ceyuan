<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>策源管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <link rel="shortcut icon" href="/Public/Images/favicon.ico"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<body>

<!--引入公共head-->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/Admin/Index">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo (session('username')); ?></a></li>
                <li><a href="/Admin/Admin/edit/id/">修改密码</a></li>
                <li><a href="/Admin/Admin/logout/">退出</a></li>
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
                        <li><a href="/Admin/User/index"><i class="icon-font">&#xe014;</i>用户管理</a></li>
                        <li><a href="/Admin/Trouble/index"><i class="icon-font">&#xE024;</i>待整改列表</a></li>
                        <li><a href="/Admin/Trouble/daishenhe"><i class="icon-font">&#xe00E;</i>审核中列表</a></li>
                        <li><a href="/Admin/Trouble/yiwancheng"><i class="icon-font">&#xe025;</i>已整改列表</a></li>
                        <li><a href="/Admin/Trouble/quanbu"><i class="icon-font">&#xe048;</i>全部数据列表</a></li>
                        <li><a href="/Admin/Trouble/daochu"><i class="icon-font">&#xe03F;</i>数据导出Excel</a></li>
                    </ul>
                </li>
             
                
                

            </ul>
        </div>
    </div> 


    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎登录系统：<span><a style="color:#f00; margin:0 20px;" href="###">系统超级管理员</a></span></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
<!--                    <a href="#"><i class="icon-font">&#xe001;</i>新增作品</a>
                    <a href="#"><i class="icon-font">&#xe005;</i>新增博文</a>
                    <a href="#"><i class="icon-font">&#xe048;</i>新增作品分类</a>
                    <a href="#"><i class="icon-font">&#xe041;</i>新增博客分类</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>-->
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info"><?php echo php_uname('s'); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info"><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行方式</label><span class="res-info"><?php echo php_sapi_name(); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">版本</label><span class="res-info">V-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">是否收费</label><span class="res-info">定制版</span>
                    </li>                    
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info"><?php  echo ini_get(upload_max_filesize); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info"><?php echo date('Y-m-d H:i:s',time()) ?></span>
                    </li>


                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">

                    <li>
                        <label class="res-lab">技术支持：</label><span class="res-info">百木微风.</span>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>