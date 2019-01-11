<?php
	session_start();//开启会话
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','message');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//判断是否登录状态
	if(!isset($_COOKIE['username'])){
		_alert_close('请先登录');
	}
	//写短信
	if($_GET['action']=='write'){
		_check_code($_POST['code'],$_SESSION['code']);//验证验证码
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		$_clean['touser']=$_POST['touser'];
		$_clean['fromuser']=$_COOKIE['username'];
		$_clean['content']=_check_content($_POST['content']);
		$_clean=_mysql_string($_clean);
		//print_r($_clean);
		//把内容写入数据表中
		_query(
				"INSERT INTO tg_message(
							tg_touser,
							tg_from_touser,
							tg_content,
							tg_time
							)
					VALUES(
					'{$_clean['touser']}',
					'{$_clean['fromuser']}',
					'{$_clean['content']}',
					NOW()
				    )
		");
		//新增成功
		 //关闭数据库
		  _close();
		  //清除session
		  _session_destroy();
		  //'短信发送成功'
		  _alert_close('短信发送成功');
	}
	//获取数据
	if(isset($_GET['id'])){
		if(!!$rows=_fetch_array("SELECT tg_username FROM tg_user WHERE tg_id='{$_GET['id']}' limit 1")){
			$_html=array();
			$_html['touser']=$rows['tg_username'];
			$_html=_html($_html);
		}else{
			_alert_close("不存在此用户");
		}
	}else{
		_alert_close("非法操作");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--写短信</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script type="text/javascript" src="js/code.js"></script>
		<script type="text/javascript" src="js/message.js"></script>
	</head>
	<body>
		<div id="message">
			<h3>写短信</h3>
			<form action="?action=write" method="post">
				<input type="hidden" name="touser" value="<?php echo $_html['touser']?>"/>
				<dl>
				<dd><input type="text" readonly="readonly" class="text" value="To:<?php echo $_html['touser']?>"/></dd>
				<dd><textarea name="content" rows="" cols=""></textarea></dd>
				<dd>验证码：<input type="text" name="code" class="text yzm"/><img src="code.php" id="code"/><input type="submit" value="发送短信" class="submit"/></dd>
			</dl>	
			</form>
		</div>
	</body>
</html>