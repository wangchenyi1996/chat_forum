window.onload=function(){
	code();
	//表单验证如下
	var form=document.getElementsByTagName('form')[0];
	//onsubmit 事件在表单提交时触发。
	//能用客户端验证的尽量用客户端
	form.onsubmit=function(){
		//验证码验证4位就行
		if(form.code.value.length!=4){
			alert('验证码必须是4位');
			form.code.focus();
			return false;
		}
		//内容验证
		if(form.content.value.length<10||form.content.value.length>200){
			alert('短信内容长度不得小于10位或大于200位');
			form.content.focus();
			return false;
		}
		return true;	
	};
};
