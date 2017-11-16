/*
-------------
使用方法:
1.ajaxrequest()函数执行准备的参数(1.请求地址2.发送数据字符串拼接3.type值可选get/post4.回调函数名称)
 
example:
 
ajaxrequest('login.php','user=1&pass=2','post',dealwith);
 
function dealwith()
{ 
if(myxmlhttprequest.readyState==4)
{
 
//mes的值是login.php页面返回的值
var mes= myxmlhttprequest.responseText;
 
//如果页面输出的是json值,还需要进行eval处理
var mes_obj=eval("("+mes+")");
 
 
} 
}
 
tip:ajaxrequest()以post方式发送数据user=1&pass=2,当服务器端收到请求并返回数据,此时
 
dealwith()方法来处理返回的数据
 
*/
 
 
//Allvariable 回调函数使用
var myxmlhttprequest="";
 
 
//Createxmlhttp 创建Ajax引擎
function getxmlhttpobject()
{ 
var xmlhttprequest;
 
if(window.ActiveXObject){
   xmlhttprequest=new ActiveXObject("Microsoft.XMLHTTP"); 
 
}
else{
xmlhttprequest=new  XMLHttpRequest();
}
    return xmlhttprequest;
}
 
 
//Createajaxrequest 发起请求
function ajaxrequest(url,data,type,callbackfunc)
{ 
myxmlhttprequest=getxmlhttpobject();
if (myxmlhttprequest)
{
myxmlhttprequest.open(type,url,true); 
myxmlhttprequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
myxmlhttprequest.onreadystatechange=callbackfunc;
myxmlhttprequest.send(data);
}
}