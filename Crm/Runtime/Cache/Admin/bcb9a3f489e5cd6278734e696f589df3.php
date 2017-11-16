<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
            <style>
        td { position: relative; overflow: hidden; }
         .rotate { display: none; }
        .rotate-wrap p { box-sizing: border-box; width: 50%; float: left; border-right: 1px solid #fff;
            cursor: pointer;}
        .rotate-wrap { position: absolute; bottom: 6px; left: 50%; margin-left: -40%;width: 80%; height: 40px; font-size: 12px; line-height: 40px; text-align: center; background-color: rgba(0, 0, 0, .5); color: #fff; }
    
    
    
    .mask-wrap {
	    height: 100%;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
}
.mask {
position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    background-color: rgba(0, 0, 0, .5);
    top: 0;
}
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/Index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">已整改列表</span></div>
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
                    <table class="result-tab"  id="tab-list" width="100%">
                        <tr>


							<th>编号</th>
                            <th>办事处</th>
                            <th>地点</th>
                            <th>问题</th>
                            <th>整改前图片</th>
                            <th>整改后图片</th>
                            <th>整改次数</th>
                            <th>提交时间</th>
                            <th>整改时间</th>
                            <th>操作</th>
                        </tr>
                        
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td width="7%">
								<?php echo ($vo["order"]); ?>
                            </td>
                            <td width="7%"><?php echo ($vo["office"]); ?></td>
                            <td width="7%"><?php echo ($vo["place"]); ?></td>
                            <td width="10%">
          <?php  $str=$vo['question']; $newstr = substr($str,0,strlen($str)-1); $hello = explode('#',$newstr); for($i=0;$i<count($hello);$i++){ ?>
		
        问题<?php echo $i+1; ?>：<?php  echo $hello[$i].'<br/>'; ?>
        
        <?php
 } ?>
                            </td>
                            
                            <td width="15%"><img  style="width:100%;height:300px;" src="<?php echo ($vo["firstimg"]); ?>"></td>
                            <td width="15%"><img  style="width:100%;height:300px;" src="<?php echo ($vo["lastimg"]); ?>"></td>
                             <td width="7%"><?php echo ($vo["cishu"]); ?></td>
                            <td width="7%"><?php  echo date('Y-m-d',$vo['addtime']); ?></td>
                           <td width="7%"><?php  echo date('Y-m-d',$vo['lasttime']); ?></td>
                            <td width="10%">
                                <a class="link-update" href="/Admin/Trouble/ywcedit/id/<?php echo ($vo["id"]); ?>">查看详情</a>
                                <a class="link-del" onClick="return confirm('你确定要删除吗?')"href="/Admin/Trouble/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                   <div class="list-page"><?php echo ($page); ?></div>
<div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> :已经完成整改或审核通过的项目</span></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>



<script>
    var html = '<div class="rotate-wrap"><p class="ni">逆时针</p><p class="shun">顺时针</p></div>';
    var imgs = document.getElementById('tab-list').getElementsByTagName('img');
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
	
	
var td = document.querySelectorAll('td');
for (var i=0; i<td.length; i++) {
	
	if (td[i].querySelector('img')) {
		td[i].querySelector('img').onclick = function(e) {
            var dom = '<div class="mask"><div class="mask-wrap"><div class="mask-content"><img src="'+ this.src +'"></div></div></div>';
            var div = document.createElement('div');
            div.innerHTML = dom;
			div.onclick = function(e) {
	
			document.body.removeChild(div);
};

            document.body.appendChild(div);
		}
	}
}	
</script>
</body>
</html>