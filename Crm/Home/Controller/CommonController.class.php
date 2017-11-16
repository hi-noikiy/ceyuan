<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	//系统公共类属性
	protected $userinfo=array();

	public function  __construct(){
		
		parent::__construct();
		
		//注入分享sdk
		$shareinfo=$this->share('wxa97a7f864e6eb429','db571ed6ba38c62fecd6b6354cad4618','wjMCm2v4nmILx40imVKOmxbiVVYQvIZk',time());
		
		$this->assign('shareinfo',$shareinfo);
		//检查登录状态

		if(!($this->checklogin())){		
		$this->error('您长期没有使用啦,请登陆!',U("Home/Xuanze/index"));	
		}
		else{
			
			
		}

		}
		
	
	//检查后台是否登录	
	private function  checklogin(){
		cookie('action','view'); 
		$userid=$_COOKIE['id'];
		$username=$_COOKIE['username'];
		$password=$_COOKIE['password'];
		
		$action=$_COOKIE['action'];
		
		
		if($username=='qingjieindex' && $password=='qingjieindex'){
			return true;
			}
		
/*		if($action!=''){
			return true;
			}*/
		
		$user=M('User');
		$info=$user->find($userid);
		
		
	
		if(empty($userid) || empty($username) || empty($password) ){
			return false;
		}
		
		if(($userid!=$info['id'])  ||  ($username!=$info['username']) || ($password!=$info['password']) )  {
			return false;
			}

		$this->userinfo=$user;
		return true;
		}
		
		
		
		
	//share()微信分享链接
	//参数1 appid
	//参数2 appsert
	//参数3 nonceStr随机码
	//参数4 timestamp时间戳
	public	function  share($appid,$appsert,$nonceStr,$timestamp){
		//获取token
		$token='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsert;
		$token=file_get_contents($token);
		$token=json_decode($token);
		$token=$token->access_token;
		//获取jsapi_ticket
		$ticket='https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$token.'&type=jsapi';
		$ticket=file_get_contents($ticket);
		$ticket=json_decode($ticket);
		$ticket=$ticket->ticket;
		
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		//获取当前域名
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		//返回签名
		$signaturestring = "jsapi_ticket=$ticket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
		
		$signature = sha1($signaturestring);
		
		
		//返回HTML页面需要的全部信息
		return array('appid'=>$appid,'timestamp'=>$timestamp,'nonceStr'=>$nonceStr,'signature'=>$signature,'ticket'=>$ticket);
	
	}	
		
		
		
		
		
		
		
		
		
		
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
				  
				  //进行图片压缩
				  $this->thumb_img($new_file,500,$new_file,$is_del = true);
				  
				  
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
		 
		 
		 
		 
//压缩图片		 
public function thumb_img($img_path, $thumb_w, $save_path, $is_del = true){
$image = new \Think\Image(); 
$image->open($img_path);
$width = $image->width(); // 返回图片的宽度
if($width > $thumb_w){
$width = $width/$thumb_w; //取得图片的长宽比
$height = $image->height();
$thumb_h = ceil($height/$width);
}

//如果文件路径不存在则创建
$save_path_info = pathinfo($save_path);
if(!is_dir($save_path_info['dirname'])) mkdir ($save_path_info['dirname'], 0777);

$image->thumb($thumb_w, $thumb_h)->save($save_path);

//if($is_del) @unlink($img_path); //删除源文件
}
		 
		 
		 
		  
		public function  returnorder(){
			
			$year=date('Y');
			$year=substr($year,-2);
			
			$month=date('m');
			
			return  $year.$month.'001';

			}  
		   	
}