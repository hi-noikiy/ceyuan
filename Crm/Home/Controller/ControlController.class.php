<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ControlController extends CommonController {
	//用户默认登录面板
	public function index(){	
		//查询所有办事处
		$office=D('Office');
		$officeres=$office->field('id,name')->select();
		$this->assign('officeres',$officeres);	
		//Ajax请求返回数据
		if(IS_POST){
			//获取查询需要的参数
			//data='office='+data['office']+'&time='+data['time']+'&tab='+data['tab']+'&page='+data['page'];
			$data['office']=I('office');
			$data['time']=I('time');
			$data['tab'] =I('tab');
			$data['page']=I('page');
			
			if($data['time']=='顺序'){
				$sort='id asc';
				}
			else{
				$sort='id desc';
				}	
	

			if($_COOKIE['username']!='qingjieindex'){
				
			//$map['adduser']=$_COOKIE['username'];
				
				}

			$limit=(($data['page']-1)*5).',5';
			
			if($data['office']!='全部'){
			$map['office']=$data['office'];
			}
			
			$trouble=M('Trouble');
			$field='DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%Y-%m-%d")as addtime,id,order,office,cishu,firstimg,lastimg ';
			//带反馈
			if($data['tab']=='待整改'){
				$map['state']=0;
				$troubleres=$trouble->where($map)->field($field)->order($sort)->limit($limit)->select();

				}
			else if($data['tab']=='审核中'){
				$map['state']=1;
				$troubleres=$trouble->where($map)->field($field)->order($sort)->limit($limit)->select();
				}
			else if($data['tab']=='已整改'){
				$map['state']=2;
				$troubleres=$trouble->where($map)->field($field)->order($sort)->limit($limit)->select();
				}
	
			
			echo json_encode($troubleres);
			//file_put_contents('1.txt',$data['office'].$data['time'].$data['tab'].$data['page']);
			exit();
			}
		
			
		$this->display();
		}
		
	
	
	
	//检查人员想修改的内容
	public function edit(){
		
		
		
		//				var data='url='+url+'&office='+office+'&place='+place+'&question='+question;
		
		
				//AJAX	
		if(IS_POST){
			
			$res=array();
			
			$data['office']=I('office');
			$data['place']=I('place');			
			$data['question']=I('question');

			

			
		    $trouble=D('Trouble');
			
			$map['id']=I('id');
			$map['state']=0;
			
			
			if($trouble->where($map)->save($data)){
				
				echo 'ok';
				exit();
				}
			else{
				

				echo 'err';
				exit();
				}	
			
			
		}
		
		
		
		
		
		
				//查询所有办事处
		$office=D('Office');
		$officeres=$office->field('id,name')->select();
		$this->assign('officeres',$officeres);	

		$trouble=D('Trouble');
		
		//查询是否存在
		
		if($troubleres=$trouble->find(I('id'))){
			$this->assign('troubleres',$troubleres);
			
			

			
		}
		else{

			}
		
		$this->display();	
		
	}
	
	
	
	
	//已整改详情
	public function yiwanchengxq(){

		
		$trouble=D('Trouble');
		$field='DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%Y-%m-%d")as addtime,order,id,office,question,place,cishu,firstimg ';
		if($troubleres=$trouble->field($field)->find(I('id'))){
			$this->assign('troubleres',$troubleres);
			//查询该id下的所有提交记录
		$troublelist=D('Troublelist');
		$map['uid']=$troubleres['id'];
		$troublelistres=$troublelist->where($map)->order('id desc')->select();
			$this->assign('troublelistres',$troublelistres);
			
			}
		$this->display();

		}	
		
		
	//待审核详情
	public function daishenhexq(){

		
		$trouble=D('Trouble');
		
		$data1['state']=1;
		$data1['id']=I('id');
		$field='DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%Y-%m-%d")as addtime,id,order,place,question,office,cishu,firstimg ';
		if($troubleres=$trouble->field($field)->where($data1)->find()){
			$this->assign('troubleres',$troubleres);
			//查询该id下的所有提交记录
		$troublelist=D('Troublelist');
		$map['uid']=$troubleres['id'];

		if($troublelistres=$troublelist->where($map)->order('id desc')->select()){
			$this->assign('troublelistres',$troublelistres);
		}

		}else{
			$url=U("Home/Control/index");
			echo "<script>alert('非需要审核的信息');window.location.href='".$url."';</script>";
			exit();
			
			}
		$this->display();

		}
		
		
		
		
		
		
		
	public function zhenggaitijiaoaccess(){
		
		
		$this->display();
	}
	
	//整改提交
	public function zhenggaitijiao(){
		$trouble=D('Trouble');
		$field='DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%Y-%m-%d")as addtime,place,question,id,order,office,cishu,firstimg ';
		if($troubleres=$trouble->field($field)->find(I('id'))){
			$this->assign('troubleres',$troubleres);
			}
			
		//AJAX	
		if(IS_POST){
			
			$res=array();
			$data['uid']=I('uid');
			$data['addtime']=date('Y-m-d');			
			$data['upimg']=$_POST['upimg'];			
			$data['remark']=I('remark');
			
			
			//上传文件
			
			$filename=$this->uploadimg('./upload/',$data['upimg']);
			//图片上传失败
			if($filename==1){
				
				$res['state']=1;
				}
			else if($filename==2){
				$res['state']=2;
				}	
			else if($filename==3){
				$res['state']=3;
				}
			//成功	
			else if($filename!=''){
			$data['upimg']=$filename;
			$troublelist=D('Troublelist');
			//再查询下数据库已经存在几条
			$map['uid']=$data['uid'];
			if($troublelistres=$troublelist->where($map)->select()){
				$data['cishu']=count($trouble)+1;
				}
			else{
				$data['cishu']=1;
				}	
			
			
			if($num=$troublelist->add($data)){
				
				$map['id']=$data['uid'];
				$map['cishu']=array('exp', 'cishu+1');
				$map['lastimg']=$data['upimg'];
				$map['state']=1;
				$map['lasttime']=time();
				
				

				
				$trouble->where('id='.$map['id'])->save($map);

				$res['state']=0;
				$res['id']   =$num;
				}
			else{
				//添加数据失败
				$res['state']=4;
				}
				
				}		
	
			echo json_encode($res);
			exit();
	
			
			
						
			}	
			
			
		$this->display();
	}
	
	//待整改详情
	public function daifankuixq(){

		
		$trouble=D('Trouble');
		$field='DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%Y-%m-%d")as addtime,id,order,place,question,office,cishu,firstimg ';
		if($troubleres=$trouble->field($field)->find(I('id'))){
			$this->assign('troubleres',$troubleres);
			
			
					//查询该id下的所有提交记录
		$troublelist=D('Troublelist');
		$map['uid']=$troubleres['id'];

		if($troublelistres=$troublelist->where($map)->order('id desc')->select()){
			$this->assign('troublelistres',$troublelistres);
		}

		}else{
			$url=U("Home/Control/index");
			echo "<script>alert('非需要整改的信息');window.location.href='".$url."';</script>";
			exit();
			
			
			
			}
		$this->display();

		}
		
		
	//增加问题	
	public function add(){
		
		if($_COOKIE['username']=='qingjieindex'){
			//alert('清洁人员无法添加问题反馈');
			 $url=U("Home/Control/index");
			echo "<script>alert('清洁人员无法添加问题反馈');window.location.href='".$url."';</script>";
			exit();
			}
		
		//查询所有办事处
		$office=D('Office');
		$officeres=$office->field('id,name')->select();
		$this->assign('office',$officeres);
		
		if(IS_POST){
			$res=array();
			$data['office']=I('office');
			$data['time']  =I('time');
			$data['place'] =I('place');
			$data['state'] =0;
			$data['upimg'] =I('upimg');
			$data['question']=I('question');
			$data['addtime']=strtotime($data['time']);
			$data['lasttime']=strtotime($data['time']);
			$data['adduser'] =$_COOKIE['username'];
			

         $filename=$this->uploadimg('./upload/',$data['upimg']);
			//图片上传失败
			if($filename==1){
				
				$res['state']=1;
				}
			else if($filename==2){
				$res['state']=2;
				}	
			else if($filename==3){
				$res['state']=3;
				}
			//成功	
			else if($filename!=''){
			$data['firstimg']=$filename;
			$data['lastimg']=$filename;
			$trouble=D('Trouble');
			
						

			
			//获取当前月
			$month = date('m');
			$year = date('y');
			//先查询是否本月已经存在订单
			$map['addtime']=$month;
			$troubleresm=$trouble->where('DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%m")='.$month .' AND '.   'DATE_FORMAT(FROM_UNIXTIME(addtime) ,"%y")='.$year    )->select();
			//本月已经有订单
			if($troubleresm){
				//再查询最新的记录
				$troubleresnew=$trouble->order('id  desc')->find();
				$data['order']=$troubleresnew['order']+1;
				
				}
			else{
				
				$data['order']=$this->returnorder();
				
				}	
			
			
			
			if($num=$trouble->add($data)){
				$res['state']=0;
				$res['id']   =$num;
				}
			else{
				//添加数据失败
				$res['state']=4;
				}
				
				}		
	
			echo json_encode($res);
			exit();
			}
	
		
		$this->display();
		
		

		
	}
	

	//增加问题成功
	public function addsuccess(){
		$id=I('id');

		//查询id的orderid
		$trouble = M("Trouble"); 
		$map['id']=$id;
		$troubleres=$trouble->where($map)->find();
		$this->assign('troubleres',$troubleres);

		$this->display();
	}
		


     public function shenhechuli(){
		 //var data='id='+id+'&listid='+listid+'&cl='+cl+'&yy='+yy;
		 $data['cl']=I('cl');
		 $data['id']=I('id');
		 $data['listid']=I('listid');
		 
		 if($data['cl']==''  ||   $data['id']==''  ||  $data['listid']==''){
			 
			 echo'所有内容不得为空!';
			 exit();
			 }
		 
		 
		 if($data['cl']==0){
			  $data['yuanyin']=I('yy');
			  //先更新主
				$trouble = M("Trouble"); 
				$map['state']=0;
				if($trouble->where('id='.$data['id'])->save($map)){
				//再更新子	
					$troublelist = M("Troublelist"); 
					$map['state']=0;
					$map['yuanyin']=$data['yuanyin'];
					if($troublelist->where('id='.$data['listid'])->save($map)){
						echo 'ok';
						}
					}
			 
			 
			 
			 
			 }
		else if($data['cl']==1){
			
						 
			  //先更新主
				$trouble = M("Trouble"); 
				$map['state']=2;
				if($trouble->where('id='.$data['id'])->save($map)){
				//再更新子	
					$troublelist = M("Troublelist"); 
					$map['state']=1;

					if($troublelist->where('id='.$data['listid'])->save($map)){
						echo 'ok';
						}
					}
			
			}	 
		 
		 
		 
		 
		 }
	
	
	

				
}