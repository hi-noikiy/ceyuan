<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/Admin/Index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户组列表</span></div>
        </div>
        <div class="search-wrap">

        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/index.php/Admin/Authority/Index/sort/1/">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/Admin/Authority/add"><i class="icon-font"></i>创建用户组</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        
                    </div>
                </div>
                
                
                <div class="result-content">
                 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="display:inline-table;margin-right:5%;border:1px solid #333;border-radius:3px;width:25%;padding:1px;">
                    <table style="border:0px;" cellpadding="0" cellspacing="0" class="result-tab"  border="0" width="100%" >
                        <tr>
                            <th width="20%">Id</th>
                            <th><?php echo ($vo["id"]); ?> <span style="float:right;"><a style="color:#000;" href=""><i class="icon-font" style="text-align:right;">&#xe065;</i></a>  &nbsp; <a  onClick="return confirm('警告:你确定要删除<?php echo ($vo["username"]); ?>吗?')"  style="color:#000;" href="/index.php/Admin/Authority/del/id/<?php echo ($vo["id"]); ?>"><i class="icon-font" style="text-align:right;">&#xe069;</i></a></span></th>
                        </tr>
                        
                       
                        
                        <tr>
                            <td width="20%">名称</td>
                            <td><?php echo ($vo["name"]); ?></td>
						</tr>
                        
                        
                        <tr>
                            <td width="20%">授权查看</td>
                            <td><?php echo ($vo["view"]); ?></td>
						</tr>
                        
                        
                        <tr>
                            <td width="20%">授权操作</td>
                            <td><?php echo ($vo["action"]); ?></td>
						</tr>
					 
                    </table>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                   <div class="list-page"><?php echo ($page); ?></div>
<div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> :用户注册后默认为未审核状态,只有管理员审核后才能进行登陆。请不要轻易删除用户!!!</span></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>