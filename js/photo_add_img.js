window.onload=function(){
	var up=document.getElementById("up");
	up.onclick=function(){
		centerwindow('upimg.php?dir='+this.title,'up','200','450');
	};
	var fm=document.getElementsByTagName("form")[0];
	fm.onsubmit=function(){
		//图片名称
		if(fm.name.value.length<2||fm.name.value.length>20){
			alert('图片名称长度不得小于2位或大于20位');
			fm.name.focus();
			return false;
		}
		
		//图片地址
		if(fm.url.value==''){
			alert('图片地址不能为空');
			fm.url.focus();
			return false;
		}
		return true;
	};
	
};
//弹出窗口
function centerwindow(url,name,height,width){
	//在中心位置显示窗口
	var left=(window.screen.width-width)/2;
	var top=(window.screen.height-height)/2;
	window.open(url,name,'height='+height+',width='+width+',left='+left+',top='+top);
}