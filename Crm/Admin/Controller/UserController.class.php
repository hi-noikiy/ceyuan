<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	

	
	
	//显示用户
    public function Index(){
		$user=D('User');
		$count= $user->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)	
		$show = $Page->show();// 分页显示输出
		$list = $user->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }









	//添加用户模块
	public function add(){
		
		if(IS_POST){
			$user = D('User');
			$data['username']=I('name');
			$data['sex']=I('sex');		
			$data['qq']=I('qq');	
			$data['mobile']=I('mobile');
			$data['email']=I('email');
			$data['password']=I('password');	
			
			if($data['username']=='' || $data['password']=='' ){
				$this->error('用户名和密码不得为空!');
				
				}
			
				
			//Model验证
			if($user->create($data)){

				if($info=$user->add()){

					$this->success('添加成功',U('index'));


					}
				else{
					$this->error('添加失败');
					}
				}
			else{
				$this->error($user->getError());
				}
				return;
			}
		
		$this->display();
		}







  
  	//编辑用户
    public function edit(){
		$user=D('User');
		if(I('id')==1){
			$this->success('管理员禁止编辑!',U('Index'));
			return;
			}
		//如果是提交表单,直接返回
		if(IS_POST){
			$data['id']=I('id');
			$data['sex']=I('sex');
			$data['qq']=I('qq');	
			$data['mobile']=I('mobile');
			$data['email']=I('email');
			if(I('password')!=''){
				$data['password']=$_POST['password'];
				$field='id,sex,qq,mobile,email,password';
				}
			else{
				$field='id,sex,qq,mobile,email';
				}	
			
			//先自动验证
			if($user->create($data)){
				
				if($user->field($field)->save()){
					$this->success('修改成功',U('index'));
					}
				else{
					$this->error('修改失败或未修改');
					}	
				
			}else{
				$this->error($user->getError());
			}
			
			return;			
			}
		
		$map['id']=I('id');
		$users=$user->where($map)->find();
		$this->assign('users',$users);
		$this->display();
    }
	
	
	
	
	
   
   	//删除用户
    public function del(){
		$User=D('User');
		if(I('id')==1){
			$this->success('管理员禁止删除!',U('index'));
			return;
			}
		if($User->delete(I('id'))){
			$this->success('用户删除成功!',U('index'));
		}else{
			$this->error('用户删除失败!');
			}
		

    }
	
	
	
	//搜索用户
	public function search(){	
		$User = M('User');
		if(IS_POST){
			$map['username']=array('like','%'.I('name').'%');
			$list=$User->where($map)->select();
			}	
			
		$this->assign('list',$list);
		$this->display('index');			
	}
		
}