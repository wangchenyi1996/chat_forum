window.onload=function(){
	code();
	
	//表单验证如下
	var form=document.getElementsByTagName('form')[0];
	//onsubmit 事件在表单提交时触发。
	//能用客户端验证的尽量用客户端
	form.onsubmit=function(){
		//密码验证
		if(form.password.value!=''){
			if(form.password.value.length<6){
				alert('密码不得小于6位');
				form.password.value='';
				form.password.focus();
				return false;
			}
		}
		//邮箱验证
		if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(form.email.value)){
			alert('邮箱格式不正确');
			form.email.value='';
			form.email.focus();
			return false;
		}
		//QQ验证
		if(form.qq.value!=''){
			if(!/^[1-9]{1}[0-9]{4,9}$/.test(form.qq.value)){
			alert('QQ格式不正确');
			form.qq.value='';
			form.qq.focus();
			return false;
			}
		}
		//网址验证
		if(form.url.value!=''){
			if(!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(form.url.value)){
			alert('网址格式不正确');
			form.url.value='';
			form.url.focus();
			return false;
			}
		}
		//验证码验证4位就行
		if(form.code.value.length!=4){
			alert('验证码必须是4位');
			form.code.value='';
			form.code.focus();
			return false;
		}
		return true;	
	};
};
