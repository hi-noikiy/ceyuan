<?php
namespace Admin\Controller;
use Think\Controller;
class InoutController extends Controller {
    

 
 
 /**方法**/
function  index(){

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
		->setCellValue('A1','用户名')
		->setCellValue('B1','密码')
		->setCellValue('C1','QQ号码')
		->setCellValue('D1','手机号码');
		
		
	//获取用户表的数据
	$user=M('User');
	$result=$user->field('username,password,qq,mobile')->select();
	
	
	
	//设置要显示的列数
	$data=array('A','B','C','D');
	foreach($data as  $vo){
		 $objPHPExcel->getActiveSheet()->getColumnDimension($vo)->setWidth(25);
		}

	
	
	
	//A1B1C1D1已经占用第一行,因此插入从2开始,每次插入的行数=$i+2
	
	
	
	for($i=0;$i<count($result);$i++){
		
		//设置Excel行数
		$linenum=$i+2;

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$linenum,$result[$i]['username']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$linenum,$result[$i]['password']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$linenum,(string)$result[$i]['qq']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$linenum,$result[$i]['mobile']);

			
	
		
		
		}


	

	//$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
	

	//$objPHPExcel->getActiveSheet()->getStyle('A18')->getAlignment()->setWrapText(true);

	//保存
		
	import("Org.Util.PHPExcel.IOFactory");
	
	$objWrite=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
	$objWrite->save('test.xlsx');
	






 
 
 
 
}


}
?>