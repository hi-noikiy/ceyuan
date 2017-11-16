<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class  QingjieController extends Controller {
	//用户默认登录面板
	public function index(){	
		
		
		cookie('username','qingjieindex',3600*24*365); 
		cookie('password','qingjieindex',3600*24*365); 

        $url=U("Home/Control/index");
	    header("Location: ".$url.""); 	
		exit();

		}
		
	
	


				
}