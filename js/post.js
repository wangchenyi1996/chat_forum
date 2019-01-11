window.onload=function(){
	code();
	var ubb=document.getElementById("ubb");
	ubbimg=ubb.getElementsByTagName("img");
	var fm=document.getElementsByTagName("form")[0];
	
	var font=document.getElementById("font");
	var color=document.getElementById("color");
	var html=document.getElementsByTagName('html')[0];
	
	var q=document.getElementById("q");
	var qa=q.getElementsByTagName("a");
	
	//能用客户端验证的尽量用客户端
	fm.onsubmit=function(){
		//标题
		if(fm.title.value.length<2||fm.title.value.length>40){
			alert('标题长度不得小于2位或大于40位');
			fm.title.value='';
			fm.title.focus();
			return false;
		}
		//内容
		if(fm.content.value.length<10){
			alert('内容不得小于10位');
			fm.content.value='';
			fm.content.focus();
			return false;
		}
		//验证码验证4位就行
		if(fm.code.value.length!=4){
			alert('验证码必须是4位');
			fm.code.value='';
			fm.code.focus();
			return false;
		}
		return true;
	}
	
	
	//贴图
	qa[0].onclick=function(){
		window.open('q.php?num=15&path=qimg/1/','q','width=400px,height=400px,scrollbars=1');
	}
	qa[1].onclick=function(){
		window.open('q.php?num=15&path=qimg/2/','q','width=400px,height=400px,scrollbars=1');
	}
	qa[2].onclick=function(){
		window.open('q.php?num=12&path=qimg/3/','q','width=400px,height=400px,scrollbars=1');
	}
	
	html.onmouseup=function(){
		font.style.display='none';
		color.style.display='none';
	}
	//字体放大
	ubbimg[0].onclick=function(){
		font.style.display='block';
	};
	//字体缩小
	ubbimg[1].onclick=function(){
		font.style.display='block';
	};
	//文字加粗
	ubbimg[4].onclick=function(){
		content('[b][/b]');
	};
	//文字颜色
	ubbimg[5].onclick=function(){
		color.style.display='block';
		fm.writecolor.focus();
	};
	//flash视频
	ubbimg[7].onclick=function(){
		var flash=prompt('请输入flash','http://');
		if(flash){
			if(/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+/.test(flash)){
				content('[flash]'+flash+'[/flash]');
			}else{
				alert('视频不合法');
			}
		}
	};
	//图片
	ubbimg[8].onclick=function(){
		var img=prompt('请输入图片地址');
		if(img){
			content('[img]'+img+'[/img]');
		}
	};
	//文字倾斜
	ubbimg[9].onclick=function(){
		content('[i][/i]');
	};
	//textarea rows增大
	ubbimg[10].onclick=function(){
		fm.content.rows+=2;
	};
	//textarea rows减小
	ubbimg[11].onclick=function(){
		fm.content.rows-=2;
	};
	//下划线
	ubbimg[13].onclick=function(){
		content('[u][/u]');
	};
	//电子邮件
	ubbimg[14].onclick=function(){
		var email=prompt('请输入邮件地址','@');
		if(email){
			if(/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(email)){
				content('[email]'+email+'[/email]');
			}else{
				alert('邮箱格式不正确');
			}
		}
		
	};
	//超链接
	ubbimg[15].onclick=function(){
		var url=prompt('请输入网址','http://');
		if(url){
			if(/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(url)){
				content('[url]'+url+'[/url]');
			}else{
				alert('网址格式不正确');
			}
		}
	};
	
	//取得textarea内容
	function content(string){
		fm.content.value+=string;
	}
	fm.writecolor.onclick=function(){
		showcolor(this.value);
	}
};
//设置字体大小
function font(size){
	document.getElementsByTagName("form")[0].content.value+='[size='+size+'][/size]';
};
//设置颜色
function showcolor(value){
	document.getElementsByTagName("form")[0].content.value+='[color='+value+'][/color]';
}
