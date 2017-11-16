<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;
use Think\Model;
class NoticeModel extends Model {
	
	
	//静态验证
	protected $_validate = array(
        array('title',  'require', '公告标题不能为空!'), 
        array('sendto', 'require', '发送目标不能为空!'), 
		array('content','require', '公告内容不能为空!')
    );
   

	
	

	




		
}