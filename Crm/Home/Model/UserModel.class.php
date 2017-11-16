<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	
	
	//静态验证
	protected $_validate = array(
       
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
		array('email', 'require', '邮箱不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已被注册！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('password', 'require', '密码不能为空！'), //默认情况下用正则进行验证     
        array('verify','check_verify','验证码错误',1,'callback',4)
    
    );
   
    //自动完成
  	protected $_auto = array (
        array('password', 'sha1', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
		array('regtime','time',3,'function')
    );
	
	
	
	//TP自带的验证码验证
   	function check_verify($code, $id = ''){
    	$verify = new \Think\Verify();
    	return $verify->check($code, $id);
	}
 
	


 	//Model验证登录,Session储存
    public  function login(){
	   $password=$this->password;
	   $info    =$this->where(array('username'=>$this->username))->find();
	   if($info){
		  
		  
		  
		   if($info['password']==$password){
			   
			   if($info['username']=='admin'){
			   
			   session('id',$info['id']);
			   session('username',$info['username']);			    
			   
			   }
			   else{
			   cookie('id',$info['id']);    
			   cookie('username',$info['username']); 
			   cookie('password',$info['password']); 
			  }
			   return true;
			   
			   
			   }
			   else{
			   return false;   
				   }
		   }
		else{
		
		return false;	
			 
		}  
	   
   }

		
}