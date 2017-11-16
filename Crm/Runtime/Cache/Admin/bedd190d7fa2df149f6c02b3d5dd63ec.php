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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/Index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">搜索结果</span></div>
        </div>
        <div class="search-wrap">
          <div class="search-content">
                <form  action="/Admin/Trouble/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="输入内容" name="name" value="" id="" type="text"></td>
                            <td>
                            	<select name="model" class="common-select">
                                	<option   value="1">编号查询</option>
                                	<option   value="2">用户查询</option>
                                </select>
                            </td>                            
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/Admin/Trouble/sort">
                <div class="result-title">
                    <div class="result-list">


                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>


							<th>编号</th>
                            <th>办事处</th>
                            <th>地点</th>
                            <th>问题</th>
                            <th>创建用户</th>
                            <th>提交时间</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td width="4%">
								<?php echo ($vo["order"]); ?>
                            </td>
                            <td><?php echo ($vo["office"]); ?></td>
                            <td><?php echo ($vo["place"]); ?></td>
                            <td>
          <?php  $str=$vo['question']; $newstr = substr($str,0,strlen($str)-1); $hello = explode('#',$newstr); for($i=0;$i<count($hello);$i++){ ?>
		
        问题<?php echo $i+1; ?>：<?php  echo $hello[$i].'<br/>'; ?>
        
        <?php
 } ?>
                            </td>
                            <td><?php echo ($vo["adduser"]); ?></td>
                            <td><?php  echo date('Y-m-d',$vo['addtime']); ?></td>
<!--                            <td><img src="<?php echo ($vo["firstimg"]); ?>"></td>-->
                            <td width="10%">
                                <a class="link-update" href="/Admin/Trouble/sview/id/<?php echo ($vo["id"]); ?>">查看详情</a>
                                <a class="link-del" onClick="return confirm('你确定要删除吗?')"href="/Admin/Trouble/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                   <div class="list-page"><?php echo ($page); ?></div>
<div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> :检测人员已经提交的问题,等待清洁进行反馈</span></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>