<?php
	header('content-Type:text/html;charset=utf-8');
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
	
	//转换硬路径常量
	define('ROOT_PATH',substr(dirname(__FILE__),0,-8));//dirname — 返回路径中的目录部分
	
	//拒绝php低版本
	if(PHP_VERSION<'4.1.0'){
		echo '版本太低';
	}
	
	//载入函数库
	require ROOT_PATH."includes/global.func.php";
	require ROOT_PATH."includes/mysql.func.php";
	define('START_TIME',run_time());//开始时间
	
	
	//1、数据库配置信息
	define("HOST","localhost"); //主机名
	define("USER","root");      //账号
	define("PASS","root");      //密码
	define("DBNAME","testguest");  //数据库名
	//2、初始化数据库
	_connect();//链接数据库
	select_db();//选择数据库
	set_names();//设置字符集
	//echo $link;
	
	//短信提醒功能
	$_message=_fetch_array("SELECT COUNT(tg_id) AS count FROM tg_message WHERE tg_state=0");
	//print_r($_message['count']);
	if(empty($_message['count'])){
		$_message_html='<strong"><a href="member_message.php">(0)</a></strong>';
	}else{
		$_message_html='<strong class="read"><a href="member_message.php">('.$_message['count'].')</a></strong>';
	}
		
?>