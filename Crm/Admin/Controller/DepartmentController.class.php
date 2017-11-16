<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class DepartmentController extends CommonController {


	//获取部门列表模块
	public function index(){		
		$department = D('Department'); 
		$count      = $department->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $department->order('sort asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
	

	//添加部门列表模块
	public function add(){
		$department = D('Department');
		
		//获取所有部门
		$departmentres= $department->field('id,name')->select();
		//将获取的部门注入
		$this->assign('departmentres',$departmentres);		
		
		if(IS_POST){
			
			$data['name']=I('name');
			$data['sort']	 =I('sort');
			$data['model']	 =I('model');
			if($data['model']==2){
				$data['diy']=null;		
				}
			else{
				$diy=I('diy');
				for($i=0;$i<count($diy);$i++){
					
					if($i<(count($diy)-1)){ 
					$data['diy'].=$diy[$i].',';
					}
					else{
					$data['diy'].=$diy[$i];	
						}
					}
	
				}			

			$data['addtime'] =time();			
			//Model验证
			if($department->create($data)){
				if($department->add()){
					$this->success('部门添加成功',U('Index'));
					}
				else{
					$this->error('部门添加失败');
					}
				}
			else{
				$this->error($department->getError());
				}
				return;
			}
		
		$this->display();
		}
		
		
	//编辑部门列表模块
	public function edit(){
		$department = D('Department');
		
		//获取所有部门
		$alldepartmentres= $department->field('id,name')->select();
		//将获取的部门注入
		$this->assign('alldepartmentres',$alldepartmentres);
			
		if(IS_POST){
			$data['id']=I('id');
			$data['name']=I('name');
			$data['sort']	 =I('sort');	
			$data['model']	 =I('model');
			if($data['model']==2){
				$data['diy']=null;		
				}
			else{
				$diy=I('diy');
				if($diy!=''){	
				
				for($i=0;$i<count($diy);$i++){
					if($i<(count($diy)-1)){ 
					$data['diy'].=$diy[$i].',';
					}
					else{
					$data['diy'].=$diy[$i];	
						}
					}
					}
				}						
			//先自动验证
			if($department->create($data)){
				
				if($department->save()){
					$this->success('部门信息修改成功',U('Index'));
					}
				else{
					$this->error('部门信息未修改',U('Index'));
					}	
				
			}else{
				$this->error($department->getError());
			}
			
			return;			
			}
		$departmentres=$department->find(I('id'));
		$this->assign('departmentres',$departmentres);
		$this->display();		
		}
		
		
		
	//删除部门列表模块
	public function del(){	
		$department = D('Department');
		if($department->delete(I('id'))){
			$this->success('部门删除成功!',U('Index'));
		}else{
			$this->error('部门删除失败!');
			}			
	}
	

   
   //Ajax接口
   public function Ajaxdepartment(){
	   
	   $department=D('department');
	   $data=array();
	   $data['uid']=$id;
	   $data['model']=2;
	   $cateres=$department->where($data)->select();
	   echo json_encode($cateres);
	
   }
	
}