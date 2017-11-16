<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function  __construct(){
		
		parent::__construct();
		
		
		//检查登录状态

		if(!($this->checklogin())){		
		$this->error('请先登录系统!',U("Admin/Login/index"));	
		}

		}
		
	
	//检查后台是否登录	
	private function  checklogin(){
		if(empty($_SESSION['id']) || empty($_SESSION['username']) ){
			return false;
		}
		return true;
		}
		
		
}