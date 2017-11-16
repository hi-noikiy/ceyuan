<?php
//ArticleView视图模型
namespace Admin\Model;
use Think\Model\ViewModel;
class DoctorViewModel extends ViewModel {
	
   public $viewFields = array(
     'Doctor'=>array('id','uid','name','sex','addtime','_type'=>'LEFT'),
     'Hospital'=>array('name'=>'hname', '_on'=>'Hospital.id=Doctor.uid'),
   
   );	
		
}