<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;
use Think\Model;
class DepartmentModel extends Model {
	
	
	//静态验证
	protected $_validate = array(
        array('name', 'require', '部门名称不能为空！'), 
        array('hospital', 'require', '所属医院不能为空！'), 
    );
   

	
	

	




		
}