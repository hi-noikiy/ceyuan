<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends CommonController {
	

	
	
	//显示公告
    public function Index(){
		$notice=D('Notice');
		$count= $notice->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)	
		$show = $Page->show();// 分页显示输出
		$list = $notice->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
 
 	//添加文章
    public function add(){
		
		$notice=D('Notice');		
		if(IS_POST){
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
			
			$data['sendtime']=time();
			
			//先自动验证
			if($notice->create($data)){
				
				if($notice->add()){
					$this->success('公告发布成功',U('Index'));
					}
				else{
					$this->error('公告发布失败');
					}	
				
			}else{
				$this->error($notice->getError());
			}
			
			return;			
			}
		//栏目注入	
		$hospitalres=D('Hospital')->select();
		$this->assign('hospitalres',$hospitalres);
		$this->display();
    }
  
  	//编辑文章
    public function edit(){
		$notice=D('Notice');
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
			if($notice->create($data)){
				
				if($notice->save()){
					$this->success('文章修改成功',U('Index'));
					}
				else{
					$this->error('文章修改失败');
					}	
				
			}else{
				$this->error($notice->getError());
			}
			
			return;			
			}
		
		$notices=$notice->find(I('id'));
		$hospitalres =D('Hospital')->field('id,name')->select();
		$this->assign('hospitalres',$hospitalres);
		$this->assign('notices',$notices);
		//注入本条公告的发送目标
		$sendto=explode(',',$notices['sendto']);
		$this->assign('sendto',$sendto);
		$this->display();
    }
	
	
	
	
	
   
   	//删除公告
    public function del(){
		$notice=D('Notice');

		if($notice->delete(I('id'))){
			$this->success('公告删除成功!',U('Index'));
		}else{
			$this->error('公告删除失败!');
			}
		

    }
	
	
	
	//搜索公告
	public function search(){	
		$notice = M('Notice');
		if(IS_POST){
			$map['name']=array('like','%'.I('name').'%');
			$list=$notice->where($map)->select();
			}	
			
		$this->assign('list',$list);
		$this->display('Index');			
	}
		
}