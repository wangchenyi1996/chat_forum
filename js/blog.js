window.onload=function(){
	var message=document.getElementsByName("message");
	for (var i=0;i<message.length;i++) {
		message[i].onclick=function(){
			centerwindow('message.php?id='+this.title,'message',250,400);
		};
	}
	
};
//弹出窗口
function centerwindow(url,name,height,width){
	//在中心位置显示窗口
	var left=(window.screen.width-width)/2;
	var top=(window.screen.height-height)/2;
	window.open(url,name,'height='+height+',width='+width+',left='+left+',top='+top);
}

