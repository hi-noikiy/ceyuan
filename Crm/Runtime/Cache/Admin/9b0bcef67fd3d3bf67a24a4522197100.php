<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<title>系统提示</title>
</head>

<body>

    <BR><BR>
    <div class="col-lg-4 col-lg-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title text-center">
               	<?php if(isset($message)) {?>
                <img src="/Public/images/205.png"> 操作成功！
                <?php }else{?>
                <img src="/Public/images/206.png"> 有错误发生！
                <?php }?>
                </div>
            </div>
            <div class="panel-body text-center">
                  <?php if(isset($message)) {?>
                    <h3><?php echo($message); ?></h3>
                  <?php }else{?>
                  
     
                  
                    <h3><?php echo($error); ?></h3>
    			  <?php }?>
                </div>
            <div class="panel-footer">
                <div class="panel-title text-center">
                三秒后自动返回<meta http-equiv=refresh content=3;url="<?php echo($jumpUrl); ?>"><BR><BR>
或<a id="href" href="<?php echo($jumpUrl); ?>">点击此链接，当即跳转</a>
                </div>
            </div>
        </div>
    </div>





</body>
</html>