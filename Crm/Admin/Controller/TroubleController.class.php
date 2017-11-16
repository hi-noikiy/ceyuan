<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class TroubleController extends CommonController {


	//获取反馈列表模块
	public function index(){

		//获取所有办事处
		$office = D('Office');
		$officeres= $office->select();
		$this->assign('officeres',$officeres);
		
		
		
		$trouble = D('Trouble'); 
		$count      = $trouble->where('state=0')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $trouble->where('state=0')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
	

	//获取待审核列表模块
	public function daishenhe(){

		//获取所有办事处
		$office = D('Office');
		$officeres= $office->select();
		$this->assign('officeres',$officeres);
		
		
		
		$trouble = D('Trouble'); 
		$count      = $trouble->where('state=1')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $trouble->where('state=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
		
		
		
	//获取已整改列表模块
	public function yiwancheng(){

		//获取所有办事处
		$office = D('Office');
		$officeres= $office->select();
		$this->assign('officeres',$officeres);
		
		
		
		$trouble = D('Trouble'); 
		$count      = $trouble->where('state=2')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $trouble->where('state=2')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
		
		
		
	//编辑单个信息模块
	public function edit(){


		$trouble = D('Trouble');
		$troublelist = D('Troublelist');
		if(IS_POST){
			$data['id']=I('id');
			$data['listid']=I('listid');
			
			if($data['listid']==''){
				
				$this->error('该反馈无整改历史不需要审核',U('Index'));
				exit();
				}

			$data['state']=I('state');
			$data['yuanyin']=I('yuanyin');

			if($data['state']=='0'){
				$data['state']=2;
				$data1['state']=1;
				}
			else if($data['state']=='1'){
				
				if($data['yuanyin']==''){
					
					$this->error('请填写拒绝原因',U('index'));
					
				}else{
					
					$data1['state']=0;
					$data1['yuanyin']=$data['yuanyin'];
					
					}
				
				$data['state']=0;
				
				}	

			
			
			
								
			//先自动验证
			if($trouble->create($data)){
				
				//先修改trouble
				if($trouble->save()){
					
					//再修改最新的的list
					
					if($troublelist->where('id='.$data['listid'])->save($data1)){
					
					$this->success('修改成功',U('daishenhe'));
					
					}
					}
				else{
					$this->error('信息未修改',U('daishenhe'));
					}	
				
			}else{
				$this->error($trouble->getError());
			}
			
			return;			
			}
		//查找主问题	
		$troubleres=$trouble->find(I('id'));
		if($troubleres){
			
			//继续找到子记录
			$troublelist=D('Troublelist');
			$map['uid']=I('id');;
			$troublelistres=$troublelist->where($map)->order('id desc')->select();
			$this->assign('troublelistres',$troublelistres);
			}
		else{
			
			$this->error('记录未找到,非待审核中的记录',U('daishenhe'));
			
			}	
		
		
		$this->assign('troubleres',$troubleres);
		$this->display();		
		}
		
		//编辑单个信息模块
	public function ywcedit(){


		$trouble = D('trouble');
		if(IS_POST){
			$data['id']=I('id');
			$data['state']=I('state');
			$data['yuanyin']=I('yuanyin');




			if($data['state']=='0'){
				$data['state']=2;
				}
			else if($data['state']=='1'){
				
				if($data['yuanyin']==''){$this->error('请填写拒绝原因',U('Index'));}
				
				$data['state']=0;
				
				}	

			
			
			
								
			//先自动验证
			if($trouble->create($data)){
				
				if($trouble->save()){
					$this->success('修改成功',U('daishenhe'));
					}
				else{
					$this->error('信息未修改',U('daishenhe'));
					}	
				
			}else{
				$this->error($trouble->getError());
			}
			
			return;			
			}
		//查找主问题	
		$map1['id']=I('id');
		$map1['state']=2;
		$troubleres=$trouble->where($map1)->find();
		if($troubleres){
			
			//继续找到子记录
			$troublelist=D('Troublelist');
			$map['uid']=I('id');;
			$troublelistres=$troublelist->where($map)->order('id desc')->select();
			$this->assign('troublelistres',$troublelistres);
			}
		else{
			
			$this->error('记录未找到,非已经完成整改的记录',U('daishenhe'));
			
			}	
		
		
		$this->assign('troubleres',$troubleres);
		$this->display();		
		}	
		
	//查看单个信息模块
	public function view(){


		$trouble = D('trouble');
		$troubleres=$trouble->find(I('id'));
		$this->assign('troubleres',$troubleres);
		$this->display();		
		}
		
		
		
		
	//查看单个信息模块
	public function sview(){


		$trouble = D('trouble');
		$troubleres=$trouble->find(I('id'));
		$this->assign('troubleres',$troubleres);
		$this->display();		
		}		
		
		
	//删除模块
	public function del(){	
		$trouble = D('Trouble');
		if($trouble->delete(I('id'))){
			$this->success('信息删除成功!',U('index'));
		}else{
			$this->error('信息删除失败!');
			}			
	}
	

	//搜索模块
	public function search(){	

		
		$trouble = D('Trouble');
		if(IS_POST){
			
			$model=I('model');
			
			
			
			
			
			if($model==1){
				$map['order']=I('name');
				
				}
			else{
				$map['adduser']=I('name');
				}
			
			
	
			
			$list=$trouble->where($map)->select();
			}	
			
			
		$this->assign('list',$list);
		$this->display('search');				
	}
	
	
	
	
	
	
	//全部列表
	public function quanbu(){

		//获取所有办事处
		$office = D('Office');
		$officeres= $office->select();
		$this->assign('officeres',$officeres);
		
		
		
		$trouble = D('Trouble'); 
		$count      = $trouble->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $trouble->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		}
	
	//导出
	public function daochu(){
		
		if(IS_POST){
			
			$start=strtotime(I('start'));
			$end  =strtotime(I('end'));
			$state=I('state');
			if($state!='4'){
				
				$map['state']=$state;
				
				}
			if($start==''  ||  $end==''){
				$this->error('开始日期和结束日期不得为空!');
				}
				

			$map['addtime']=array('between',array($start,$end));
			$trouble=M('Trouble');
			$troubleres=$trouble->field('id,order,state,cishu,office,place,question,addtime,lasttime,adduser')->where($map)->select();
			if(!$troubleres){
				$this->error('按照您的条件没有找到数据!');
				}

			






	import("Org.Util.PHPExcel");

	$objPHPExcel=new \PHPExcel();


	//设置excel的属性,右键属性,wps/excel均会显示
	$objPHPExcel->getProperties()->setCreator("JAMES")
								 ->setLastModifiedBy("JAMES")
								 ->setTitle("zltrans")
								 ->setSubject("Dorder")
								 ->setDescription("Dorder List")
								 ->setKeywords("Dorder")
								 ->setCategory("Test"); 

	//设置Excel中显示的顶部字段
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1','编号')
		->setCellValue('B1','办事处')
		->setCellValue('C1','上传时间')
		->setCellValue('D1','地点')
		->setCellValue('E1','问题描述')
		->setCellValue('F1','整改前图片')
		->setCellValue('G1','整改后图片')
		->setCellValue('H1','最新整改时间')
		->setCellValue('I1','状态')
		->setCellValue('J1','添加人')
		->setCellValue('K1','整改次数')
		->setCellValue('L1','历史补充说明')
		->setCellValue('M1','历史不通过说明');	
		
		
		
		

	
	
	

	 $data=array('A','B','C','D','E','F','G','H','I','J','K','L','M');
     
	 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(13);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); 
	 $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); 
	 
	 $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);
	
	
	
	//A1B1C1D1已经占用第一行,因此插入从2开始,每次插入的行数=$i+2
	
	
	
	for($i=0;$i<count($troubleres);$i++){
		
		//设置Excel行数
		$linenum=$i+2;
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$linenum,$troubleres[$i]['order']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$linenum,$troubleres[$i]['office']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$linenum,date('Y-m-d',$troubleres[$i]['addtime']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$linenum,$troubleres[$i]['place']);
		//分割question
		 $str=$troubleres[$i]['question'];
         $newstr = substr($str,0,strlen($str)-1); 
		 $hello = explode('#',$newstr);
		 for($j=0;$j<count($hello);$j++){
			 $question.='问题'.($j+1).':'.$hello[$j]."\r\n";
			 
		 }
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$linenum,$question);
		$question='';
		if($troubleres[$i]['state']=='0'){
			$vstate='待整改';
			}
		else if($troubleres[$i]['state']=='1'){
			$vstate='待审核';
			}
		else if($troubleres[$i]['state']=='2'){
			$vstate='已完成';
			}
		
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$linenum,'');
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$linenum,'');
		
		
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$linenum,date('Y-m-d',$troubleres[$i]['lasttime']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$linenum,$vstate);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$linenum,$troubleres[$i]['adduser']);	
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$linenum,$troubleres[$i]['cishu']);	
		
		
		
		//查询是否有list
		$troublelist=M('troublelist');
		$cmap['uid']=$troubleres[$i]['id'];
		$troublelistres=$troublelist->where($cmap)->select();
		
