<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;
use Think\Model;
class DoctorModel extends Model {
	
	
	//静态验证
	protected $_validate = array(
        array('name', 'require', '医生姓名不能为空!'), 
        array('sex', 'require', '医生性别不能为空!'), 
		array('uid', 'require', '所属医院不能为空!')
    );
   

	
	

	




		
}