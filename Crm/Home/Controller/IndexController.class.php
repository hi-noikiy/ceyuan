<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends ShareController {
	//Login下判断载入注册/登录模块
	public function index(){
		
		$action=I('action');
		if($action==""){
			$this->assign('action','login');
			}
		else{
			$this->assign('action',$action);
			}
		
			
		$this->display();
		}
	
	//Login下注册用户模块
	public function Reg(){
		
		$user=D('User');
		if(IS_POST){			
			//Model验证
			if($user->create($_POST,4)){
				if($user->add()){
					$this->success('注册成功',U('index'));
				}
				else{
					$this->error('注册用户失败');
					
				}
				
				}
			else{
				$this->error($user->getError());
				}
			
			}	
		
		}
	
	
	
	//Login下登录用户模块
	public function Login(){
		//返回登陆的状态
		$res=array();
		//获取前端的参数
		$data['username']=I('username');
		$data['password']=sha1(I('password'));
		
		//查询数据库是否存在
		$user=M('User');
		$user=$user->where($data)->find();
		
		//查找到了
		if($user){
			   cookie('id',$user['id']);    
			   cookie('username',$user['username'],3600*24*15); 
			   cookie('password',$user['password'],3600*24*15); 
			   $res['state']=0;
			}
		else{
			   $res['state']=1;
			}	
			
		
		
		echo json_encode($res);	
		exit();
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
		
		
	//Login下发送邮件	
	public function sendmail(){
		
		$user=D('User');
		if(IS_POST){			
			//Model验证
			if($user->create($_POST,4)){
				
				$data['username']=I('username');
				$data['email']	 =I('email');
				
				//用户名和邮箱匹配
				if($info=$user->where($data)->find()){
					
					
					$password=rand(100000,999999);
					
					$newdata['password']=$password;
					
					$user->where('username='.$info['username'])->save($newdata);
					
					//获取邮箱配置
					if($mail =D('Mail')->where('id=1')->find()){
				
							C('MAIL_HOST',$mail['smtp']);
							C('MAIL_USERNAME',$mail['user']);
							C('MAIL_PASSWORD',$mail['pass']);
							C('MAIL_FROM',$mail['user']);
							C('MAIL_FROMNAME',$mail['from']);	
					

						}
					else{
							$this->error('SMTP邮件配置信息已损坏',U('Index/index'));
						}

					
					
					if(SendMail($data['email'],'恭喜您,密码修改成功','尊敬的用户:'.$info['username'].'您申请修改密码成功,新密码:'.$password)){
						$this->success('密码找回成功,跳转中...',U('Index/index'));
						}
					else{
						$this->error('邮件发送失败');
						}
					
					}
				
				}
			else{
				$this->error($user->getError());
				}
			
			}			
		

	    

	
		}	

				
}