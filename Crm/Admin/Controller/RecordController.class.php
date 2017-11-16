<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class RecordController extends CommonController {


	//获取医院列表模块
	public function index(){


		$record = M('Record'); 
		$count      = $record->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

		$list = $record->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();	



		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
	

	//添加医院列表模块
	public function add(){
		
		if(IS_POST){
			$hospital = D('Hospital');
			$data['name']=I('name');
			$data['website']=I('website');		
			$data['sort']=I('sort');	
			$data['addtime']=time();			
			//Model验证
			if($hospital->create($data)){
				if($hospital->add()){
					$this->success('医院添加成功',U('Index'));
					}
				else{
					$this->error('医院添加失败');
					}
				}
			else{
				$this->error($hospital->getError());
				}
				return;
			}
		
		$this->display();
		}
		
		
	//编辑医院列表模块
	public function edit(){
		$hospital = D('Hospital');
		if(IS_POST){
			$data['id']=I('id');
			$data['name']=I('name');
			$data['website']=I('website');		
			$data['sort']=I('sort');						
			//先自动验证
			if($hospital->create($date)){
				
				if($hospital->save()){
					$this->success('医院信息修改成功',U('Index'));
					}
				else{
					$this->error('医院信息未修改',U('Index'));
					}	
				
			}else{
				$this->error($hospital->getError());
			}
			
			return;			
			}
		$hospitalres=$hospital->find(I('id'));
		$this->assign('hospitalres',$hospitalres);
		$this->display();		
		}
		
		
		
	//删除医院列表模块
	public function del(){	
		$hospital = D('Hospital');
		if($hospital->delete(I('id'))){
			$this->success('医院删除成功!',U('Index'));
		}else{
			$this->error('医院删除失败!');
			}			
	}
	

	//搜索医院列表模块
	public function search(){	
		$hospital = M('Hospital');
		if(IS_POST){
			$map['name']=array('like','%'.I('name').'%');
			$list=$hospital->where($map)->select();
			}	
			
		$this->assign('list',$list);
		$this->display('Index');			
	}
	
}