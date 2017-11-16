<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;
use Think\Model;
class HospitalModel extends Model {
	
	
	//静态验证
	protected $_validate = array(
        array('name', 'require', '医院名称不能为空！'), 
        array('name', '', '医院名称已经存在！', 0, 'unique', 1), 
		array('sort', 'require', '显示顺序不能为空！')
    );
   
   
   
   public function    createtable($num){
	   
		$sql = <<<sql
		DROP TABLE IF EXISTS `think_patient$num`;
		CREATE TABLE `think_patient$num` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//患者id',
		  `name` varchar(100) NOT NULL COMMENT '//患者姓名',
		  `age` varchar(100) NOT NULL COMMENT '//患者年龄',
		  `tel` varchar(100) NOT NULL COMMENT '//患者电话',
		  `qq` varchar(100) NOT NULL COMMENT '//患者QQ',
		  `entity` varchar(100) NOT NULL COMMENT '//病种名称',
		  `from` varchar(100) NOT NULL COMMENT '//来源渠道',
		  `department` varchar(100) NOT NULL COMMENT '//所属科室',
		  `appointtime` int(11) NOT NULL COMMENT '//预约时间',
		  `askcontent` varchar(255) NOT NULL COMMENT '//咨询内容',
		  `chatcontent` varchar(1000) NOT NULL COMMENT '//聊天内容',
		  `other` varchar(255) NOT NULL COMMENT '//备注信息',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;	
sql;
	  
	  
	  	if($this->execute($sql)!==false){
		return true;	
		}
		else{
		return false;	
			}
	   }

	
	
   public function    deletetable($num){
		$sql = <<<sql
		DROP TABLE IF EXISTS `think_patient$num`;
sql;
	  $this->execute($sql);
	   }
	




		
}