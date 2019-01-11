window.onload=function(){
	code();
	//表单验证如下
	var form=document.getElementsByTagName('form')[0];
	//onsubmit 事件在表单提交时触发。
	//能用客户端验证的尽量用客户端
	//alert(form);
	form.onsubmit=function(){
		//用户名验证
		if(form.username.value.length<2||form.username.value.length>20){
			alert('用户名长度不得小于2位或大于20位');
			form.username.value='';
			form.username.focus();
			return false;
		}
		if(/[<>\'\"\ ]/.test(form.username.value)){
			alert('用户名不能包含特殊字符');
			form.username.value='';
			form.username.focus();
			return false;
		}
		//密码验证
		if(form.password.value.length<6){
			alert('密码不得小于6位');
			form.password.value='';
			form.password.focus();
			return false;
		}
		//验证码验证4位就行
		if(form.code.value.length!=4){
			alert('验证码必须是4位');
			form.code.value='';
			form.code.focus();
			return false;
		}
		//return true;
	
	};
};