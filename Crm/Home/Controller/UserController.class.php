<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
	//用户默认登录面板
	public function index(){
		//先查询当前用户所属项目
		$user=M('User');
		$info=$user->field('id,project')->find(cookie('id'));
		$this->assign('info',$info);
		

		//获取所有医院
		$hospital = D('Hospital');
		$hospitalres= $hospital->field('id,name')->select();
		$this->assign('hospitalres',$hospitalres);
		
		
		
		//获取当前医院的部门
		$department = D('Department');
		$departmentres=$department->order('sort asc')->field('id,name')->select();
		$this->assign('list',$departmentres);
		
		
		
			
		$this->display();
		}
	

	
	

		

		
		


				
}