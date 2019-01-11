<?php
//防止恶意调用
if(!defined('IN_TG')){
	exit("恶意调用");
}
//判断函数是否存在
if(!function_exists(_alert_back)){
	exit('_alert_back函数不存在，请检查。');
}

//生成登录cookie
function _setcookies($username,$password,$time){
	//cookie保留时间1天，一月，一周
	switch($time){
		case '0':
		setcookie('username',$username);
		setcookie('password',$password);
		break;
		case '1'://一天
		setcookie('username',$username,time()+86400);
		setcookie('password',$password,time()+86400);
		break;
		case '2'://一周
		setcookie('username',$username,time()+604800);
		setcookie('password',$password,time()+604800);
		break;
		case '3'://一月
		setcookie('username',$username,time()+2592000);
		setcookie('password',$password,time()+2592000);
		break;
	}
}


//检查用户名
function _check_username($_string,$min_num=2,$max_num=20){
	$_string=trim($_string);//去除两边空格
	
	//长度大于20位或小于2位不合格
	if(mb_strlen($_string,'utf-8')<$min_num||mb_strlen($_string,'utf-8')>$max_num){
		_alert_back('用户名长度不得不能小于'.$min_num.'位或大于'.$max_num.'位');//调用_alert_back($info)函数来弹出窗口跳转
	}
	
	//去除特殊字符	preg_match — 执行匹配正则表达式
	$_char_pattem='/[<>\'\"\ \	]/';
	if(preg_match($_char_pattem,$_string)){
		_alert_back('用户名中不能有特殊字符');
	}
	
	return $_string;
}


//检查密码
function _check_password($_string,$min){
	//1、密码长度不小于6位
	if(strlen($_string)<$min){
		_alert_back('密码不得小于'.$min.'位数字');
	}
	//2、加密md5/sha1
	return sha1($_string);
}

//是否保留登录时间
function _check_time($_string){
	$_time=array('0','1','2','3');//0，1，2，3分别代表时间
	//绝对匹配
	if(!in_array($_string,$_time)){
		_alert_back('保留方式出错！');
	}
	return $_string;
}

?>