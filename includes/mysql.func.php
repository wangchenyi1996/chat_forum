<?php
header('content-Type:text/html;charset=utf-8');
//防止恶意调用
if(!defined('IN_TG')){
	exit("恶意调用");
}

//连接数据库	
function _connect(){
	//定义个全局变量，将此变量也能够在函数外部访问。
	global $link;
	$link=@mysql_connect(HOST,USER,PASS);
    if(!$link){
    	exit('连接失败');
    } 
}

//选择数据库
function select_db(){
	if(!mysql_select_db(DBNAME)){
		exit('数据库找不到');
	}
}

//设置字符集
function set_names(){
	if(!mysql_query('SET NAMES UTF8')){
		exit('设置字符集失败');
	}
}

//将结果集返回
function _query($sql){
	if(!$result=mysql_query($sql)){
		exit('SQL语句执行失败');
	}
	return $result;
}

//只获取一条结果集
function _fetch_array($sql){
	return mysql_fetch_array(_query($sql),MYSQL_ASSOC);
}

//返回指定结果集的所有数据
function _fetch_array_list($result){
	return mysql_fetch_array($result,MYSQL_ASSOC);
}

function _num_rows($result){
	return mysql_num_rows($result);
}

//关闭数据库
function _close(){
	return mysql_close();
}

//销毁结果集
function _free_result($result){
	return mysql_free_result($result);
}

//获取刚刚新增的id
function _insert_id(){
	return mysql_insert_id();
}
	 
?>