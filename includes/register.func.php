<?php
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
	//判断函数是否存在
	if(!function_exists(_alert_back)){
		exit('_alert_back函数不存在，请检查。');
	}
	
//检查用户名
function _check_username($_string,$min_num=2,$max_num=20){
	$_string=trim($_string);//去除两边空格
	
	//长度大于20位或小于2位不合格
	if(mb_strlen($_string,'utf-8')<$min_num||mb_strlen($_string,'utf-8')>$max_num){
		_alert_back('用户名长度不得不能小于'.$min_num.'位或大于'.$max_num.'位');//调用_alert_back($info)函数来弹出窗口跳转
	}
	
	//去除特殊字符	preg_match — 执行匹配正则表达式
	$_char_pattem='/[<>\'\"\ ]/';
	if(preg_match($_char_pattem,$_string)){
		_alert_back('用户名中不能有特殊字符');
	}
	
	//敏感用户名限制
	$_mg[0]='李四';
	$_mg[1]='张三';
	$_mg[2]='王五';
	//弹出窗口告诉用户哪些敏感的用户名不能注册
	foreach($_mg as $value){
		$_mg_string.='['.$value.']'.'\n';
	}
	//绝对匹配
	if(in_array($_string,$_mg)){
		_alert_back($_mg_string.'等以上敏感用户名不得注册！');
	}
	return $_string;
}

//检查密码
function _check_password($_first_pass,$_end_pass,$min){
	//1、密码长度不小于6位
	if(strlen($_first_pass)<$min){
		_alert_back('密码不得小于'.$min.'位数字');
	}
	//2、密码和确认密码是否相同
	if($_first_pass!=$_end_pass){
		_alert_back('确认密码和密码输入不一致。');
	}
	//3、加密md5/sha1
	return sha1($_first_pass);
}

//密码提示
function _check_question($_string,$min,$max){
	$_string=trim($_string);//去除两边空格
	//密码提示不得不能小于$min位，不得大于$max位
	if(mb_strlen($_string,'utf-8')<$min||mb_strlen($_string,'utf-8')>$max){
		_alert_back('密码提示不得不能小于'.$min.'位或大于'.$max.'位');//调用_alert_back($info)函数来弹出窗口跳转
	}
	return $_string;
}

//密码回答
function _check_answer($_question,$_answer,$min,$max){
	//密码回答不得不能小于$min位，不得大于$max位
	if(mb_strlen($_answer,'utf-8')<$min||mb_strlen($_answer,'utf-8')>$max){
		_alert_back('密码回答不得不能小于'.$min.'位或大于'.$max.'位');//调用_alert_back($info)函数来弹出窗口跳转
	}
	//密码回答和密码提示不能相同
	if($_question==$_answer){
		_alert_back('密码回答和密码提示不能相同');
	}
	return sha1($_answer);
}

//邮箱验证
function _check_email($_email){
	//参考一个邮箱	abcbbc@163.com
	if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',$_email)){
		_alert_back('邮箱格式不正确！');
	}
	return $_email;
}
//QQ验证
function _check_qq($_qq){
	if(empty($_qq)){
		return null;
	}else{
		//参考一个QQ	1885201314
		if(!preg_match('/^[1-9]{1}[0-9]{4,9}$/',$_qq)){
			_alert_back('QQ号码格式不正确！');
		}
	}
	return $_qq;
}

//主页地址
function _check_url($_url,$_max_num){
	if(empty($_url)||($_url=='http://')){
		return null;
	}else{
		//参考一个网页地址 http://www.baidu.com
		if(!preg_match('/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/',$_url)){
			_alert_back('网页地址格式不正确！');
		}
		if(strlen($_url)>$_max_num){
			_alert_back('网页地址太长！');
		}
	}
	return $_url;
}

//唯一标识符
/*function _check_uniqid($first_uniqid,$end_uniqid){
	if(strlen($first_uniqid)!=40||($first_uniqid!=$end_uniqid)){
		_alert_back('唯一标识符异常');
	}
	return $first_uniqid;
} */

//验证修改时的密码
function _check_modify_password($_string,$min){
	if(!empty($_string)){
		//1、密码长度不小于6位
		if(strlen($_string)<$min){
			_alert_back('密码不得小于'.$min.'位数字');
		}
	}else{
		return null;
	}
	return sha1($_string);
}

function _check_content($_string){
	if(mb_strlen($_string,'utf-8')<10||mb_strlen($_string,'utf-8')>200){
		_alert_back('发信内容不得不能小于10位或大于200位');
	}
	return $_string;
}

//帖子标题验证
function _check_post_title($_string,$_min,$_max){
	if(mb_strlen($_string,'utf-8')<$_min||mb_strlen($_string,'utf-8')>$_max){
		_alert_back('帖子标题不得不能小于'.$_min.'位或大于'.$_max.'位');
	}
	return $_string;
}
//帖子内容验证
function _check_post_content($_string,$_num){
	if(mb_strlen($_string,'utf-8')<$_num){
		_alert_back('帖子内容不得不能小于'.$_num.'位');
	}
	return $_string;
}

//签名内容验证
function _check_autograph($_string,$_num){
	if(mb_strlen($_string,'utf-8')>$_num){
		_alert_back('签名内容不得不能大于'.$_num.'位');
	}
	return $_string;
}

//相册名称验证
function _check_dir_name($_string,$_min,$_max){
	if(mb_strlen($_string,'utf-8')<$_min||mb_strlen($_string,'utf-8')>$_max){
		_alert_back('名称不得不能大于'.$_max.'位或者小于'.$_min.'位');
	}
	return $_string;
}

//验证相册密码
function _check_dir_password($_string,$min){
	//1、密码长度不小于6位
	if(strlen($_string)<$min){
		_alert_back('密码不得小于'.$min.'位数字');
	}
	return sha1($_string);
}

//图片地址
function _check_photo_url($_string){
	if(empty($_string)){
		_alert_back('图片地址不能为空');
	}
	return $_string;
}
?>