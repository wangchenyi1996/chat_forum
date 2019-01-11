<?php
	session_start();//开启会话
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	_unsetcookie();
?>