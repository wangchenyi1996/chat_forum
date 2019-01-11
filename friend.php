<?php
	session_start();//开启会话
	error_reporting(0);
	define('IN_TG',true);//防止恶意调用
	//顶一个常量来表示本页css内容
	define('SCRIPT','friend');
	//引入公共文件
	require dirname(__FILE__)."./includes/common.inc.php";	
	//判断是否登录状态
	if(!isset($_COOKIE['username'])){
		_alert_close('请先登录');
	}
	//添加好友
	if($_GET['action']=='add'){
		_check_code($_POST['code'],$_SESSION['code']);//验证验证码
		//引入验证函数
		include ROOT_PATH."includes/register.func.php";	
		$_clean=array();
		$_clean['touser']=$_POST['touser'];
		$_clean['fromuser']=$_COOKIE['username'];
		$_clean['content']=_check_content($_POST['content']);
		$_clean=_mysql_string($_clean);
		//不能添加自己
		if($_clean['touser']==$_clean['fromuser']){
			_alert_close("不能添加自己为好友");
		}
		//数据库验证是否已经添加好友
	
			//添加好友信息
			_query(
				"INSERT INTO tg_friend(
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
		  //新增好友成功
		 //关闭数据库
		  _close();
		  //清除session
		  _session_destroy();
		  //'短信发送成功'
		  _alert_close('新增好友成功');
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
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>多用户留言系统--添加好友</title>
		<?php require ROOT_PATH."includes/title.inc.php";?>
		<script type="text/javascript" src="js/code.js"></script>
		<script type="text/javascript" src="js/message.js"></script>
	</head>
	<body>
		<div id="message">
			<h3>添加好友</h3>
			<form action="?action=add" method="post">
				<input type="hidden" name="touser" value="<?php echo $_html['touser']?>"/>
				<dl>
				<dd><input type="text" readonly="readonly" class="text" value="To:<?php echo $_html['touser'];?>"/></dd>
				<dd><textarea name="content" rows="" cols="">认识若只如初见，何事秋风悲画扇。</textarea></dd>
				<dd>验证码：<input type="text" name="code" class="text yzm"/><img src="code.php" id="code"/><input type="submit" value="添加好友" class="submit"/></dd>
			</dl>	
			</form>
		</div>
	</body>
</html>