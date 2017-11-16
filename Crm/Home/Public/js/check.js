//是否为空
function checkSpace(node){
    var val=node.value.trim();
    if(val==""){
        return false;
    }
    return true;
}
//验证身份证号码
function checkCard(node){
    var val=node.value.trim();
    var filter=/^[1-9][0-9]{5}(19[0-9]{2}|200[0-9]|2010)(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])[0-9]{3}[0-9xX]$/i;
    if(!filter.test(val)){
       return false;
    }
    return true;
}
//验证手机号码
function checkMobile(node){
	var val=node.value.trim();
	var filter=/^1(3|7|5|8|)\d{9}$/;
	if(filter.test(val)&&val.length==11){ 
		return true;
	}else{
		return false;
	}
}
//验证密码
function checkRegisterPwd(node){
	var val=node.value.trim();
	if(val.length<6||val.length>15){
		return false;
	}
	return true;
}

function checkPassword(node){
	var val=node.value.trim();
	var filter=/.*[a-zA-Z].*[0-9]|.*[0-9].*[a-zA-Z]/;
	if(!filter.test(val)){
		return false;
	}
	return true;
}
function confirmPassword(node,lastNode){
	var val=node.value.trim();
	var lastVal=lastNode.value.trim();
	if(val != lastVal){
		return false;
	}
	return true;
}
function getDom(str){
	return document.querySelector(str)
}
