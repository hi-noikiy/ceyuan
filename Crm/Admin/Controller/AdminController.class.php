<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
	
	public function index(){
		$this->display();
		}
		
  	//编辑管理员
    public function edit(){
		$user=D('User');
		
		
		//如果是提交表单,直接返回
		if(IS_POST){
			
			$data['id']=$_SESSION['id'];
			$data['ypassword']=I('ypassword');	
			$data['xpassword']=I('xpassword');	
			//先获取原密码
			$userres =$user->find($data['id']);
			$password=$userres['password'];
			
			if(sha1($data['ypassword'])!=$password){
				
				$this->error('原密码不正确!!');
				exit();
				}			

			$data['password']=I('xpassword');						
			//先自动验证
			if($user->create($data)){
				
				if($user->save()){
					$this->success('管理员修改成功',U("Admin/Login/index"));
					}
				else{
					$this->error('管理员名称未修改');
					}	
				
			}else{
				$this->error($user->getError());
			}
			
			return;			
			}
		

		$this->display();
    }
	
	
	public function logout(){
		$_SESSION['id']='';
		$_SESSION['username']='';
		$this->success('退出成功!',U("Admin/Login/index"));	

		}		
	

				
}