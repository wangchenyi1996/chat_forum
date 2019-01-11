window.onload=function(){
	var ret=document.getElementById("return");
	var del=document.getElementById("delete");
	ret.onclick=function(){
		history.back();
	};
	del.onclick=function(){
		if(confirm("确定要删除信息吗")){
			window.location.href="member_message_detail.php?action=delete&id="+this.name;  
		}
	};
};
