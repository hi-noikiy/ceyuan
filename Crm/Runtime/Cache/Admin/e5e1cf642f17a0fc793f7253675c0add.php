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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="">用户管理</a><span class="crumb-step">&gt;</span><span>编辑用户</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo ($users["id"]); ?>">
                    <table class="insert-tab" width="100%">
                    
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>用户姓名：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" value="<?php echo ($users["username"]); ?>" size="50"  type="text">
                                </td>
                            </tr>
                            
                              <tr>
                                <th><i class="require-red"></i>用户性别：</th>
                                <td>
                                  <select id="sex" name="sex">
                                  		<option value="">请选择</option>
                                        	<option value="1" selected="selected">男</option>
                                            <option value="2">女</option>             		
                                  </select>
                                </td>
                            </tr>  
                           
                            <tr>
                                <th><i class="require-red"></i>用户ＱＱ：</th>
                                <td>
                                    <input class="common-text required" id="qq" name="qq" size="50"  value="<?php echo ($users["qq"]); ?>" type="text">
                                </td>
                            </tr>
                            
                            

                            <tr>
                                <th><i class="require-red"></i>用户电话：</th>
                                <td>
                                    <input class="common-text required" id="mobile" name="mobile" size="50"  value="<?php echo ($users["mobile"]); ?>" type="text">
                                </td>
                            </tr>                     
       
                            <tr>
                                <th><i class="require-red"></i>联系邮箱：</th>
                                <td>
                                    <input class="common-text required" id="email" name="email" size="50"  value="<?php echo ($users["email"]); ?>" type="text">
                                </td>
                            </tr> 
                            <tr>
                                <th><i class="require-red"></i>新的密码：</th>
                                <td>
                                    <input class="common-text required" id="email" name="password" size="50"  value="" type="text">
                                </td>
                            </tr>                      
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                   
                        
                        </table>
                        
                </form>
                <br/>
               <div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> : 不填新的密码不会修改用户密码.</span></div>
            </div>
            
        </div>
        

    </div>
    <!--/main-->
</div>
</body>
</html>