<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ToolController extends Controller {


		
	

		
	//图片文件上传处理	
	public function  uploadimg($dir,$base64str){
			$up_dir = $dir;
 			$filename='';
			if(!file_exists($up_dir)){
			  mkdir($up_dir,0777);
			}
			 
			if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64str, $result)){
			  $type = $result[2];
			  if(in_array($type,array('pjpeg','jpeg','jpg','gif','bmp','png'))){
				$new_file = $up_dir.date('YmdHis_').'.'.$type;
				if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64str)))){
				  $img_path = str_replace('../../..', '', $new_file);
				  $filename=substr($new_file,1);
				  return $filename;
				}else{
				  $filename=1;
			 	  return $filename;
				}
			  }else{
				//文件类型错误
				  $filename=2;
			 	  return $filename;
			  }
			 
			}else{
			  //文件错误
			  				
				  $filename=3;
			 	  return $filename;
			}
		   }	
		  
		  
		   	
}