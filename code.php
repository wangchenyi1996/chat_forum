<?php
	session_start();//开启会话
	//error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//允许验证码函数(参数灵活)
	//默认验证码为75*25   位数为4，如果为6为长度推荐125*25 ，如果为8位长度为175
	//第四个参数为是否要黑色边框
	//code(180,30);
	code();
	//code(175,30,8,true);
	//code(180,30,8,false);
	//code(175,25,8,false);
?>

