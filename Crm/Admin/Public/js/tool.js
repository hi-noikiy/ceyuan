// JavaScript Document

thisURL = document.URL;

//创建首页小元素Delpart方法[ajax请求后]
function  delpart(id){
	var part=document.getElementById(id);
	removeElement(part)
	}
	
	
//创建删除节点的方法[ajax请求后]
function removeElement(_element){
         var _parentElement = _element.parentNode;
         if(_parentElement){
                _parentElement.removeChild(_element);  
         }
         }	

//创建id获取元素的方法
function getidobj(id){
	return document.getElementById(id);
	}
	
//创建上下切换医院的方法
function changehospital(action){
	selectobj=getidobj('selecthospital').options;//options数组
	nowselect=getidobj('selecthospital').selectedIndex;//当前选中的索引
	sumselect=selectobj.length-1;//数组的总个数
	if(action=='pre'){
		toselect=nowselect-1;
		}
		else
		{
		toselect=nowselect+1;
		}
	if(toselect>sumselect){
		toselect=0;
		}
	else if(toselect<0){
		toselect=sumselect;
		}
		getidobj('selecthospital').options[toselect].selected=true;
	}	
	
	
//统一清空首页active方法(){
function cleanactive(){
	getidobj('home').setAttribute("class", "");
	}	
		 



//对首页选中的active处理
if(thisURL.indexOf("Patient") > 0 )   
{   
    getidobj('patient').setAttribute("class", "active"); 
	cleanactive();
} 