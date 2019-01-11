<?php
	header('content-Type:text/html;charset=utf-8');
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
	
	if(!defined('SCRIPT')){
		exit('非法调用');
	}
?>
	<link rel="stylesheet" type="text/css" href="css/css1/base.css"/>
	<link rel="stylesheet" type="text/css" href="css/css1/<?php echo SCRIPT?>.css"/>
	<link rel="shortcut icon" href="icon.ico" />
