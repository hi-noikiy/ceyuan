<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class PatientController extends CommonController {
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
		
		
		
		//患者记录列表
		$patient = D('Patient'); 
		$count      = $patient->count();
		$Page       = new \Think\Page($count,5);
		$show       = $Page->show();// 
		$list = $patient->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
		}
	

	
	
	//添加患者信息
	public function add(){
		if(IS_POST){
			$patient = D('Patient');
			$data['name']=I('name');
			$data['sex'] =I('sex');		
			$data['age'] =I('age');	
			$data['tel'] =I('tel');
			$data['qq']  =I('qq');
			$data['entity']=I('entity');
			$data['from']  =I('from');
			$data['department'] =I('department');
			$data['appointtime']=I('appointtime');
			$data['askcontent'] =I('askcontent');
			$data['chatcontent']=I('chatcontent');
			$data['other']      =I('other');
			$data['addtime']    =time(); 
			
			//Model验证
			if($patient->create($data)){
				if($patient->add()){
					$this->success('患者信息添加成功',U('Index'));
					}
				else{
					$this->error('患者信息添加失败');
					}
				}
			else{
				$this->error($doctor->getError());
				}
			return;
			}
		
		
		$this->display();
	   }
       }
	   
	   
