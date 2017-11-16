<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {
	
	//默认的系统设置				
	public function index(){
		$this->display();
		}
		
	//系统邮箱设置	
	public function mail(){
		
		$mail = D('Mail');
		if(IS_POST){
			$data['id']=I('id');
			$data['smtp']=I('smtp');
			$data['user']=I('user');
			$data['pass']=I('pass');		
			$data['from']=I('from');						
			//先自动验证
			if($mail->create($data)){
				
				if($mail->save()){
					$this->success('邮件配置修改成功',U('mail'));
					}
				else{
					$this->error('邮件配置未修改',U('mail'));
					}	
				
			}else{
				$this->error($mail->getError());
			}
			
			return;			
			}
		$mailres=$mail->where('id=1')->find();
		$this->assign('mailres',$mailres);
		$this->display();			
		}	
		
	//系统安全设置	
	public function safe(){

		$this->display();
		}			
	

				
}