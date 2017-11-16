<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Crm/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Crm/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Crm/Admin/Public/js/Commonaxja.js"></script>    
    <script type="text/javascript">
	function  mchange(){
	var model=document.getElementById("model").selectedIndex;
	var diy=document.getElementById('diy');
	if(model==1){
		//开启下面的DIY显示
		diy.style.display='';
		}
	else{
		//关闭下面的DIY显示
		diy.style.display='none';
		}	
		}
	</script>
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
                        <li><a href="design.html"><i class="icon-font">&#xe006;</i>权限管理</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">部门管理</a><span class="crumb-step">&gt;</span><span>新增部门</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($departmentres["id"]); ?>">
                    <table class="insert-tab" width="100%">
                    
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>部门名称：</th>
                                <td>
                                    <input class="common-text required" id="name" name="name" size="50" value="<?php echo ($departmentres["name"]); ?>" type="text">
                                </td>
                            </tr>
                           
                            


                            <tr>
                                <th><i class="require-red">*</i>显示顺序：</th>
                                <td>
                                    <input class="common-text required" id="sort" name="sort" size="50" value="<?php echo ($departmentres["sort"]); ?>" type="text">
                                </td>
                            </tr>

                   
                            <tr>
                                <th><i class="require-red">*</i>模块组合：</th>
                                <td>
                                  <select id="model" name="model" onchange="mchange(this)">
                                  		<option value="">请选择</option>
                                     		<option value="1" <?php if($departmentres['model'] == 1 ): ?>selected = "selected"<?php endif; ?>>开启</option> 
                                     		<option value="2" <?php if($departmentres['model'] == 2 ): ?>selected = "selected"<?php endif; ?>>关闭</option>                                 		
                                  </select>
                                </td>
                            </tr>  
                            <!--DIY-->
                            <tr id="diy"  <?php if($departmentres['diy'] == '' ): ?>style="display:none;"<?php endif; ?> >
                                <th><i class="require-red">*</i>组合选择：</th>
                                <td id="models">
                                    <?php if($departmentres['diy'] != '' ): $data=explode("#",$departmentres['diy']); foreach($data as $value){ if($value!=''){ echo '部门id'.$value.'的数据组合'; } } ?>
                                        
                                        <?php else: ?> 
                                        
                                        <?php if(is_array($alldepartmentres)): $i = 0; $__LIST__ = $alldepartmentres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dvo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="diy" value="<?php echo ($dvo["id"]); ?>"><?php echo ($dvo["name"]); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                         	
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
                <div class="crumb-list"><i class="icon-font">&#xe021;</i><span class="crumb-name"> : 模块组合:例如您想创建1个【网络总数据】模块,可以选择开启模块组合,再勾选模块组合中勾选要统计的模块组合(例如可以勾选男科和妇科).</span></div>
            </div>
            
        </div>
        

    </div>
    <!--/main-->
</div>
</body>
</html>