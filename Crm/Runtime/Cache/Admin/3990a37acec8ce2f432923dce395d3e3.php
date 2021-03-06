<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Crm/Admin/Public/js/Commonaxja.js"></script>

    <style>
        td { position: relative;
            overflow: hidden; }
        .rotate { display: none; }
        .rotate-wrap p { box-sizing: border-box; width: 50%; float: left; border-right: 1px solid #fff;
            cursor: pointer;}
        .rotate-wrap { position: absolute; bottom: 6px; left: 50%; margin-left: -40%;width: 80%; height: 40px; font-size: 12px; line-height: 40px; text-align: center; background-color: rgba(0, 0, 0, .5); color: #fff; }
    </style>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="">待整改列表</a><span class="crumb-step">&gt;</span><span>查看待整改详细内容</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo ($troubleres["id"]); ?>">
                    <table class="insert-tab" width="100%">
                    
                        <tbody>
                            <tr>
                                <th><i class="require-red"></i>问题编号：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" size="50" readonly  value="<?php echo ($troubleres["order"]); ?>" type="text">
                                </td>
                            </tr>
                            
                              <tr>
                                <th><i class="require-red"></i>办事处：</th>
                                <td>
<input class="common-text required" id="name" name="name" size="50" readonly  value="<?php echo ($troubleres["office"]); ?>" type="text">
                                </td>
                            </tr>  

                              <tr width="100%">
                                <th width="10%"><i class="require-red"></i>存在问题：</th>
                                <td width="90%">
								
                                
                                
          <?php  $str=$troubleres['question']; $newstr = substr($str,0,strlen($str)-1); $hello = explode('#',$newstr); for($i=0;$i<count($hello);$i++){ ?>
		
        问题<?php echo $i+1; ?>：<?php  echo $hello[$i].'<br/>'; ?>
        
        <?php
 } ?>                     
                                </td>
                            </tr> 

                              <tr>
                                <th><i class="require-red"></i>整改次数：</th>
                                <td>
<input class="common-text required" id="name" name="name" size="50" readonly  value="<?php echo ($troubleres["cishu"]); ?>" type="text">
                                </td>
                            </tr>                         
       
                              <tr>
                                <th><i class="require-red"></i>创建用户：</th>
                                <td>
<input class="common-text required" id="name" name="name" size="50" readonly  value="<?php echo ($troubleres["adduser"]); ?>" type="text">
                                </td>
                            </tr>                              
                                 
                                 
                              <tr>
                                <th><i class="require-red"></i>创建时间：</th>
                                <td>
<input class="common-text required" id="name" name="name" size="50" readonly  value="<?php echo date('Y-m-d',$troubleres['addtime']) ?>" type="text">
                                </td>
                            </tr>  
                                
                                
                                
                                
                              <tr>
                                <th><i class="require-red"></i>整改前的图片：</th>
                                <td>
									<div class="tab-img" style="position: relative; width: 440px"><img style="width:440px;" src="<?php echo ($troubleres["firstimg"]); ?>"></div>
                                </td>
                            </tr>   
                                                    
                            <tr>
                                <th></th>
                                <td>
                                    
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                   
                        
                        </table>
                        
                </form>
                <br/>
                <div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> : 当前的状态是待整改,因此只能查看和浏览.</span></div>
            </div>
            
        </div>
        

    </div>
    <!--/main-->
</div>

<script>
    var html = '<div class="rotate-wrap"><p class="ni">逆时针</p><p class="shun">顺时针</p></div>';
    var imgs = document.getElementsByTagName('img');
    var speed = 90;
    for (var i=0; i<imgs.length; i++) {
        var rotate = document.createElement('div');
        rotate.className = 'rotate';
        rotate.innerHTML = html;
        imgs[i].parentNode.appendChild(rotate);
        imgs[i].parentNode.onmouseenter = function (e) {
            var ele = this.getElementsByClassName('rotate')[0];
            ele.style.display = 'block';
        };
        imgs[i].parentNode.onmouseleave = function (e) {
            var ele = this.getElementsByClassName('rotate')[0];
            ele.style.display = 'none';
        };
        var shun =  imgs[i].parentNode.querySelector('.shun');
        var ni =  imgs[i].parentNode.querySelector('.ni');

        shun.onclick = function (e) {
            var img = this.parentNode.parentNode.parentNode.querySelector('img');
            speed += 90;
            img.style.webkitTransform = 'rotate('+ speed +'deg)';
        }
        ni.onclick = function (e) {
            var img = this.parentNode.parentNode.parentNode.querySelector('img');
            speed -= 90;
            img.style.webkitTransform = 'rotate('+ speed +'deg)';
        }
    }
</script>
</body>
</html>