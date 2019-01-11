window.onload=function(){
	code();
	var faceimg = document.getElementById("faceimg");
	faceimg.onclick=function(){
		window.open('face.php','face','width=400,height=400,top=0,left=0,scrollbars=1');
	}
		
	//表单验证如下
	var form=document.getElementsByTagName('form')[0];
	//onsubmit 事件在表单提交时触发。
	//能用客户端验证的尽量用客户端
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
		//2、密码和确认密码是否相同
		if(form.password.value!=form.notpassword.value){
			alert('两次密码输入不一致！');
			form.notpassword.value='';
			form.notpassword.focus();
			return false;
		}
		//密码提示与回答
		if(form.question.value.length<2||form.question.value.length>20){
			alert('密码提示长度不得小于2位或大于20位');
			form.question.value='';
			form.question.focus();
			return false;
		}
		if(form.answer.value.length<2||form.answer.value.length>20){
			alert('密码回答长度不得小于2位或大于20位');
			form.answer.value='';
			form.answer.focus();
			return false;
		}
		if(form.answer.value==form.question.value){
			alert('密码提示与密码回答不能相同');
			form.answer.value='';
			form.answer.focus();
			return false;
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
