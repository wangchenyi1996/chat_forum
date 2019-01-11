<?php
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','thumb');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";
		
	//执行等比缩放函数
	if(isset($_GET['filename'])&&isset($_GET['percent'])){
		_thumb($_GET['filename'],$_GET['percent']);
	}
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--头像选择</title>
	</head>
	<body>
		
	</body>
</html>
	