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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/Index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户列表</span></div>
        </div>
        <div class="search-wrap">
          <div class="search-content">
                <form  action="/Admin/User/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="输入用户名" name="name" value="" id="" type="text"></td>
                            <td>
                            	<select name="model" class="common-select">
                                	<option   value="1">模糊查找</option>
                                	<option   value="2">精确查找</option>
                                </select>
                            </td>                            
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/Admin/User/Index/sort/1/">
                <div class="result-title">
                    <div class="result-list">
                      	<a href="/Admin/User/add"><i class="icon-font"></i>新增用户</a>
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>用户ID</th>
                            <th>用户名</th>
                            <th>性别</th>
                            <th>QQ</th>
                            <th>电话</th>
                            <th>邮箱</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td width="4%">
								<input class="common-input sort-input"  value="<?php echo ($vo["id"]); ?>" type="text">
                            </td>
                            <td ><?php echo ($vo["username"]); ?></td>
                            <td >
							<?php if($vo["sex"] == 1 ): ?>男
    						<?php else: ?>
                            女<?php endif; ?>
                            </td>
                            <td >
							<?php if($vo["qq"] == '' ): ?>无
    						<?php else: ?> 
							<span class="res-info"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=392223903&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:392223903:2" alt="点击这里给我发消息" title="点击这里给我发消息"/><?php echo ($vo["qq"]); ?></a></span><?php endif; ?>
                            </td>
                            <td >
							<?php if($vo["mobile"] == '' ): ?>无
    						<?php else: ?> 
							<?php echo ($vo["mobile"]); endif; ?>
                            </td>
                            <td >
							<?php if($vo["email"] == '' ): ?>无
    						<?php else: ?> 
							<?php echo ($vo["email"]); ?> <a href="#"><i class="icon-font">&#xe004;</i></a><?php endif; ?>
                            </td>

                            <td width="10%">
                                <a class="link-update" href="/Admin/User/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" onClick="return confirm('警告:你确定要删除<?php echo ($vo["username"]); ?>吗?')"href="/Admin/User/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                   <div class="list-page"><?php echo ($page); ?></div>
<div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> :除了Admin以外的帐号只能在前台登陆/创建的帐号属于检查人员</span></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>