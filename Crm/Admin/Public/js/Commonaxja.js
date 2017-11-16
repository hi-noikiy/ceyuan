//AjAx
//创建ajax引擎
function getxmlhttpobject()
{
 
var xmlhttprequest;
 
if(window.ActiveXObject){
  //IE内核的创建方式
   xmlhttprequest=new ActiveXObject("Microsoft.XMLHTTP"); 
 
}
else{
  //火狐内核的创建方式
xmlhttprequest=new  XMLHttpRequest();
}
 
    return xmlhttprequest;
}