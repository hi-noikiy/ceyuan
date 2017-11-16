<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class AuthorityController extends CommonController {
	

	
	
	//显示用户
    public function Index(){
		$authority=D('Authority');
		$count= $authority->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)	
		$show = $Page->show();// 分页显示输出
		$list = $authority->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
 
	//添加用户组模块
	public function add(){
		//获取所有部门
		$department = D('Department');
		$departmentres= $department->field('id,name')->select();
		//将获取的部门注入
		$this->assign('departmentres',$departmentres);
		if(IS_POST){
			$doctor = D('Doctor');
			$data['name']=I('name');
			$data['sex'] =I('sex');		
			$data['uid'] =I('uid');	
			$data['addtime']=time();			
			//Model验证
			if($doctor->create($data)){
				if($doctor->add()){
					$this->success('医生信息添加成功',U('Index'));
					}
				else{
					$this->error('医生信息添加失败');
					}
				}
			else{
				$this->error($doctor->getError());
				}
				return;
			}
		
		$this->display();
		}
		
		
		
		
  	//编辑用户
    public function edit(){
		$authority=D('authority');
		if(I('id')==1){
			$this->success('管理员禁止编辑!',U('Index'));
			return;
			}
		//如果是提交表单,直接返回
		if(IS_POST){
			$data['id']=I('id');
			$data['title']=I('title');
			$data['content']=I('content');	
			$sendto=I('sendto');
			for($i=0;$i<count($sendto);$i++){
				if($i<(count($sendto)-1)){ 
					$data['sendto'].= $sendto[$i].',';
				}
				else{
					$data['sendto'].= $sendto[$i];
				}
				}
			
			
			
			
			//先自动验证
			if($authority->create($data)){
				
				if($authority->save()){
					$this->success('文章修改成功',U('Index'));
					}
				else{
					$this->error('文章修改失败');
					}	
				
			}else{
				$this->error($authority->getError());
			}
			
			return;			
			}
		
		$authoritys=$authority->find(I('id'));
		$this->assign('authoritys',$authoritys);
		$this->display();
    }
	
	
	
	
	
   
   	//删除用户组
    public function del(){
		$authority=D('authority');

		if($authority->delete(I('id'))){
			$this->success('用户组删除成功!',U('Index'));
		}else{
			$this->error('用户组删除失败!');
			}
		

    }
	
	
	
}