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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/Admin/Index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">医生列表</span></div>
        </div>
        <div class="search-wrap">
          <div class="search-content">
                <form  action="/index.php/Admin/Doctor/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="110">选择医院：</th>
                            <td >
                                <select style="border-radius:8px;" name="hospitalid" id="hospitalid">
                                  		<?php if(is_array($hospitalres)): $i = 0; $__LIST__ = $hospitalres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                           
                            <td><input style="border-radius:8px;" class="btn btn-primary btn2" name="sub" value="切换" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/index.php/Admin/Doctor/sort">
                <div class="result-title">
                    <div class="result-list">
                         <a href="/index.php/Admin/Doctor/add"><i class="icon-font"></i>创建用户组</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>全部删除</a>

                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>


							<th>医生ID</th>
                            <th>医生姓名</th>
                            <th>性别</th>
                            <th>所属医院</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td width="4%">
								<input class="common-input sort-input"  value="<?php echo ($vo["id"]); ?>" type="text">
                            </td>
                            <td><a href="#"><?php echo ($vo["name"]); ?></a></td>
                            <td>
                            <?php if($vo["sex"] == 1 ): ?>男
							<?php elseif($vo["sex"] == 2): ?>
                            女
							<?php else: ?> 
                            Error<?php endif; ?>
                            </td>
                            <td><?php echo ($vo["hname"]); ?></td>
                            <td><?php echo (date("Y-m-d H:m:s",$vo["addtime"])); ?></td>
                            <td width="10%">
                                <a class="link-update" href="/index.php/Admin/Doctor/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" onClick="return confirm('你确定要删除医生<?php echo ($vo["name"]); ?>吗?')"href="/index.php/Admin/Doctor/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                   <div class="list-page"><?php echo ($page); ?></div>
<div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> :添加某个医院医生后登记人员才能选择患者选择的医生</span></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>