//		var_dump($troublelistres);
//		exit();
         $remark='';
		 $yuanyin='';
		for($k=0;$k<count($troublelistres);$k++){
			if($troublelistres[$k][remark]==''){
				$remark.='第'.($k+1)."次:未填写\r\n";	
				}
			else{
				$remark.='第'.($k+1).'次:'.$troublelistres[$k][remark]."\r\n";
				}
			if($troublelistres[$k][yuanyin]==''){
				$yuanyin.='第'.($k+1)."次:未填写\r\n";	
				}
			else{
				$yuanyin.='第'.($k+1).'次:'.$troublelistres[$k][yuanyin]."\r\n";
				}		
			}
		
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$linenum,$remark);
		
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$linenum,$yuanyin);

	
		
		
		}


	

	//$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
	

	//$objPHPExcel->getActiveSheet()->getStyle('A18')->getAlignment()->setWrapText(true);

	//保存
		
	import("Org.Util.PHPExcel.IOFactory");
	
	$objWrite=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
	$filename='Excel/'.time().'.xlsx';
	$objWrite->save($filename);
	
	$downfile='http://'.$_SERVER['HTTP_HOST'].'/'.$filename;
			
    header("Location: ".$downfile); 
    exit;
			
			
			}
		$this->display();
	}
	
	
}