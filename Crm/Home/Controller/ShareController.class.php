<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ShareController extends Controller {



	public function  __construct(){
		
		parent::__construct();
	
		//注入分享sdk
		$shareinfo=$this->share('wxa97a7f864e6eb429','db571ed6ba38c62fecd6b6354cad4618','wjMCm2v4nmILx40imVKOmxbiVVYQvIZk',time());
		
		$this->assign('shareinfo',$shareinfo);
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

		   	
}