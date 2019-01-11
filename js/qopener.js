window.onload=function(){
	var img=document.getElementsByTagName("img");
	for (i=0;i<img.length;i++) {
		img[i].onclick=function(){
			_opener(this.alt);
		}
	}
}


function _opener(src1){
	//opener表示父窗口
	opener.document.getElementsByTagName("form")[0].content.value+='[img]'+src1+'[/img]'
}

//老方法
/*function _opener(src1){
	//opener表示父窗口
	var faceimg=opener.document.getElementById("faceimg");
	faceimg.src=src1;
}*/



