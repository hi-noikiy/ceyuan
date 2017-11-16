<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//Login下判断载入注册/登录模块
	public function index(){
		
		//获取session存在直接到后台
		
		$username = session('username');
		
		if($username){
			
			
			$this->success('检测到您已经登陆过后台,跳转中...',U('Admin/Index/index'));
			exit();
			}
			
		$this->display();
		}
		
		
		
	//Login下登录用户模块
	public function Login(){
		$user=D('User');
		if(IS_POST){
						
			//Model验证
			if($user->create($_POST)){
				if($user->login()){
					if($_POST['username']=='admin')
					{
					$this->success('登录成功,跳转中...',U('Admin/Index/index'));
					}
					else{
						
					$this->error('账号非管理员,请重试...');	
						}
					
					}
				else{
					$this->error('用户或密码错误,请重试...');
					}	
				
				}
			else{
				$this->error($user->getError());
				}
			}

		}	
		
		
		
		
	//Login下注册/登录验证码模块
	public function verify(){
		ob_clean();
		$Verify = new \Think\Verify();
		$Verify->useCurve =false;
		$Verify->useNoise = false;
		$Verify->imageW	=80;
		$Verify->imageH	=20;
		$Verify->length =3;
		$Verify->fontSize=10;
		$Verify->entry();		
		}	
	
}