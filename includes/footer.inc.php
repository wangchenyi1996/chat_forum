<?php
	//header('content-Type:text/html;charset=utf-8');
	//防止恶意调用
	if(!defined('IN_TG')){
		exit("恶意调用");
	}
	//关闭数据库
	mysql_close();
?>
<div id="footer">
	<p>本程序耗时<?php echo round((run_time()-START_TIME),4);?>秒</p>
	<p>版权所有@翻版必究</p>
	<p>本程序是由<span>瓢城web俱乐部</span>所提供，源代码可以任意修改和上传</p>
</div>